<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $table = 'documents';

    protected $fillable = [
        'title',
        'creator'
    ];

    public function files(){
        return $this->hasMany(DocumentFile::class, 'document_id', 'id');
    }
}
