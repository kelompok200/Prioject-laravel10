<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataAbsen;
use App\Models\User;
use App\Models\signin;
use App\Models\aktivitas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class absensi extends Controller
{
    public function index(Request $request,$id)
    {
        $data = [
            'data' => dataAbsen::get(),
            'user' => User::get(),
            'aktivitas' => aktivitas::get(),
        ];
        $name = User::find($id);
        $user = User::where('name', $id)->get();

        session()->flash('name' , $user);

        return view('dasboard',compact('data','user'));
    }
    public function create(Request $request,$id)
    {
        $data = User::where('name', $id)->get();
        return view('create',compact('data'));
    }
    public function store(Request $request,$id)
    {
        $validation = Validator::make($request->all(),[
            'kode_karyawan'     => 'required',
            'nama_karyawan'     => 'required',
            'tanggal_absensi'   => 'required',
            'jam_masuk'         => 'required',
            'jam_keluar'        => 'required',
        ]);
        $data = User::where('name', $id)->get();

        if($validation->fails())
        return redirect()->back()->withInput()->withErrors($validation);
        dataAbsen::create($request->all());
        foreach($data as $d)
        return redirect()->route('dasboard',['id'=>$d->name]);
    }
    public function edit(Request $request,$name,$id)
    {
        $iduser = dataAbsen::where('id', $id)->get();
        $user = User::where('name', $name)->get();
        $data = dataAbsen::find($id);
                
        return view('edit',compact('user','data','name'));
    }
    public function update(Request $request,$name,$id)
    {
        $validation = Validator::make($request->all(),[
            'kode_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'tanggal_absensi' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',

        ]);
        if($validation->fails())
        return redirect()->back()->withInput()->withErrors($validation);

        $data['kode_karyawan'] = $request->kode_karyawan;
        $data['nama_karyawan'] = $request->nama_karyawan;
        $data['tanggal_absensi'] = $request->tanggal_absensi;
        $data['jam_masuk'] = $request->jam_masuk;
        $data['jam_keluar'] = $request->jam_keluar;
        
        dataAbsen::whereId($id)->update($data);

        return redirect()->route('dasboard',['id'=>$name])->with('update','Update Berhasil');
    }
    public function delete(Request $request,$name,$id)
    {
        $data = dataAbsen::find($id);

        if($data){
            $data->delete();
            return redirect()->route('dasboard',['id'=>$name])->with('delete','deleting process');
        };
    }
    public function show(Request $request,$name,$id)
    {
        $data = dataAbsen::where('nama_karyawan', $id)->get();
        return view('show',compact('data','name'));
    }
}
