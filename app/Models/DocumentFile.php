<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{

    protected $table = 'document_files';

    protected $fillable = [
        'document_id',
        'file_name',
        'converted_text'
    ];

    protected $appends = [
        'public_path',
        'text_format'
    ];

    public function skripsi(){
        return $this->belongsTo(Skripsi::class, 'document_id', 'id');
    }

    public function getPublicPathAttribute(){
        return  url('documents/'.$this->file_name);
    }

    public function getTextFormatAttribute(){
        $string =  trim(preg_replace('/\s+/', ' ', $this->converted_text));
        $string = preg_replace('~[\r\n]+~', '', $string);

        return $string;
    }
}
