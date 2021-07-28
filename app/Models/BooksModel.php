<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name','author','description','cover','release_date'
    ];
}
