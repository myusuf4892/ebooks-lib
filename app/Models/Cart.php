<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Book;

class Cart extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'lent_at',
        'due_at',
        'user_id',
        'book_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id')->withTrashed();
    }
}
