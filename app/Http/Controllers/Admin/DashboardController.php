<?php

namespace App\Http\Controllers\Admin;

use App\{Kompetensi,Mapel,Kelas,Siswa,Agenda};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $kompetensi = Kompetensi::get();
        $mapel = Mapel::get();
        $kelas = Kelas::get();
        $agenda = Agenda::get();
        return view('pages.admin.dashboard',compact('kompetensi','mapel','kelas','agenda'));
    }
}
