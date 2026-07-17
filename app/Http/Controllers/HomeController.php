<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index()
   {
      // $auth = Auth::user();
      // dd($auth->id);
      return view('home');
   }
}
