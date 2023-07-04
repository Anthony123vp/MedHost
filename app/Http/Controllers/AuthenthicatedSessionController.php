<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class AuthenthicatedSessionController extends Controller
{
    public function store(Request $request){
        $credentials=$request->validate([
            'email' => ['required','string','email'],
            'password' => ['required','string'],
        ]);

        
        if(!Auth::attempt($credentials)){
            throw ValidationException::withMessages([
                'email' => 'No encontramos su usuario en la base de datos',
                'password' => 'La contraseña ingresada no es correcta'
            ]);
        };

        $request->session()->regenerate();
        return redirect('Dashboard');
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Home_MedHost')->with('status','You area Loggout out');

    }
}
