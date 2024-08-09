<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sppd;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Auth;

class SppdController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->role == 'atasan'){
            $sppd = Sppd::all();
        }else{
            $sppd = Sppd::where('user_id', $user->id)->get();
        }
        

        return view('admin.sppd.index', compact(['sppd']));
    }

    public function add(){
        $user = User::where('role', 'karyawan')->get();

        return view('admin.sppd.add', compact(['user']));
    }

    public function create(Request $req){
        Sppd::create([
            'kode_surat' => $req->kode_surat,
            'nama_lembaga' => $req->nama_lembaga,
            'lokasi_pemberian_tugas' => $req->lokasi_pemberian_tugas,
            'nama_pemberi_tugas' => $req->nama_pemberi_tugas,
            'jabatan_pemberi_tugas' => $req->jabatan_pemberi_tugas,
            'user_id' => $req->user_id,
            'tugas' => $req->tugas,
            'anggaran' => $req->anggaran,
            'start' => $req->start,
            'end' => $req->end,
        ]);

        return redirect()->route('admin.sppd.index');
    }

    public function print($id){
        $sppd = Sppd::findOrFail($id);

        $pdf = Pdf::loadView('admin.sppd.print', compact(['sppd']));
        return $pdf->download('sppd.pdf');
    }

    public function delete($id){
        Sppd::destroy($id);

        return redirect()->route('admin.sppd.index');
    }
}
