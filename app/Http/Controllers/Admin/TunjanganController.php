<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tunjangan;
use App\Models\User;

class TunjanganController extends Controller
{
    public function index(){
        $tunjangan = Tunjangan::all();

        return view('admin.tunjangan.index', compact(['tunjangan']));
    }

    public function add(){
        return view('admin.tunjangan.add');
    }

    public function create(Request $req){
        Tunjangan::create([
            'name' => $req->name,
            'rate' => $req->rate,
        ]);

        return redirect()->route('admin.tunjangan.index');
    }

    public function edit($id){
        $tunjangan = Tunjangan::findOrFail($id);

        return view('admin.tunjangan.edit', compact(['tunjangan']));
    }

    public function update(Request $req){
        $tunjangan = Tunjangan::findOrFail($req->id);

        $tunjangan->name = $req->name;
        $tunjangan->rate = $req->rate;

        $tunjangan->save();

        return redirect()->route('admin.tunjangan.index');
    }

    public function delete($id){
        Tunjangan::destroy($id);

        return redirect()->route('admin.tunjangan.index');
    }
}
