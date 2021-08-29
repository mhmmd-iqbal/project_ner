<?php

namespace App\Http\Controllers;

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
    public function __invoke()
    {
        $documents = Document::get();
        return view('pages.dashboard.index', compact('documents'));
    }

}
