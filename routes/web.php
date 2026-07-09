<?php

use App\Http\Controllers\Admin\RoleController;
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
