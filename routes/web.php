<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Master\DepartementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('starter');
});

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
   });
});
