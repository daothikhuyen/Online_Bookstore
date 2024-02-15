<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService as ServicesUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userservice;

    public function __construct(ServicesUserService $userService)
    {
        $this->userservice = $userService;
    }

    public function index(){
        $user = Session::get('user');

        return view('accounts.list',[
            'title' => "Tài Khoản Của Tôi",
            'users' => $user
        ]);
    }
}
