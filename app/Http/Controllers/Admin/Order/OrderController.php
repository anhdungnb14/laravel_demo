<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function order(){
        $orders = Order::orderBy('id','DESC')->where('state','0')->get();
        return view("backend/orders/order",["orders" => $orders]);
    }
    public function details($id){
        $order = Order::find($id);
        return view("backend/orders/detailorder",["order"=>$order,"total"=>0]);
    }
    public function processed(Request $request){
        if($request->input('id')){
            $order = Order::find($request->input('id'));
            $order['state'] = 1;
            $order->save();
        }
        $orders = Order::orderBy('id','DESC')->where('state','1')->get();
        return view("backend/orders/processed",['orders'=>$orders]);
    }

}
