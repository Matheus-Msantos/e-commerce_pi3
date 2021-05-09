<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
      return view('tag.index')->with('Tags', Tag::all());
    }


    public function create()
    {
      return view('tag.create');
    }

    public function store(Request $request)
    {
      Tag::create($request->all());
      session()->flash('success', 'Tag cadastrada com sucesso!');
      return redirect(Route('tag.index'));
    }


    public function show(Tag $tag)
    {
      return view('tag.show')->with(['tag' => $tag, 'products' => $tag->products()->paginate(3)]);
    }


    public function edit(Tag $tag)
    {
      return view('tag.edit')->with('Tag', $tag);
    }


    public function update(Request $request, Tag $tag)
    {
      $tag->update($request->all());
      session()->flash('success', 'Tag atualizada com sucesso!');
      return redirect(Route('tag.index'));
    }

    public function destroy(Tag $tag)
    {
      if($tag->products->count() > 0){
        session()->flash('success', 'Essa Tag não pode ser apagada!');
        return redirect(Route('tag.index'));
      }
      $tag->delete();
      session()->flash('success', 'Tag apagada com sucesso!');
      return redirect(Route('tag.index'));
    }

    public function trash() {
      return view('tag.trash')->with('Tags', Tag::onlyTrashed()->get());
    }

    public function restore($id) {
      $tag = Tag::onlyTrashed()->where('id', $id)->firstOrFail();
      $tag->restore();
      session()->flash('success', 'Tag restaurada com sucesso!');
      return redirect(Route('tag.trash'));
    }
}
