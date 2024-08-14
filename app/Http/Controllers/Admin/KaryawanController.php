<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bagian;
use App\Models\Tunjangan;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = User::where('role', '!=', 'pemilik')->get();

        return view('admin.karyawan.index', compact(['karyawan']));
    }

    public function add(){
        $bagian = Bagian::all();
        $tunjangan = Tunjangan::all();

        return view('admin.karyawan.add', compact(['bagian', 'tunjangan']));
    }

    public function create(Request $req){
        $karyawan = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'bagian_id' => $req->bagian_id,
            'password' => Hash::make($req->password),
            'role' => 'karyawan'
        ]);

        if(is_array($req->tunjangan) && sizeof($req->tunjangan) != 0){
            foreach($req->tunjangan as $index => $t){
                $karyawan->tunjangan()->attach($req->tunjangan[$index]);
            }
        }

        return redirect()->route('admin.karyawan.index');
    }

    public function edit($id){
        $tunjangan = Tunjangan::all();
        $bagian = Bagian::all();
        $karyawan = User::findOrFail($id);

        return view('admin.karyawan.edit', compact(['karyawan', 'bagian', 'tunjangan']));
    }

    public function update(Request $req){
        // return $req->tunjangan;
        $karyawan = User::findOrFail($req->id);

        $karyawan->name = $req->name;
        $karyawan->email = $req->email;
        $karyawan->bagian_id = $req->bagian_id;
        if($req->password){
            $karyawan->password = Hash::make($req->password);
        }
        $karyawan->save();
        $karyawan->tunjangan()->detach();

        if(is_array($req->tunjangan) && sizeof($req->tunjangan) != 0){
            foreach($req->tunjangan as $index => $t){
                $karyawan->tunjangan()->attach($req->tunjangan[$index]);
            }
        }

        return redirect()->route('admin.karyawan.index');
    }

    public function delete($id){
        User::destroy($id);

        return redirect()->route('admin.karyawan.index');
    }
}
