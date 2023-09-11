<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function PendingOrders ()
    {
        // $pending_orders = Order:: where('status','pending')->latest()->get();
        $pending_orders = Order::all();

        return view('admin.order.pendingorders', compact('pending_orders'));
    }

    public function AcceptOrder($id)
    {
        // order approved korle then admin dashboard a approve show hobe..
        $data = Order::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }


}
