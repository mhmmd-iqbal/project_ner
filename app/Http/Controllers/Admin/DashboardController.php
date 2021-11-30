<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use App\Traits\DocxConversion;
use Illuminate\Http\Request;
use File;
use PhpOffice\PhpWord\Writer\PDF\DomPDF;
use PdfToHtml;
use Gufy\PdfToHtml\Pdf;

class DashboardController extends Controller
{

    use DocxConversion;
    public function index()
    {
        $countDocument = Document::get()->count();
        $documents     = Document::limit(5)->get();
        $countUsers    = User::get()->count();
        return view('pages.dashboard.index', compact('countDocument', 'documents', 'countUsers'));
    }

}
