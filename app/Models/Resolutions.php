<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolutions extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'memorandum_number',
        'description',
        'photo',
        'file_path',
        'category',
    ];
}
