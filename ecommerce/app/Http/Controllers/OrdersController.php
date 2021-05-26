<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Address;
Use App\Models\OrderItem;

class OrdersController extends Controller
{
  public function add(Request $request) {
    $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();

    $order = Order::create([
      'user_id' => Auth()->user()->id,
      'status' => 'Processando',
      'address' => Address::adder()->street,
      'address_number' => Address::adder()->number,
      'address_district' => Address::adder()->district,
      'address_state' => Address::adder()->state,
      'cc_number' => substr($request->cc_card, -4),
    ]);

    foreach($cart as $item){
      OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $item->product_id,
        'quantity' => $item->quantity,
        'price' => $item->product()->price,
      ]);
      $item->delete();
    }

    return redirect(Route('order.show'));
  }

  public function show(Cart $cart) {
    return view('order.show');
  }


}
