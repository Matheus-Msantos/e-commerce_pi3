<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
class CartsController extends Controller
{
  public function add(Product $product) {
    $item = Cart::where([
      ['product_id', '=', $product->id],
      ['user_id', '=', Auth()->user()->id]
    ])->first();

    // Autualizar quantida de existir
    if($item) {
      $item->update([
        'quantity' => $item->quantity + 1
      ]);

      session()->flash('success', 'Mais um produto foi adicionado no carrinho');
      return redirect()->back();
    }

    //Adiciona o item na tabela se não existir
    Cart::create([
      'user_id' => Auth()->user()->id,
      'product_id' => $product->id,
      'quantity' => 1
    ]);

    session()->flash('success', 'Produto Adicionado no carrinho');
    return redirect()->back();
  }

  public function remove(Product $product) {
    $item = Cart::where([
      ['product_id', '=', $product->id],
      ['user_id', '=', Auth()->user()->id]
    ])->first();

    // Autualizar quantida de existir
    if($item->quantity > 1) {
      $item->update([
        'quantity' => $item->quantity - 1
      ]);
      session()->flash('success', 'Um produto foi removido do carrinho');
      return redirect()->back();
    }

    //Adiciona o item na tabela se não existir
    $item->delete();
    session()->flash('success', 'Foi removido o producto do carrinho');
    return redirect()->back();
  }

  public function show() {
    $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();
    return view('cart.show')->with('cart', $cart);
  }

  public function payment() {
    $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();
    return view('cart.payment')->with('cart', $cart);
  }
}
