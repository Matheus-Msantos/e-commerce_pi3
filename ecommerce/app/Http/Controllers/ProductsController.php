<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductsController extends Controller
{
  public function index() {
    return view('product.index')->with('Products', Product::all());
  }

  public function create() {
    return view('product.create')->with('Categories', Category::all());
  }

  public function store(Request $request) {
    Product::create($request->all());
    session()->flash('success', 'Produto foi cadastrado com sucesso!');
    return redirect(Route('product.index'));
  }

  public function edit(Product $product) {
    return view('product.edit')->with(['Product'=>$product, 'Category'=>Category::all()]);
  }

  public function update(Request $request, Product $product) {
    $product->update($request->all());
    session()->flash('success', 'Produto atualizado com sucesso!');
    return redirect(Route('product.index'));
  }

  public function destroy(Product $product) {
    $product->delete();
    session()->flash('success', 'Produto apagado com sucesso!');
    return redirect(Route('product.index'));
  }
}
