<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\aktivitas;
use App\Models\akunkaryawans;

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
        if(!(User::where('email',$data['email'])->first())){
            $validation = ['email' => 'Email Atau Password salah!!'];
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $users = User::all();
        $boss = User::where('name', 'zoro')->first();

        $aktif['email'] = $request->email;

        if (Auth::attempt($data)){
            aktivitas::create($aktif);

            $user = User::where('email',$aktif)->first();
            if($user)
            return redirect()->route('dasboard',['id'=>$user->name])->with('sukses', 'Anda Berhasil Login');
        }
        return back()->withErrors(['email' => 'Username atau password salah.']);

    }
    public function akunlogout()
    {
        if(Auth::logout()){
            return redirect()->route('login')->with('logout','Berhasil Logout');
        }else{
            return redirect()->back();
        }
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
}
