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
        'public_path'
    ];

    public function skripsi(){
        return $this->belongsTo(Skripsi::class, 'document_id', 'id');
    }

    public function getPublicPathAttribute(){
        return  url('documents/'.$this->file_name);
    }
}
