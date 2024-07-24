<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function customer(){
        return $this->belongsto(Customer::class);
    }
    public function produvt(){
        return $this->belongsto(Product::class);
    }
}
