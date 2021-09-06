<?php

namespace App\Http\Controllers\Admin; 
use App\{Kelas_tingkat, Kelas,Jurusan};   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KelasImport; 

class kelasController extends Controller
{
    public function index()
    { 
        if (request()->ajax()) {
            $data_kelas = Kelas::with('kelas_tingkat','Jurusan')->get();
            return DataTables::of($data_kelas)
                ->addIndexColumn()
                ->addColumn('action', function ($data_kelas) {
                    $aksi = '<a href="kelas/' . $data_kelas->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i></a>';
                    $aksi .= '&nbsp;&nbsp;';
                    $aksi .= '<a class="btn btn-xs btn-danger" href="kelas/' . $data_kelas->id . '/destroy"><i class="fa fa-trash-alt"></i></a>';
                    return $aksi;
                })
                ->editColumn('kelas_tingkat',function($data_kelas){
                    return $data_kelas->kelas_tingkat->kelas_tingkat;
                })
                ->editColumn('jurusan',function($data_kelas){
                    return $data_kelas->jurusan->jurusan;
                })
                ->make(true);
        }
        return view('pages.admin.kelas.index');
    }
    
    public function create()
    { 
        $data_kelas_tingkat = Kelas_tingkat::get();
        $data_jurusan = Jurusan::get();
        return view('pages.admin.kelas.create',compact('data_kelas_tingkat','data_jurusan')); 
    }
    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'kelas' => 'required',
            'kelas_tingkat_id' => 'not_in:0',
            'jurusan_id' => 'not_in:0'
        ]);
        Kelas::create($data_kelas);
        return redirect()->route('kelas.index')->with(['success' => 'Data berhasil ditambahkan !']);
    }
    public function edit($id)
    {
        $data_kelas = Kelas::findOrfail($id);
        $data_kelas_tingkat = Kelas_tingkat::get();
        return view('pages.admin.kelas.edit', compact('data_kelas','data_kelas_tingkat'));
    }

    public function update(Request $request, $id)
    {
        $data_kelas = Kelas::findOrfail($id);
        $data_kelas->kelas = $request->get('kelas');
        $data_kelas->kelas_tingkat_id = $request->get('kelas_tingkat_id');
        $data_kelas->save();
        return redirect()->route('kelas.index')->with(['success' => 'Data berhasil disunting !']);;
    }

    public function destroy($id)
    {
        $data_kelas = Kelas::findOrFail($id);
        $data_kelas->delete();
        return redirect()->route('kelas.index')->with(['success' => 'Data berhasil dihapus !']);
    }

    public function show()
    { 
        $file = request()->input('import_kelas'); 
        $row = Excel::import(new KelasImport, $file); 
        return redirect()->route('kelas.index')->with(['success' => 'Data berhasil diimport !']);;
    }
}
