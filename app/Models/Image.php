<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey = "id_image";
    protected $table = "images";
    protected $fillable = [
        'url',
        'id_user'
    ];
}
