<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bagian;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = User::where('role', 'karyawan')->get();

        return view('admin.karyawan.index', compact(['karyawan']));
    }

    public function add(){
        $bagian = Bagian::all();

        return view('admin.karyawan.add', compact(['bagian']));
    }

    public function create(Request $req){
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'bagian_id' => $req->bagian_id,
            'password' => Hash::make($req->password),
            'role' => 'karyawan'
        ]);

        return redirect()->route('admin.karyawan.index');
    }

    public function edit($id){
        $bagian = Bagian::all();
        $karyawan = User::findOrFail($id);

        return view('admin.karyawan.edit', compact(['karyawan', 'bagian']));
    }

    public function update(Request $req){
        $karyawan = User::findOrFail($req->id);

        $karyawan->name = $req->name;
        $karyawan->email = $req->email;
        $karyawan->bagian_id = $req->bagian_id;
        if(!$karyawan->password){
            $karyawan->password = Hash::make($req->password);
        }
        

        $karyawan->save();

        return redirect()->route('admin.karyawan.index');
    }

    public function delete($id){
        User::destroy($id);

        return redirect()->route('admin.karyawan.index');
    }
}
