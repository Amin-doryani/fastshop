<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'id_product',
        'id_customer',

    ];
    public function customer(){
        return $this->belongsto(Customer::class);
    }
    public function product(){
        return $this->belongsto(Product::class);
    }
    public function orderstatus(){
        return $this->hasMany(OrderStatus::class);
    }
}
