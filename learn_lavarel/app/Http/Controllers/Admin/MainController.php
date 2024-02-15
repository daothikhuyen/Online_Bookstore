<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index(){
        return view('admin.home', [
            'title'=> 'Trang quản trị admin',
        ]);
    }

    public function account(){
        return view('admin.users.list',[
            'title'=> 'Danh Sách Tài Khoản',
            'accounts'=> User::select()->paginate(10)
        ]);
    }

    public function destroy(Request $request){


            $id = (int) $request->input('id');

            $account = User::where('id', $id)->first();

            $result = User::where('id', $id)->delete();

            if($result){
                return response()->json([
                    'error' => false,
                    'message'=> 'Xoá thành công'
                ]);
            }

            return response()->json([
                'error' => true
            ]);
    }

}
