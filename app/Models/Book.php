<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book'; //ini buat cek agar gk default ke books
    
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'description',
        'cover',
        'publish_year',
        'category_id',
    ];

    protected $primaryKey = 'isbn'; // Set primary key to 'isbn'
    protected $keyType = 'string'; // Set key type to string
    public $incrementing = false; // Disable auto-incrementing
}
