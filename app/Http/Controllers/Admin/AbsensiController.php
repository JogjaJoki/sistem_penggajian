<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use Auth;

class AbsensiController extends Controller
{
    public function index(){
        $absensi = Absensi::all();

        return view('admin.absensi.index', compact(['absensi']));
    }

    public function myabsensi(){
        $absensi = Absensi::where('user_id', Auth::user()->id)->get();

        return view('admin.absensi.myabsensi', compact(['absensi']));
    }

    public function add(){
        $karyawan = User::where('role', '!=', 'pemilik')->get();

        return view('admin.absensi.add', compact(['karyawan']));
    }

    public function create(Request $req){
        Absensi::create([
            'user_id' => $req->user_id,
            'in' => $req->in,
            'out' => $req->out,
            'keterangan' => $req->keterangan,
            'denda' => $req->denda,
        ]);

        return redirect()->route('admin.absensi.index');
    }

    public function edit($id){
        $absensi = Absensi::findOrFail($id);
        $karyawan = User::where('role', 'karyawan')->get();

        return view('admin.absensi.edit', compact(['absensi', 'karyawan']));
    }

    public function update(Request $req){
        $absensi = Absensi::findOrFail($req->id);

        $absensi->in = $req->in;
        $absensi->out = $req->out;
        $absensi->keterangan = $req->keterangan;
        $absensi->denda = $req->denda;

        $absensi->save();

        return redirect()->route('admin.absensi.index');
    }

    public function delete($id){
        Absensi::destroy($id);

        return redirect()->route('admin.absensi.index');
    }
}
