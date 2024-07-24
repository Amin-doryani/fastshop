<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    protected $fillable = [
        'name',
        'email',
        'lastname',
        'city',
        'country',
        'phone',
        'email',
        'address',
    ];
}
