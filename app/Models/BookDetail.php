<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;

class BookDetail extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable = [
        'isbn',
        'image',
        'title',
        'author',
        'publisher',
        'description',
        'price',
        'stock',
        'donatur',
        'category_id',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
