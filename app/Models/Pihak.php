<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pihak extends Model
{
    use HasFactory;
    protected $table = 'pihak';
    protected $fillable = [
        'image_pihak'
    ];
}
