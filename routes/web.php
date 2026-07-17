<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Master\DepartementController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
   Route::get('/login', [LoginController::class, 'showLoginForm'])
      ->name('show.login');

   Route::post('/login', [LoginController::class, 'login'])
      ->name('login');
});

Route::middleware('auth')->group(function () {
   Route::get('/', [HomeController::class, 'index'])
      ->name('home');

   Route::prefix('admin')->group(function () {
      Route::prefix('role')->group(function () {
         Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
         Route::get('/datatable', [RoleController::class, 'datatable'])->name('admin.role.datatable');
      });
   });

   Route::prefix('master')->group(function () {
      Route::prefix('departement')->group(function () {
         Route::get('/', [DepartementController::class, 'index'])->name('master.departement.index');
         Route::get('/datatable', [DepartementController::class, 'datatable'])->name('master.departement.datatable');
         Route::get('/edit/{id}', [DepartementController::class, 'edit'])->name('master.departement.edit');
         Route::post('/create', [DepartementController::class, 'create'])->name('master.departement.create');
         Route::post('/update', [DepartementController::class, 'update'])->name('master.departement.update');
         Route::post('/delete', [DepartementController::class, 'delete'])->name('master.departement.delete');
      });
   });

   Route::post('/logout', [LoginController::class, 'logout'])
      ->name('logout');
});
