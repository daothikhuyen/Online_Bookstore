<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Jobs\SendMail_CancelOrder;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartService{

    public function create($request){
        $qyt = (int)$request->input('quantity');
        $product_id = (int)$request->input('product_id');
        $user = Session::get('user');

        if($qyt <= 0 || $product_id <= 0){
            Session::flash('error', 'Số lượng hoặc sản phẩm không chính xác');
            return false;
        }

        $exists_product = Cart::select()->where('id_user', $user->id)
                                        ->where('id_product', $product_id)
                                        ->first();

        if($exists_product == false){
            $add_cart = Cart::create([
                'id_user'=> $user->id,
                'id_product'=>$product_id,
                'quantity'=>$qyt
            ]);

            return $add_cart ? true : false;

        }else{

            $cart = $exists_product;
            $quantity = $cart->quantity + $qyt;

            //update số lượng giỏ hàng
            $update_qyt = Cart::where('id_user', $user->id)
                        ->where('id_product', $product_id)
                        ->update(['quantity' => $quantity]);


            return $update_qyt ? true : false;
        }

    }

    public function getProduct(){
        $user = Session::get('user');

        $products = Cart::with('product')->select()->where('id_user',$user->id)->get();

        return $products;
    }

    public function remove($id){
        $user = Session::get('user');

        return Cart::where('id',$id)
                    ->where('id_user',$user->id)
                    ->delete();
    }

    public function update_quantity($id,$quantity){
        return Cart::where('id',$id)->update(['quantity' => $quantity]);
    }

    public function selectProductOrder(){
        $cart_order = Session::get('cart_order');

        return Product::select('id','name','price','discount','image')->whereIn('id', array_keys($cart_order))->get();
    }

    public function buy_order($request){
        try {
            DB::beginTransaction();


            $user = Session::get('user');
            $cart_order = Session::get('cart_order');

            if(is_null($cart_order))
                return false;

            $order = Order::create([
                'id_user'=> $user['id'],
                'fullname'=> $request->input('fullname'),
                'email'=> $request->input('email'),
                'phone_number'=> $request->input('number_phone'),
                'address'=> $request->input('address'),
                'note'=> $request->input('note'),
                'total_price'=> $request->input('total_price'),
                'status'=> 0
            ]);

            DB::commit();

            $this->infoProduct($user->id,$order->id);

            Session::flash('succes','Đặt hàng thành công');
            #Queue
            SendMail::dispatch($request->input('email'))->delay(now()->addSecond(2));

            Session::forget('cart_order');

        } catch (\Throwable $th) {

            DB::rollBack();

            Session::flash('error','Đặt hàng thất bại');
            return false;
        }

        return true;
    }

    public function infoProduct($id_user,$id_order){

        $cart_order = Session::get('cart_order');

        $products =  Product::select('id','name','price','discount','image','quantity')->whereIn('id', array_keys($cart_order))->get();


        $data = [];

        foreach ( $products as $key => $product) {
            $data[] = [
                'id_order' => $id_order,
                'id_product'=> $product->id,
                'quantity' => $cart_order[$product->id],
                'price' => $product->price *(100 - $product->discount)/100
            ];
            // dd($data);
            $count = Session::get('cart') - 1;
            Session::put('cart', $count);
            Product::where('id',  $product->id)->update(['quantity' => ($product->quantity - $cart_order[$product->id])]);

        }

        DB::beginTransaction();

        try {
            $order_detail = Order_detail::insert($data);

            if ($order_detail) {
                Cart::whereIn('id_product', array_keys($cart_order))->where('id_user', $id_user)->delete();
                DB::commit();
                return 'Success';
            } else {

                throw new \Exception("Insertion failed");
            }
        } catch (\Exception $e) {
            DB::rollback();
            dd("Thất Bại: " . $e->getMessage());
        }
    }

    public function getOrder(){
        return Order::select()->paginate(15);
    }

    public function cancel_order($order){

        $id = (int) $order->id;

        SendMail_CancelOrder::dispatch($order->email)->delay(now()->addSecond(2));

        $orders = Order::where('id', $id)->update(['status'=> '2']);

        if($orders){
            return true;
        }
        return false;
    }


}
