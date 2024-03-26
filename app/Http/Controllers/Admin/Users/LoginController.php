<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title'=> 'Đăng Nhập Hệ Thống',
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'email'=> 'required|email:filter',
            'password'=> 'required',
        ]);

        // kiểm tra so với sql
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),


        ], $request->input('remember')
        )){
            $user = Auth::user();

            Session::put('user',$user);
            if($user->level == 1){
                return redirect()->route('admin');
            }
            if($user->level == 2){
                $user = Session::get('user');

                $number_cart = Cart::select()->where('id_user', $user->id)->count();
                Session::put('cart', $number_cart);

                return redirect('/');
            }
        }

        Session::flash('error', 'Email hoặc Password không chính xác');

        return redirect()->back();
    }


}
