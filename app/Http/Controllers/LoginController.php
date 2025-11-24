<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Giriş formunu gösterir
    public function showLoginForm()
    {
        return view('giris');
    }

    // Kullanıcı giriş denemesini işler
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Başarılı girişte hoşgeldin ekranına yönlendir
            return view('hosgeldin', ['kullanici_adi' => Auth::user()->kullanici_adi]);
        }

        // Başarısız olursa, hata mesajıyla birlikte forma geri gönder
        return back()->withErrors([
            'email' => 'Girilen bilgilerle eşleşen bir kullanıcı bulunamadı.',
        ])->onlyInput('email');
    }

    // Kullanıcı çıkışını işler
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

