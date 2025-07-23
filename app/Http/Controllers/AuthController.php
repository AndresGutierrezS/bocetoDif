<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nombre_usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt([
            'nombre_usuario' => $credentials['nombre_usuario'],
            'password' => $credentials['password']
        ])) {
            $request->session()->regenerate();
            return redirect()->intended(url('/'));
        }

        return back()->withErrors([
            'nombre_usuario' => 'Credenciales incorrectas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showRegisterForm()
    {
        return view('registro');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario',
            'password' => 'required|string|confirmed',
        ]);

        Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
    }
}