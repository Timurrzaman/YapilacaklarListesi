<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('kayit');
    }

    public function register(Request $request)
    {
        $request->validate([
            'kullanici_adi' => 'required|string|max:255|unique:users,kullanici_adi',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // 'sifre' -> 'password' ve 'confirmed' kuralı eklendi
            'cinsiyet' => 'required|string',
            'dogum_tarihi' => 'required|date',
            'ulke' => 'required|string',
        ]);

        $user = User::create([
            'kullanici_adi' => $request->kullanici_adi,
            'email' => $request->email,
            'password' => bcrypt($request->password), // 'sifre' -> 'password'
            'cinsiyet' => $request->cinsiyet,
            'dogum_tarihi' => $request->dogum_tarihi,
            'ulke' => $request->ulke,
        ]);

        Auth::login($user); // Kullanıcıyı kayıttan sonra otomatik olarak giriş yaptır

        return view('hosgeldin', ['kullanici_adi' => $user->kullanici_adi]);
    }

    public function showHomePage()
    {
        return view('anasayfa');
    }
}

