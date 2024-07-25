<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    public function order(){
        return $this->belongsTo(Oredr::class);
    }
    protected $fillable = [
        'status',
        'id_order',
        
    ];
}
