<?php

namespace App\Http\Controllers\Admin; 
use App\{Mapel,Kelas_tingkat,Jurusan};  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MapelImport; 

class MapelController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data_mapel = Mapel::with('kelas_tingkat','jurusan')->get();
            return DataTables::of($data_mapel)
                ->addIndexColumn()
                ->addColumn('action', function ($data_mapel) {
                    $aksi = '<a href="mapel/' . $data_mapel->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i></a>';
                    $aksi .= '&nbsp;&nbsp;';
                    $aksi .= '<a class="btn btn-xs btn-danger" href="mapel/' . $data_mapel->id . '/destroy"><i class="fa fa-trash-alt"></i></a>';
                    return $aksi;
                })
                ->editColumn('kelas_tingkat',function($data_mapel){
                    return $data_mapel->kelas_tingkat->kelas_tingkat;
                })
                ->editColumn('jurusan',function($data_mapel){
                    return $data_mapel->jurusan->jurusan;
                })
                ->make(true);
        }
        return view('pages.admin.mapel.index');
    }

    public function create()
    {
        $data_kelas_tingkat = Kelas_tingkat::get(); 
        $data_jurusan = Jurusan::get();
        return view('pages.admin.mapel.create',compact('data_kelas_tingkat','data_jurusan'));  
    }
    public function store(Request $request)
    {
        $data_mapel = Mapel::create($request->all());
        return redirect()->to('/admin/mapel')->with(['success' => 'Data berhasil ditambahkan !']);;
    }

    public function edit($id)
    {
        $data_mapel = Mapel::findOrFail($id); 
        $data_kelas_tingkat = Kelas_tingkat::get(); 
        return view('pages.admin.mapel.edit', compact('data_mapel','data_kelas_tingkat'));
    }

    public function update(Request $request, $id)
    {
        $data_mapel = Mapel::findOrFail($id);
        $data_mapel->nama_mapel = $request->get('nama_mapel');
        $data_mapel->kelas_tingkat_id = $request->get('kelas_tingkat_id');
        $data_mapel->save();

        return redirect()->to('/admin/mapel')->with(['success' => 'Data berhasil disunting !']);;
    }

    public function destroy($id)
    {
        $data_mapel = Mapel::findOrFail($id);
        $data_mapel->delete();
        return redirect()->to('/admin/mapel')->with(['success' => 'Data berhasil dihapus !']);
    } 

    //import file excel
    public function show()
    {
        $file = request()->input('import_mapel'); 
        $row = Excel::import(new MapelImport, $file);
        return redirect()->route('mapel.index')->with(['success' => 'Data berhasil diimport !']);
    }
}
