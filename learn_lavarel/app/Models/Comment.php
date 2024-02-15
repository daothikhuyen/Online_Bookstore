<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_user',
        'id_product',
        'content',
        'Star',
        'feedback'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','id_user');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','id_product');
    }
}
