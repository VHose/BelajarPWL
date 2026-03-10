<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; //ini buat cek agar gk default ke categories

    protected $fillable = [
        'name',
        'description',
    ];
}
