<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error', 'message' => 'Wrong Email or Password! Try Again!']);
    }


    public function logout(Request $request){
        Auth::logout();
        session()->put('keranjang', []);
        
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/home');
    }
}
