<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFile extends Model
{
    use HasFactory;
    protected $table = 'data_file';
    protected $fillable = [
        'file_id',
        'file',
        'comment'
    ];
}
