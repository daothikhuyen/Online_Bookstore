<?php

namespace App\Http\Controllers;

use App\Http\Services\MangerOrder\MangerOrderService;
use App\Models\Order;
use Illuminate\Http\Request;

class MangerOrderController extends Controller
{

    protected $magerorder;
    public function __construct(MangerOrderService $magerorder)
    {
        $this->magerorder = $magerorder;
    }

    public function index($page){

        $result = $this->magerorder->getAll();

        return view('mange.list',[
            'title' => 'Quản Lí Đớn Hàng',
            'pages' => $page,
            'orders' => $this->magerorder->getAll(),
        ]);
    }

    public function show(Order $order){
        return view('mange.order_detail',[
            'title' => 'Chi Tiết Đơn Hàng',
            'orders' => $order,
            'order_details' => $order->order_detail()->with('product')->get()
        ]);
    }

    public function comment(Request $request){

        // echo $request;
        $result =  $this->magerorder->inser_comment($request);

        // return redirect()->back();

        // if($result){
        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Thành Công'
        //     ]);
        // }else{
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Thành Công'
        //     ]);
        // }
    }
}
