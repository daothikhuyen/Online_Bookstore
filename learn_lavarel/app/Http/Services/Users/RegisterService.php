<?php
namespace App\Http\Services\Users;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class RegisterService{

    public function create($request){
        User::create([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'password'=>$request->input('password'),
        'remember_token'=>$request->input('_token'),
        'level'=> '2'
       ]);

       return true;
    }
}
