<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index1(){
        return view('admin.carts.order_unconfirmed',[
            'title' => 'Danh Sách Đơn Hàng Chưa Duyệt',
            'orders' => $this->cart->getOrder()
        ]);
    }

    public function index2(){
        return view('admin.carts.order_confirmed',[
            'title' => 'Danh Sách Đơn Hàng Đã Giao',
            'orders' => $this->cart->getOrder()
        ]);
    }

    public function index3(){
        return view('admin.carts.order_cancel',[
            'title' => 'Danh Sách Đơn Hàng Đã Huỷ',
            'orders' => $this->cart->getOrder()
        ]);
    }

    public function show(Order $order){

        return view('admin.carts.order_detail',[
            'title' => 'Chi Tiết Đơn Hàng',
            'orders' => $order,
            'order_details' => $order->order_detail()->with('product')->get()
        ]);
    }

    public function confirmed($id){
        $result = Order::where('id',$id)->update(['status' => 1]);

        if($result){
            Session::flash('success', 'Xác nhận đơn hàng thành công');

            return redirect("/admin/carts/order_confirmed");
        }else{
            return response()->json([
                'error' => true
            ]);
        }


    }

    public function cancel_order(Request $request,Order $order){

        $result = $this->cart->cancel_order($order);

        if($result){

            return response()->json([
                'error' => false,
                'message'=> 'Huỷ đơn hàng thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }


}
