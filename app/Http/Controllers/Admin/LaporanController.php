<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gaji;
use App\Models\Absensi;
use PDF;

class LaporanController extends Controller
{
    public function index($type){
        $type = $type;

        return view('admin.laporan.index', compact(['type']));
    }
    public function generate(Request $req){
        $type = $req->type;
        $start = $req->start;
        $end = $req->end;
        $data = [];

        if($type == 'karyawan'){
            $data = User::where('role', '!=', 'pemilik')->whereBetween('created_at', [$start, $end])->get();
        }
        if($type == 'gaji'){
            $data = Gaji::whereBetween('created_at', [$start, $end])->with('user')->get();
        }
        if($type == 'absensi'){
            $data = Absensi::whereBetween('created_at', [$start, $end])->with('user')->get();
        }

        $pdf = PDF::loadView('admin.laporan.' . $type, ['data' => $data]);
        
        return $pdf->download($type . '.pdf');
    }
}
