<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function do_login(Request $request){
        if (Auth::attempt($request->only('nik','password'))) {
            return redirect('/dashboard')->with('success','Login berhasil, Selamat datang!');
        }else{
            return redirect('/login')->with('fail','Login gagal, silahkan periksa kembali NIK atau Password anda.');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }

    public function dashboard(){
        return view('index');
    }

    public function register(){
        $user = Users::all();
        return view('adduser',compact('unitusaha'));
    }

    public function do_registrasi(Request $request){
        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'unitusaha';
        $user->id_unitusaha = $request->id_unitusaha;
        $user->save();

        Session::put('nama',$user->nama);
        return redirect('/registrasi-pengguna')->with('succes','');
    }
}
