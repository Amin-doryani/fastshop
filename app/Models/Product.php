<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function productimg(){
        return $this->hasMany(Productimg::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    
}
