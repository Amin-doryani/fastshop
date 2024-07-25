<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
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
        return $this->hasMany(Productimg::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function size(){
        return $this->hasMany(Size::class);
    }
    public function color(){
        return $this->hasMany(Color::class);
    }
    
}
