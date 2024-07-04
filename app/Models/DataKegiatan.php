<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKegiatan extends Model
{
    use HasFactory;
    protected $table = 'data_kegiatan';
    protected $fillable = [
        'kegiatan_id',
        'nama_kegiatan',
        'alamat_kegiatan',
        'jenis_kegiatan',
        'kordinat_kegiatan',
        'besaran_kegiatan',
        'rintek',
        'pertek'

    ];
}
