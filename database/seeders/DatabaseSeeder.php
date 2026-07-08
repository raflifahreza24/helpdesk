<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    */
   public function run(): void
   {
      // Role
      $admin = Role::create([
         'name' => 'admin',
         'label' => 'Administrator'
      ]);

      $agent = Role::create([
         'name' => 'agent',
         'label' => 'Support Agent'
      ]);

      $user = Role::create([
         'name' => 'user',
         'label' => 'Employee / Requester'
      ]);

      // Departement
      DB::table('departements')->insert([
         [
            'name' => 'Information Technology',
            'description' => 'Handles IT infrastructure and application support.',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'name' => 'Human Resources',
            'description' => 'Handles employee administration support.',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'name' => 'Finance',
            'description' => 'Handles finance and payment support.',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'name' => 'General Affairs',
            'description' => 'Handles office facility support.',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
      ]);
   }
}
