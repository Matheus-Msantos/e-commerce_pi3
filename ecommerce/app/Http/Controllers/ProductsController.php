<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
    if($request->image){
      $image = $request->file('image')->store('product');
      $image = 'storage/' . $image;

    }else {
      $image = 'storage/product/imagem.jpg';
    }

    Product::create([
      'name' => $request->name,
      'description' => $request->description,
      'price' => $request->price,
      'category_id' => $request->category_id,
      'image' => $image
    ]);
    session()->flash('success', 'Produto foi cadastrado com sucesso!');
    return redirect(Route('product.index'));
  }

  public function edit(Product $product) {
    return view('product.edit')->with(['Product'=>$product, 'Category'=>Category::all()]);
  }

  public function update(Request $request, Product $product) {
    if($request->image){
      $image = $request->file('image')->store('product');
      $image = 'storage/' . $image;
      if($product->image != "storage/product/imagem.jpg"){
        Storage::delete(str_replace('storage/', '', $product->image));
      }
    }else {
      $image = $product->image;
    }

    $product->update([
      'name' => $request->name,
      'description' => $request->description,
      'price' => $request->price,
      'category_id' => $request->category_id,
      'image' => $image
    ]);
    session()->flash('success', 'Produto atualizado com sucesso!');
    return redirect(Route('product.index'));
  }

  public function destroy(Product $product) {
    $product->delete();
    session()->flash('success', 'Produto apagado com sucesso!');
    return redirect(Route('product.index'));
  }

  public function trash() {
    return view('product.trash')->with('Products', Product::onlyTrashed()->get());
  }

  public function restore($id) {
    $product = Product::onlyTrashed()->where('id',$id)->firstOrFail();
    $product->restore();
    session()->flash('success', 'Produto restaurado com sucesso!');
    return redirect(Route('category.trash'));
  }
}
