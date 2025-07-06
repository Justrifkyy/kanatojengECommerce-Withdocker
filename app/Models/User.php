<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'profile_photo_path',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi: Satu user bisa punya banyak item di keranjang
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Relasi: Satu user bisa punya banyak pesanan
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
