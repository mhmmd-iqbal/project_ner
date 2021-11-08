<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
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
        $documents = Document::get();
        return view('pages.dashboard.index', compact('documents'));
    }

}
