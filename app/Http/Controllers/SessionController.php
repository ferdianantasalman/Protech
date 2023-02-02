<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    // Login
    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email belum terisi',
            'password.required' => 'password belum terisi',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $data = User::all()->where('email', $request->email)->first();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('id', $data->id);
            Session::put('name', $data->name);
            // session([
            //     'id', $data->id,
            //     'name', $data->name,
            //     'email', $data->email,
            // ]);
            // Session::put('email', $request->email);
            return redirect('/dev')->with('success', 'Login berhasil');
        } else {
            return redirect('/login')->withErrors('Username atau Password salah');
        }
    }


    // Register
    public function register()
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'password_confirm' => 'required|min:4|same:password'
        ], [
            'name.required' => 'nama harap diisi',
            'email.required' => 'email harap diisi',
            'email.email' => 'Masukkan email yang valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'password harap diisi',
            'password.min' => 'password minimal 4 karakter',
            'password_confirm.required' => 'password konfirmasi harap diisi',
            'password_confirm.min' => 'password konfirmasi minimal 4 karakter',
            'password_confirm.same' => 'password konfirmasi harus sesuai dengan password',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ];

        User::create($data);

        return redirect('/login')->with('success', 'Akun berhasil didaftarkan');
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout berhasil');
    }
}