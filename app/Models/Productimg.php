<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productimg extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        'id_products',
    ];
    public function product(){
        return $this->belongsto(Product::class);
    }
    public function getFirstImageByProductId($id_pro) {
            return self::where('id_pro', $id_pro)
                ->orderBy('created_at', 'asc') 
                ->first();
        }
}
