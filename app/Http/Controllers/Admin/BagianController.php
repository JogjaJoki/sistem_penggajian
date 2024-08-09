<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bagian;

class BagianController extends Controller
{
    public function index(){
        $bagian = Bagian::all();

        return view('admin.bagian.index', compact(['bagian']));
    }

    public function add(){
        return view('admin.bagian.add');
    }

    public function create(Request $req){
        Bagian::create([
            'name' => $req->name,
            'gaji' => $req->gaji,
        ]);

        return redirect()->route('admin.bagian.index');
    }

    public function edit($id){
        $bagian = Bagian::findOrFail($id);

        return view('admin.bagian.edit', compact(['bagian']));
    }

    public function update(Request $req){
        $bagian = Bagian::findOrFail($req->id);

        $bagian->name = $req->name;
        $bagian->gaji = $req->gaji;

        $bagian->save();

        return redirect()->route('admin.bagian.index');
    }

    public function delete($id){
        Bagian::destroy($id);

        return redirect()->route('admin.bagian.index');
    }
}
