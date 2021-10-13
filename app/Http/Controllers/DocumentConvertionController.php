<?php

namespace App\Http\Controllers;

use App\Models\DocumentFile;
use App\Traits\DocxConversion;
use Illuminate\Http\Request;

class DocumentConvertionController extends Controller
{
    use DocxConversion;
    public function __invoke(DocumentFile $file)
    {
        $path =  public_path('documents/'.$file->file_name);
        $information = DocxConversion::extract_information($path);
        return response()->json($information);
    }
}
