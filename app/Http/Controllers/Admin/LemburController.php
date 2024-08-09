<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lembur;
use App\Models\User;


class LemburController extends Controller
{
    public function index(){
        $lembur = Lembur::all();

        return view('admin.lembur.index', compact(['lembur']));
    }

    public function add(){
        $karyawan = User::where('role', '!=', 'pemilik')->get();

        return view('admin.lembur.add', compact(['karyawan']));
    }

    public function create(Request $req){
        Lembur::create([
            'user_id' => $req->user_id,
            'durasi' => $req->durasi,
            'rate' => $req->rate,
        ]);

        return redirect()->route('admin.lembur.index');
    }

    public function edit($id){
        $lembur = Lembur::findOrFail($id);

        return view('admin.lembur.edit', compact(['lembur']));
    }

    public function update(Request $req){
        $lembur = Lembur::findOrFail($req->id);

        $lembur->durasi = $req->durasi;
        $lembur->rate = $req->rate;

        $lembur->save();

        return redirect()->route('admin.lembur.index');
    }

    public function delete($id){
        Lembur::destroy($id);

        return redirect()->route('admin.lembur.index');
    }
}
