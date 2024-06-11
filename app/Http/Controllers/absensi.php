<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataAbsen;
use App\Models\User;
use App\Models\signin;
use App\Models\akunkaryawans;
use App\Models\aktivitas;
use App\Models\JenisShift;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Exports\Export;
use Maatwebsite\Excel\Facades\Excel;


class absensi extends Controller
{
    public function index(Request $request,$id)
    {

        $data = [
            'data' => akunkaryawans::get(),
            'user' => User::get(),
            'aktivitas' => aktivitas::get(),
            'getData' => akunkaryawans::where('name', $id)->get()
            ];

        return view('dasboard',compact('data','id'));
    }
    public function create(Request $request,$id)
    {

        $data = JenisShift::get();
        return view('create',compact('id','data'));
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
        $data = [
                'name'               => $id,
                'kode_karyawan'      => $request->kode_karyawan,
                'nama_karyawan'      => $request->nama_karyawan,
                'tanggal_absensi'    => $request->tanggal_absensi,
                'jam_masuk'          => $request->jam_masuk,
                'jam_keluar'         => $request->jam_keluar,
                'jenis_shift'        => $request->jenis_shift
            ];
        akunkaryawans::create($data);

        return redirect()->route('dasboard',['id'=>$id]);
    }
    public function edit(Request $request,$name,$id)
    {
        $data = akunkaryawans::find($id);
        $shift = JenisShift::where('JenisShift', $data->jenis_shift)->get();
        $shifts = JenisShift::get();

        return view('edit',compact('data','name','id', 'shift','shifts'));
    }
    public function update(Request $request,$name,$id)
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

        $data['kode_karyawan']      = $request->kode_karyawan;
        $data['nama_karyawan']      = $request->nama_karyawan;
        $data['tanggal_absensi']    = $request->tanggal_absensi;
        $data['jam_masuk']          = $request->jam_masuk;
        $data['jam_keluar']         = $request->jam_keluar;
        $data['jenis_shift']        = $request->jenis_shift;

        akunkaryawans::whereId($id)->update($data);

        return redirect()->route('dasboard',['id'=>$name])->with('update','Update Berhasil');
    }
    //delete
    public function delete(Request $request,$name,$id)
    {
        $data = akunkaryawans::find($id);

        if($data){
            $data->delete();
            return redirect()->route('dasboard',['id'=>$name])->with('delete','deleting process');
        };
    }
    public function deleteAkun(Request $request, $name , $id){
        $user = User::find($id);

        if($user){
            $user->delete();
            return redirect()->route('karyawan',['name' => $name])->with('delete','deleting process');
        }
    }

    //Show
    public function show(Request $request,$name,$id)
    {
        $dataakun = akunkaryawans::where('id', $id)->get();
        return view('show',compact('name','dataakun'));
    }

    public function cetak_pdf(){
        $pdf = akunkaryawans::all();

        $cetak_pdf = PDF::loadview('cetak_pdf',['pdf' =>$pdf])->setPaper('a4','landscape');
        return $cetak_pdf->stream();
    }
    public function pdf(Request $request, $name){
        $pdf = akunkaryawans::where('name', $name)->get();

        $cetak_pdf = PDF::loadview('cetak_pdf',['pdf' =>$pdf])->setPaper('a4','landscape');
        return $cetak_pdf->stream();
    }

    public function karyawan(Request $request,$id){
        $data = [
            'data' => akunkaryawans::get(),
            'user' => User::get(),
            'aktivitas' => aktivitas::get(),
            ];
        return view('Karyawan.karyawan',compact('id','data'));
    }

    public function AbsenAkun(Request $request, $name, $id){
        $data = akunkaryawans::where('name', $id)->get();

        return view('Absen.absen', compact('data','name','id'));
    }
}
