<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Book;
use App\Models\Payment;

class Lent extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'order_id',
        'lent_at',
        'due_at',
        'return_at',
        'price',
        'status_returned',
        'payment_status',
        'amercement',
        'province',
        'city',
        'postal_code',
        'street',
        'snap_token',
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
