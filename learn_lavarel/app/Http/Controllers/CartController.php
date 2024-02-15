<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\Promote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Prompts\Prompt;

class CartController extends Controller
{
    protected $cartservice;

    public function __construct(CartService $cartService)
    {
        $this->cartservice = $cartService;
    }

    public function index(Request $request){
        $result = $this->cartservice->create($request);
        $user = Session::get('user');

        $number_cart = Cart::select()->where('id_user', $user->id)->count();

        Session::put('cart', $number_cart);

        if($result == 'true'){
            echo json_encode(array(
                'status' => true,
                'number'=> $number_cart
            ));
        }else{
            echo json_encode(array(
                'status' => false,
                'number'=> $number_cart
            ));
        }

    }

    public function show_request(){
        if(Session::has('user')){
            return response()->json([
                'error' => true,
                'message' => 'Tài khoản đã đăng nhập'
            ]);

        }else{
            return response()->json([
                'error' => false,
                'message' => 'Vui lòng đăng nhập để vào giỏ hàng'
            ]);
        }
    }

    public function show_cart(){
        $products = $this->cartservice->getProduct();
            return view('carts.list',[
                'title'=>'Giỏ Hàng',
                'products'=> $products,
                'promotes' => Promote::select()->paginate(2)
            ]);
    }

    public function update(){

    }

    public function remove($id = 0){

        $remove = $this->cartservice->remove($id);

        $number_cart = Session::get('cart')-1;
        Session::put('cart', $number_cart);

        return redirect('/to_carts');

    }

    public function update_quantity(Request $request, $id){

        $update_quantity_order = $this->cartservice->update_quantity($id,$request->input('quantity'));

        return response()->json([
            'status' => true,
            'message'=> 'update thành công'
        ]);
    }

    public function checkout(Request $request){
        // Lấy dữ liệu từ request
        // dd($request->input('products'));
        $selectedProducts = json_decode($request->input('products'), true);

        if(!is_null(Session::get('cart_order'))){
            Session::forget('cart_order');
            // dd(Session::get('cart_order'));
        }
         // Lấy giỏ hàng hiện tại từ Session
        $cart_order = Session::get('cart_order', []);

        // Xử lý dữ liệu
        foreach ($selectedProducts as $product) {
            $productId = $product['id'];
            $quantity = $product['quantity'];
            $id_promote = $product['id_promote'];
            // Đặt vào thông tin mới hoặc cập nhật thông tin nếu đã tồn tại
            $cart_order[$productId] = $quantity;
        }


        Session::put('cart_order', $cart_order);

        $selectOrder = $this->cartservice->selectProductOrder();
        // dd($selectOrder);

        return view('carts.checkOut',[
            'title'=>'Kiểm Tra Đơn Hàng',
            'products'=> $selectOrder,
            'promote' => Promote::select()->where('id',$id_promote)->first()

        ]);
    }

    public function buy_order(Request $request){

        $this->cartservice->buy_order($request);

        return redirect('/carts/success');

    }

    public function success_order(){
        return view('carts.order_success',[
            'title' => 'Đặt hàng thành công',

        ]);
    }


}
