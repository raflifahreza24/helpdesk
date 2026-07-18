<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   public static function datatable()
   {
      return self::select([
         'id',
         'name',
         'description',
         'color',
         'is_active'
      ])
         ->get();
   }
}
