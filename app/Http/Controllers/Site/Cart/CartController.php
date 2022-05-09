<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function cart()
    {
        $data["cart"] = Cart::content();
        $data["total"] = Cart::total();
        $data["priceTotal"] = Cart::priceTotal();
        return view("frontend/cart/cart", $data);
    }

    public function addToCart(Request $request, $id)
    {
        $qty = $request->quantity ? $request->quantity : 1;
        $product = Product::find($id);
        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price,
            'weight' => 0,
            'options' => [
                'code' => $product->code,
                'image' => $product->image
            ]
        ]);
        return redirect("/gio-hang");
    }

    public function update($rowId, $qty)
    {
        Cart::update($rowId,$qty);
        return "updated";
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect("/gio-hang");
    }

    public function checkout()
    {
        $data["cart"] = Cart::content();
        $data["priceTotal"] = Cart::priceTotal();
        return view("frontend/cart/checkout",$data);
    }

    public function payment(PaymentRequest $paymentRequest)
    {
        $order = new Order();
        $order->name = $paymentRequest->name;
        $order->address = $paymentRequest->address;
        $order->email = $paymentRequest->email;
        $order->phone = $paymentRequest->phone;
        $order->total = Cart::priceTotal();
        $order->state = 0;
        $order->save();
        foreach (Cart::content() as $cart){
            $orderProduct = new OrderProduct();
            $orderProduct->name = $cart->name;
            $orderProduct->code = $cart->options->code;
            $orderProduct->price = $cart->price;
            $orderProduct->quantity = $cart->qty;
            $orderProduct->image = $cart->options->image;
            $orderProduct->orders_id = $order->id;
            $orderProduct->save();
        }
        return redirect("/gio-hang/hoan-thanh");
    }

    public function complete()
    {
        Cart::destroy();
        return view("frontend/cart/complete");
    }

}
