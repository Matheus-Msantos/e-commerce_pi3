<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressesController extends Controller
{
  public function create() {
    return view('address.create');
  }


  public function add(Request $request) {

    Address::create([
      'user_id' => Auth()->user()->id,
      'street' => $request->street,
      'district' => $request->district,
      'number' => $request->number,
      'state' => $request->state,
      'cep' => $request->cep,
    ]);
    session()->flash('success', 'Endereço salvado com sucesso!');
    return redirect(Route('address.create'));
  }

  public function edit(Address $address) {
    return view('address.edit')->with('Address', $address);
  }

  public function update(Address $address) {
    $item = Address::where('user_id', '=', Auth()->user()->id)->first();

    $item->update([
      'street' => $item->street,
      'district' => $item->district,
      'number' => $item->number,
      'state' => $item->state,
      'cep' => $item->cep,
    ]);
    session()->flash('success', 'Endereço atualizado com sucesso!');
    return redirect(Route('cart.payment'));
  }


}
