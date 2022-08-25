<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\Cart;
use App\Models\Lent;
use App\Models\User;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'isbn',
        'image',
        'title',
        'author',
        'publisher',
        'description',
        'price',
        'stock',
        'status',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lents()
    {
        return $this->hasMany(Lent::class, 'book_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'book_id');
    }

    public function getSize()
    {
        return Storage::size($this->image);
    }
}
