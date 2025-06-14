<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id_user',
        'id_product',
        'quantity',
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','id_product');
    }
}
