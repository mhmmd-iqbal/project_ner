<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{

    use SoftDeletes;
    
    protected $table = 'documents';

    protected $fillable = [
        'title',
        'creator'
    ];

    public function files(){
        return $this->hasMany(DocumentFile::class, 'document_id', 'id');
    }
}
