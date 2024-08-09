<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\Setting;
use App\Models\User;
use Auth;

class GajiController extends Controller
{
    private function generateGaji(){
        $user = User::where('role', '!=', 'pemilik')->get();
        $setting = Setting::findOrFail(1);
    
        // Cek apakah tanggal penggajian sesuai dengan hari ini
        if($setting->tanggal_penggajian_bulanan != date('d')){
            return;
        }
    
        foreach($user as $u){
            $gaji = Gaji::where('user_id', $u->id)
                        ->whereYear('created_at', date('Y'))
                        ->whereMonth('created_at', date('m'))
                        ->first();
            
            if($gaji) {
                continue;
            }
    
            $upah_lembur = 0;
            foreach($u->lemburs as $lembur){
                $upah_lembur += (intval($lembur->durasi) * intval($lembur->rate));
            }
    
            $gajiBaru = new Gaji;
            $gajiBaru->user_id = $u->id;
            $gajiBaru->uang_lembur = $upah_lembur;
            $gajiBaru->potongan_absensi = 0;
            $gajiBaru->gaji_bersih = $u->bagian->gaji - $gajiBaru->potongan_absensi + $upah_lembur;
            $gajiBaru->gaji_kotor = $u->bagian->gaji;
            $gajiBaru->save();
        }
    }

    public function renew(){
        Gaji::whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', date('m'))
                    ->delete();
        $this->generateGaji();

        return redirect()->route('admin.gaji.index');
    }

    public function mygaji(){
        $gaji = Gaji::where('user_id', Auth::user()->id)->get();

        return view('admin.gaji.mygaji', compact(['gaji']));
    }

    public function index(){
        $this->generateGaji();
        $gaji = Gaji::all();

        return view('admin.gaji.index', compact(['gaji']));
    }

    public function edit($id){
        $gaji = Gaji::findOrFail($id);

        return view('admin.gaji.edit', compact(['gaji']));
    }

    public function update(Request $req){
        $gaji = Gaji::findOrFail($req->id);

        $gaji->potongan_absensi = $req->potongan_absensi;
        $gaji->gaji_bersih = $gaji->user->bagian->gaji - $gaji->potongan_absensi + $gaji->uang_lembur;
        $gaji->gaji_kotor = $gaji->user->bagian->gaji;

        $gaji->save();

        return redirect()->route('admin.gaji.index');
    }

    public function delete($id){
        Gaji::destroy($id);

        return redirect()->route('admin.gaji.index');
    }
}
