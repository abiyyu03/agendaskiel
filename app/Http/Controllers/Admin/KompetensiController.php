<?php

namespace App\Http\Controllers\Admin;
use App\{Kompetensi,Mapel,Jurusan,Kelas_tingkat};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KompetensiImport; 
use Datatables;

class KompetensiController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $data_kompetensi = Kompetensi::with('mapel')->get();
            return Datatables::of($data_kompetensi)
                ->addIndexColumn()
                ->addColumn('action',function($data_kompetensi){
                    $aksi = '<a href="kompetensi/'.$data_kompetensi->id.'/edit" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i>
                        </a>';
                    $aksi .= "&nbsp&nbsp";
                    $aksi .= '<a href="kompetensi/'.$data_kompetensi->id.'/destroy" class="btn btn-danger">
                        <i class="fa fa-trash-alt"></i>
                        </a>';
                return $aksi;

            }) 
            ->editColumn('mapel',function($data_kompetensi){
                return $data_kompetensi->mapel->nama_mapel;
            })
            ->editColumn('kelas_tingkat',function($data_kompetensi){
                return $data_kompetensi->mapel->kelas_tingkat->kelas_tingkat;
            })
            ->editColumn('jurusan',function($data_kompetensi){
                return $data_kompetensi->mapel->jurusan->jurusan;
            })
            ->make(true);           
        }
        return view('pages.admin.kompetensi.index');
    }

    //Create Data
    public function create ()
    {
        $data_mapel = Mapel::get();
        return view('pages.admin.kompetensi.create',compact('data_mapel'));
    }
    public function store (Request $request)
    {
        $data_kompetensi = $request->validate([
            'nomor' => 'required',
            'kompetensi' => 'required',
            'mapel_id' => 'required'
        ]);
        $data_kompetensi = Kompetensi::create($request->all());
        return redirect()->route('kompetensi.index')->with(['success' => 'Data berhasil ditambahkan !']);
    }

    //Edit Data
    public function edit($id)
    {
        $data_kompetensi = Kompetensi::find($id);
        $data_mapel = Mapel::get();
        $data_jurusan = Jurusan::get();
        return view('pages.admin.kompetensi.edit',compact('data_kompetensi','data_mapel','data_jurusan'));
    }
    public function update(Request $request, $id)
    { 
        $data_kompetensi = Kompetensi::findOrFail($id);
        $data_kompetensi->nomor = $request->get('nomor');
        $data_kompetensi->kompetensi = $request->get('kompetensi');
        //dd($data_kompetensi->kompetensi);
        $data_kompetensi->mapel_id = $request->get('mapel_id');
        $data_kompetensi->save();
        return redirect()->route('kompetensi.index')->with(['success' => 'Data berhasil disunting !']);
    }

    public function destroy($id)
    {
        $data_kompetensi = Kompetensi::findOrFail($id);
        $data_kompetensi->delete();
        return redirect()->route('kompetensi.index')->with(['success' => 'Data berhasil dihapus !']);
    }
    //Import Data
    public function show() 
    {
        $file = request()->input('import_kompetensi'); 
        $row = Excel::import(new KompetensiImport, $file);
        return redirect()->route('kompetensi.index')->with(['success' => 'Data berhasil diimport !']);
    }
}
