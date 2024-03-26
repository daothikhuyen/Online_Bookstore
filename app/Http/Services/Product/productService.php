<?php

namespace App\Http\Services\Product;

use App\Models\Comment;
use App\Models\Product;

class ProductService{

    public function show(){
        return  Product::select()->where('active',1)->get();

    }

    public function show_detail($id){
        return Product::select()->where('id',$id)
                                ->with('menu')
                                ->firstOrFail();
    }

    public function show_comment($id){
        return Comment::select()->where('id_product',$id)->with('user')->get();
    }

}
