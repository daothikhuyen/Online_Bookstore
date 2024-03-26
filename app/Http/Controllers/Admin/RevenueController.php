<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index()
    {
        return view('admin.revenues.revenue', [
            'title'=> 'Doanh thu',
            'revenues'=> Order::select()->get(),
            'cancel_order' => Order::where('status', '=', 2)->count(),
            'number_users' => User::select()->get()
        ]);
    }
}
