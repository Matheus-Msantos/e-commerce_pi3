<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
  public function index() {
    return view('category.index')->with('Categories', Category::all());
  }


  public function create() {
    return view('category.create');
  }

  public function store(Request $request) {
    Category::create($request->all());
    session()->flash('success', 'Categoria cadastrada com sucesso!');
    return redirect(Route('category.index'));
  }

  public function edit(Category $category){
    return view('category.edit')->with('Category', $category);
  }

  public function update(Category $category, Request $request) {
    $category->update($request->all());
    session()->flash('success', 'Categoria atualiza com sucesso!');
    return redirect(Route('category.index'));
  }

  public function destroy(Category $category) {
    $category->delete();
    session()->flash('success', 'Categoria removida com sucesso!');
    return redirect(Route('category.index'));
  }

}
