<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Jam,Agenda,Absensi,Kelas,Mapel,Kompetensi};
use DB;

class PengaturanController extends Controller
{
	public function index()
	{
		return view('pages.admin.pengaturan.index');
	}
    public function jam()
    {
    	DB::table('jam')->truncate();
        return redirect()->route('pengaturan.index');
    }
    public function absensi()
    {
    	DB::table('absensi')->truncate();
        return redirect()->route('pengaturan.index');
    }
    public function kelas()
    {
    	DB::table('kelas')->truncate();
        return redirect()->route('pengaturan.index');
    }
    public function mapel()
    {
    	DB::table('mapel')->truncate();
        return redirect()->route('pengaturan.index');
    }
    public function agenda()
    {
    	DB::table('agenda')->truncate();
        return redirect()->back();
    }
    public function kompetensi()
    {
    	DB::table('kompetensi')->truncate();
        return redirect()->route('pengaturan.index');
    }
}
