<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'fullname',
        'email',
        'phone_number',
        'address',
        'note',
        'total_price',
        'status'
    ];

    public function order_detail(){
        return $this->hasMany(Order_detail::class,'id_order','id');
    }
}
