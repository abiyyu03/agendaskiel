<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Absensi;
use Carbon\Carbon;
use Datatables;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
    	if(request()->ajax())
    	{ 
    		$data_absensi = Absensi::get();
    		return Datatables::of($data_absensi) 
                ->addIndexColumn()
                ->editColumn('created_at',function($data_absensi){
                    return $data_absensi->created_at ? with(new Carbon($data_absensi->created_at))->format('l, d F Y - H:i T') : '';
                })
                ->addColumn('action', function ($data_absensi) {
                    $aksi = '<a href="absensi/' . $data_absensi->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i></a>';
                    $aksi .= '&nbsp;&nbsp;';
                    $aksi .= '<a class="btn btn-xs btn-danger" href="absensi/' . $data_absensi->id . '/destroy"><i class="fa fa-trash-alt"></i></a>';
                    return $aksi;
                })->make(true);
    	}
    	return view('pages.admin.absensi.index');
    }

    public function edit($id)
    {
    	$data_absensi = Absensi::find($id);
    	return view('pages.admin.absensi.edit',compact('data_absensi'));
    }
    public function update(Request $request, $id)
    {
    	$data_absensi = Absensi::find($id); 
    	$data_absensi->jumlah_siswa = $request->get('jumlah_siswa'); 
    	$data_absensi->opsi_absensi = $request->get('opsi_absensi'); 
    	$data_absensi->keterangan = $request->get('keterangan'); 
    	$data_absensi->save();
    	return redirect()->route('absensi.index')->with(['success' => 'Data berhasil disunting!']);
    }
    public function destroy($id)
    {
    	$data_absensi = Absensi::find($id);
    	$data_absensi->delete();
    	return redirect()->route('absensi.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
