<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;
    protected $table = 'dokumentasi';
    protected $fillable = [
        'image_doc',
        'judul_doc',
        'description_doc'
    ];
}
