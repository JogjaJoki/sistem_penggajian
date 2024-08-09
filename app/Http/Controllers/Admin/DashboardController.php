<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = User::all();
        $karyawan = User::where('role', 'karyawan')->get();
        $keuangan = User::where('role', 'keuangan')->get();
        $kepegawaian = User::where('role', 'kepegawaian')->get();

        return view('admin.index', compact(['user', 'karyawan', 'kepegawaian', 'keuangan']));
    }

    public function setting(){
        $setting = Setting::findOrFail(1);

        return view('admin.setting', compact('setting'));
    }

    public function update(Request $req){
        // return $req;
        $setting = Setting::findOrFail($req->id);

        $setting->tanggal_penggajian_bulanan = $req->tanggal;

        $setting->save();        

        return redirect()->route('setting');
    }
}
