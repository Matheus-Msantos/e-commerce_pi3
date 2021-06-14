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

  public function show(Category $category) {
    return view('category.show')->with(['category'=> $category, 'products' => $category->products()->paginate(6)]);
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
    if($category->products()->count() > 0){
      session()->flash('error', 'Erro ao apagar! Desvincule todos produtos relacionado a essa categoria');
      return redirect(Route('category.index'));
    }

    $category->delete();
    session()->flash('success', 'Categoria removida com sucesso!');
    return redirect(Route('category.index'));
  }

  public function trash() {
    return view('category.trash')->with('Categories', category::onlyTrashed()->get());
  }

  public function restore($id) {
    $category = Category::onlyTrashed()->where('id', $id)->firstOrFail();
    $category->restore();
    session()->flash('success', 'Categoria restourada com sucesso!');
    return redirect(Route('category.trash'));
  }

}
