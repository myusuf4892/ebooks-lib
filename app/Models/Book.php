<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookDetail;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
    ];

    public function bookDetail()
    {
        return $this->belongsTo(BookDetail::class);
    }
}
