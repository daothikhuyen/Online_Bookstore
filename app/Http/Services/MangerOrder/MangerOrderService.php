<?php

namespace App\Http\Services\MangerOrder;

use App\Models\Comment;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class MangerOrderService{

    public function getAll(){
        $user = Session::get('user');

        return Order::select()->where('id_user',$user->id)->with('order_detail.product')->paginate(8);
        // return Order::select()->paginate(15);
    }

    public function inser_comment($request){


        $user = Session::get('user');
        $id_product_comemnt = $request->input('id_product');

        foreach ($id_product_comemnt as $key => $id) {
            $insert = Comment::create([
                'id_user' => $user->id,
                'id_product' => $id,
                'content' => $request->input('coment_product'),
                'Star' => 5,
                'feedback'=> ""
            ]);
        }

        // return $insert;

            //         if($insert) return true;
            // return false;
    }
}
