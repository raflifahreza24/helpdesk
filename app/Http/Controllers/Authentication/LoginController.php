<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function showLoginForm()
   {
      return view('authentication/login');
   }

   public function login(Request $request)
   {
      $credentials = $request->validate([
         'email' => ['required', 'email'],
         'password' => ['required'],
      ], [
         'email.required' => 'Email is required',
         'email.email' => 'Email format is invalid',
         'password.required' => 'Password is required',
      ]);

      $user = User::where('email', $credentials['email'])->first();

      if (!$user) {
         return back()
            ->with('error', 'Email not found')
            ->onlyInput('email');
      }

      if (!Hash::check($credentials['password'], $user->password)) {
         return back()
            ->with('error', 'Password is incorrect')
            ->onlyInput('email');
      }

      Auth::login($user, $request->boolean('remember'));
      $request->session()->regenerate();

      return redirect()->intended(route('home'));
   }

   public function logout(Request $request)
   {
      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect()->route('show.login');
   }
}
