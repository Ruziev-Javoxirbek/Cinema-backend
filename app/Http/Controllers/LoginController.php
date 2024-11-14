<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            // Если пользователь аутентифицирован, отображаем приветствие
            return view('auth.login', ['message' => 'Добро пожаловать, ' . Auth::user()->name . '!']);
        }
        // Если пользователь не аутентифицирован, отображаем форму входа
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Если аутентификация успешна, остаёмся на странице /login
            return redirect('/login');
        }

        return back()->withErrors([
            'email' => 'Неверные данные для входа.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Перенаправление на страницу входа после выхода
    }
}
