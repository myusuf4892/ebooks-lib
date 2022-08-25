<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Support\Facades\Hash;
use App\Models\Cart;
use App\Models\Role;
use App\Models\Lent;
use App\Models\BookDetail;

class User extends Authenticable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'status',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function lents()
    {
        return $this->hasMany(Lent::class);
    }

    public function books()
    {
        return $this->hasMany(BookDetail::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }
}
