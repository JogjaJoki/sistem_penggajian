<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VariabelCuti;

class MonitoringController extends Controller
{
    public function index(){
        $data = VariabelCuti::withCount('cuti')->get();
        return view('admin.monitoring.index', compact('data'));
    }    
}
