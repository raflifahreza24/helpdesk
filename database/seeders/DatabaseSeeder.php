<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

      // Categories
      DB::table('categories')->insert([
         [
            'name' => 'Hardware',
            'description' => 'Computer, printer, scanner, and device issues.',
            'color' => 'primary',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'name' => 'Software',
            'description' => 'Application installation and software issues.',
            'color' => 'info',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'name' => 'Network',
            'description' => 'Internet, WiFi, VPN, and LAN issues.',
            'color' => 'warning',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'name' => 'Account Access',
            'description' => 'Login, password, and access permission issues.',
            'color' => 'danger',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'name' => 'Request',
            'description' => 'General service request.',
            'color' => 'success',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],
      ]);

      // User
      User::insert([
         // Administrator
         [
            'id_role' => $admin->id,
            'id_departement' => 1,
            'name' => 'System Administrator',
            'email' => 'raflifahreza11@gmail.com',
            'phone' => '081111111111',
            'password' => Hash::make('raflihard123'),
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ],

         // // Agent 1
         // [
         //    'role_id' => 2,
         //    'department_id' => 1,
         //    'name' => 'Budi Santoso',
         //    'email' => 'budi@helpdesk.test',
         //    'phone' => '081111111112',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],

         // // Agent 2
         // [
         //    'role_id' => 2,
         //    'department_id' => 1,
         //    'name' => 'Ahmad Prasetyo',
         //    'email' => 'ahmad@helpdesk.test',
         //    'phone' => '081111111113',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],

         // // Agent 3
         // [
         //    'role_id' => 2,
         //    'department_id' => 1,
         //    'name' => 'Dimas Saputra',
         //    'email' => 'dimas@helpdesk.test',
         //    'phone' => '081111111114',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],

         // // Employee
         // [
         //    'role_id' => 3,
         //    'department_id' => 2,
         //    'name' => 'Siti Rahma',
         //    'email' => 'siti@helpdesk.test',
         //    'phone' => '081111111115',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],

         // [
         //    'role_id' => 3,
         //    'department_id' => 3,
         //    'name' => 'Andi Wijaya',
         //    'email' => 'andi@helpdesk.test',
         //    'phone' => '081111111116',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],

         // [
         //    'role_id' => 3,
         //    'department_id' => 4,
         //    'name' => 'Rina Putri',
         //    'email' => 'rina@helpdesk.test',
         //    'phone' => '081111111117',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],

         // [
         //    'role_id' => 3,
         //    'department_id' => 5,
         //    'name' => 'Fajar Nugroho',
         //    'email' => 'fajar@helpdesk.test',
         //    'phone' => '081111111118',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],

         // [
         //    'role_id' => 3,
         //    'department_id' => 6,
         //    'name' => 'Dian Lestari',
         //    'email' => 'dian@helpdesk.test',
         //    'phone' => '081111111119',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],

         // [
         //    'role_id' => 3,
         //    'department_id' => 7,
         //    'name' => 'Rudi Hartono',
         //    'email' => 'rudi@helpdesk.test',
         //    'phone' => '081111111120',
         //    'password' => Hash::make('password'),
         //    'is_active' => true,
         //    'created_at' => now(),
         //    'updated_at' => now(),
         // ],
      ]);
   }
}
