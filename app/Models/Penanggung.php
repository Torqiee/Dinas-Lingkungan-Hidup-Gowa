<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanggung extends Model
{
    use HasFactory;
    protected $table = 'penanggung';
    protected $fillable = [
        'image_penanggung',
        'name',
        'role',
        'description'
    ];
}
