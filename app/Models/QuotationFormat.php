<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationFormat extends Model
{
    protected $table = 'quotation_formats';

    protected $fillable = [
        'formatted',
        'fixed_string',
        'name',
        'punctuation'
    ];
}
