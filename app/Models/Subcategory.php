<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_category',
    ];
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function category(){
        return $this->belongsto(Category::class,'id_category');
    }
}