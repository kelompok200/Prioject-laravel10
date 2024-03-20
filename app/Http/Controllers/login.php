<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\aktivitaslogin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    public  function login()
    {
        $data = User::get();
        return view('login',compact('data'));
    }
    public function signin()
    {
        return view('signin');
    }
    public function inputsignin(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|unique:users',
            'name' => 'required|unique:users',
            'password' => 'required',
        ]);
    
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
            }
        
            $data['username'] = $request->name;
            $data['email'] = $request->email;

            $symbols = ['!', '@', '#', '$', '%', '&', '*'];

            if (strlen($request->password) < 8) {
                $validation = ['password' => 'The password must be at least 8 characters long.'];
                return redirect()->back()->withInput()->withErrors($validation);
            } else {
                if (!preg_match('/[\\' . implode('\\', $symbols) . ']/', $request->password)) {
                    $validation = ['password' => 'The password must contain at least one symbol: ' . implode(', ', $symbols)];
                    return redirect()->back()->withInput()->withErrors($validation);
                }
                $data['password'] = Hash::make($request->password);
                $data['verifikasi'] = Hash::make($request->verifikasi);
                if($request->password != $request->verifikasi){
                    $validation = ['password' => 'The password and confrimation password must be the same!!'];
                    return redirect()->back()->withInput()->withErrors($validation);
                }else{
                    User::create($request->all());
                }
                }
                return redirect()->route('login')->with('sukses-sign','Berhasil daftar');
    }
    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $validation = Validator::make($request->all(),[
            'email' => 'required',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $users = User::all();
        if(!($user = $users->where('email',$data['email'])->first())){
            $validation = ['email' => 'Email Atau Password salah!!'];
            return redirect()->back()->withInput()->withErrors($validation);
        }
        $user = $users->where('email',$data['email'])->first();
        $nama = $user->name;
        if (Auth::attempt($data)){
            return redirect()->route('dasboard')->with('sukses', 'Anda Berhasil Login')->with('nama',$nama);
        }
        return back()->withErrors(['email' => 'Username atau password salah.']);

    }
    public function logout()
    {
        if(Auth::logout()){
            return redirect()->route('login');
        }
    }
}
