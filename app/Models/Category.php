<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'penanggung_perusahaan',
        'no_telp',
        'alamat_perusahaan',
        'kordinat',
        'nib',
        'npwp',
        'is_active'
    ];
}
