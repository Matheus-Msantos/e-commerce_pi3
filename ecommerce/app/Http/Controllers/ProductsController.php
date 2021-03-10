<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductsController extends Controller
{
  public function index() {
    return view('product.index')->with('Products', Product::all());
  }

  public function create() {
    return view('product.create');
  }

  public function store(Request $request) {
    Product::create($request->all());
    return redirect(Route('product.index'));
  }
}
