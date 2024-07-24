<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productimg extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsto(Product::class);
    }
}
