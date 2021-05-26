<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  use HasFactory;

  protected $fillable = ['user_id', 'street', 'district', 'number', 'state', 'cep'];

  public static function adder() {
    return Address::where('user_id', '=', Auth()->user()->id)->first();
  }
}
