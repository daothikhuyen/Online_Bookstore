<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService{

    public function getMenu(){
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request){
        $price = $request->input('price');
        $price_sale = $request->input('price_sale');

        if( $price != 0 && $price_sale != 0 && $price <= $price_sale){
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if($price_sale != 0 && $price == 0){
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function insert($request){

        $isValidPrice = $this->isValidPrice($request);

        if($isValidPrice === false){
            return false;
        }

        try {

            // có thể dùng unser để xoá token hoặc
            $request->except('_token');

            Product::create($request->all());

            Session::flash('success', 'Thêm sản phẩm thành công');

        } catch (\Throwable $th) {
            Session::flash('error', 'Thêm sản phẩm lỗi');
            Log::info($th->getMessage());


            return false;
        }

        return true;

    }

    public function getAll(){

        // inner join product and menu
        $products = Product::with('menu')->select()->paginate(10);

        return $products;
    }

    public function destroy($request){

        $id = (int) $request->input('id');

        $product = Product::where('id', $id)->first();

        if($product){
            return Product::where('id', $id)->delete();
        }
        return false;
    }

    public function update($product, $request){
// dd($request);
        $product->fill($request->input());
        $product->save();

        Session::flash('success', 'Cập nhật thành công');
        return true;
    }
}
