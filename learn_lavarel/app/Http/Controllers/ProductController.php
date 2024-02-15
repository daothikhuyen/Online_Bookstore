<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productservice;

    public function __construct(ProductService $productService)
    {
        $this->productservice = $productService;
    }

    public function index($id = '',$slug=''){
        $product_detail = $this->productservice->show_detail($id);
        $comment = $this->productservice->show_comment($id);
     

        return view('products.content', [
            'title'=> $product_detail->name,
            'product'=>$product_detail,
            'comments' => $comment
        ]);
    }
}
