<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RegisterRequest;
use App\Http\Services\Users\RegisterService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    protected $registerservice;

    public function __construct(RegisterService $registerservice)
    {
        $this->registerservice = $registerservice;
    }
    public function index(){
        return view('admin.users.register',[
            'title'=> 'Đăng kí'
        ]);
    }

    public function store(RegisterRequest $request){

        $isExist = User::select()->where('email', $request->input('email'))->exists();

        if($isExist){
            Session::flash('error','Tài khoản đã tồn tại');
            return redirect()->back();
        }else{
            $register = $this->registerservice->create($request);
            if($register){
                return redirect('admin/users/login');
            }
        }

    }
}
