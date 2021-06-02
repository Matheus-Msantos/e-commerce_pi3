<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function tags() {
    return $this->belongsToMany(Tag::class);
  }

  public static function destaques() {
    return Product::all()->take(3);
  }

  public static function novidades() {
    return Product::all()->take(6);
  }

  public static function especial() {
    return Product::all()->take(-5);
  }
}
