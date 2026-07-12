<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
   public static function datatable()
   {
      return self::select([
         'id',
         'name',
         'description',
         'is_active'
      ])
         ->get();
   }
}
