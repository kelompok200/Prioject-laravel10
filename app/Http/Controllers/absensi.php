<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataAbsen;
use App\Models\User;
use App\Models\signin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class absensi extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'data' => dataAbsen::get(),
            'user' => User::get(),
        ];
        return view('dasboard',compact('data'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'kode_karyawan'     => 'required',
            'nama_karyawan'     => 'required',
            'tanggal_absensi'   => 'required',
            'jam_masuk'         => 'required',
            'jam_keluar'        => 'required',
        ]);
        if($validation->fails())
        return redirect()->back()->withInput()->withErrors($validation);
        dataAbsen::create($request->all());
        return redirect()->route('dasboard');
    }
    public function edit(Request $request,$id)
    {
        $data = dataAbsen::find($id);
        
        return view('edit',compact('data'));
    }
    public function update(Request $request , $id)
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
        return redirect()->route('dasboard');
    }
    public function delete(Request $request,$id)
    {
        $data = dataAbsen::find($id);

        if($data){
            $data->delete();
        };
        return redirect()->route('dasboard')->with('delete','deleting process');

    }
}
