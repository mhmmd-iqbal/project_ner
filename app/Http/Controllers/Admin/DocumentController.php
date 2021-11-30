<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use App\Traits\DocxConversion;
use App\Traits\PDF2Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Smalot\PdfParser\Parser;
use Yajra\DataTables\DataTables;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $documents = Document::with('files')->get();
            return DataTables::of($documents)
            ->addIndexColumn()
            ->addColumn('modalShow', function($data){
                return '<a href="#" onclick="openModal(this)" data-target="detail" data-value="'.$data->id.'" > '.$data->title.'</a>';
            })
            ->addColumn('createdAt', function($data){
                return date('d-m-Y H:i:s', strtotime($data->created_at));
            })
            ->addColumn('action', function ($data){
                return '
                    <button class="btn btn-success  text-white " onclick="openModal(this)" data-target="update" data-value="'.$data->id.'" ><i class="mdi mdi-update"></i></button>
                    <button class="btn btn-danger  text-white " onclick="openModal(this)" data-target="delete" data-value="'.$data->id.'"><i class="mdi mdi-delete-empty"></i></button>
                ';
            })
            ->rawColumns([
                'modalShow',
                'createdAt',
                'action'
            ])
            ->make(true);
        }
        return view('pages.documents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('documents'),$imageName);
            return response()->json([
                'status'    => 'success',
                'file'      => $imageName
            ]);
        }else{
            DB::beginTransaction();
            try {
                $converted_text = null;
                $document = Document::create(
                    [
                        'title'     => $request->input('title'),
                        'creator'   => $request->input('creator')
                    ]
                );

                foreach ($request->input('files') as $key => $file) {
                    $path           =  public_path('documents/'.$file);
                    $path_info      = pathinfo($path);
                    $converted_text = null;
                    switch ($path_info['extension']) {
                        case 'docx':
                            $information = DocxConversion::extract_information($path);
                            if($information['status'] === 'success') {
                                $converted_text = $information['data'];
                            }  
                            break;
                        
                        case 'pdf':
                            // $information = new PDF2Text();
                            // $information->setFilename($path); 
                            // $information->decodePDF();
                            // $converted_text = self::convert_from_latin1_to_utf8_recursively($information->output());
                            // dd($converted_text);

                            $converted_text = '';

                            $parser = new Parser();
                            $pdf    = $parser->parseFile($path);
                            $pages  = $pdf->getPages();

                            // Loop over each page to extract text.
                            foreach ($pages as $page) {
                                $converted_text .= $page->getText() . PHP_EOL;
                            }
                            break;
                            
                        default:
                            break;
                    }

                    $document->files()->create(
                        [
                            'file_name'         => $file,
                            'converted_text'    => $converted_text
                        ]
                    );
                }
                DB::commit();
                return response()->json(
                    [
                        'status'    => 'success'
                    ]
                );
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json(
                    [
                        'status'    => 'error'
                    ]
                );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $document = $document->loadMissing('files');
        return response()->json($document, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        DB::beginTransaction();
        try {
            $document->update([
                'title'     => $request->title,
                'creator'   => $request->creator
            ]);
            DB::commit();

            return response()->json(
                [
                    'status'    => 'success'
                ]
            );
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json(
                [
                    'status'    => 'error'
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
        try {
            $document->delete();

            return response()->json(
                [
                    'status'    => 'success',
                    'message'   => 'Data telah dihapus'
                ], 200
            );
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(
                [
                    'status'    => 'fail',
                ], 200
            );
        }
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        // ImageUpload::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }


    public static function convert_from_latin1_to_utf8_recursively($dat)
    {
        if (is_string($dat)) {
            return utf8_encode($dat);
        } elseif (is_array($dat)) {
            $ret = [];
            foreach ($dat as $i => $d) $ret[ $i ] = self::convert_from_latin1_to_utf8_recursively($d);

            return $ret;
        } elseif (is_object($dat)) {
            foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);

            return $dat;
        } else {
            return $dat;
        }
    }
}
