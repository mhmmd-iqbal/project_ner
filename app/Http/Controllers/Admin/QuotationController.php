<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuotationFormat;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function __construct() {
    }
    
    public function index() {
        $quotations = QuotationFormat::all();
        return view('pages.quotation.index', compact('quotations'));
    }

    public function create() {
        return view('pages.quotation.create');
    }

    public function store(Request $request) {
        $formatted      = $request->formatted;
        $fixed_string   = $request->fixed_string;
        $name           = (int) $request->name;
        $punctuation    = (int) $request->punctuation;

        $save = QuotationFormat::create(
            [
                'formatted'     => $formatted,
                'fixed_string'  => $fixed_string,
                'name'          => $name,
                'punctuation'   => $punctuation
            ]
        );

        return redirect()->route('quotation.index')->with('success', 'Created Data Successfully');
    }
}
