<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'image',
    'category_id',
    'is_active'
  ];

  public function subcategories()
  {
    return $this->belongsToMany(Subcategory::class);
  }

  public function category(){
    return $this->belongsTo(Category::class);
  }
  // public function categories()
  // {
  //   return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id')->withTimestamps();
  // }

}
