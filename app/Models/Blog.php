<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   protected $fillable = ['title', 'slug', 'category_image','content'];

   public $timestamps = true;



}
