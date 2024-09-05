<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'image',
        'price',
        'quantity',
        'discount',
        'id_subcat',
    ];
    public function productimg(){
        return $this->hasMany(Productimg::class,"id_products");
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class,"id_subcat");
    }
    public function size(){
        return $this->hasMany(Size::class);
    }
    public function color(){
        return $this->hasMany(Color::class);
    }
    
}
