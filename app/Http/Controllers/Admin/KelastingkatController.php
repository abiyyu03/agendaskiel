<?php

namespace App\Http\Controllers\Admin;
use App\{Kelas_tingkat,Jurusan};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class KelastingkatController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $items = Kelas_tingkat::get();
            return DataTables::of($items)
                ->addIndexColumn()
                ->addColumn('action', function ($items) {
                    $aksi = '<a href="kelastingkat/' . $items->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i></a>';
                    $aksi .= '&nbsp;&nbsp;';
                    $aksi .= '<a class="btn btn-xs btn-danger" href="kelastingkat/' . $items->id . '/destroy"><i class="fa fa-trash-alt"></i></a>';
                    return $aksi;
                })
                ->make(true);
        }
        return view('pages.admin.kelas_tingkat.index');
    }
    public function create()
    {
        $data_jurusan = Jurusan::get();
        return view('pages.admin.kelas_tingkat.create',compact('data_jurusan'));
    }
    public function store(Request $request)
    {
        $data_kelas_tingkat = Kelas_tingkat::create($request->all());
        $data_kelas_tingkat->jurusans()->attach($request->input('jurusan_id'));
        return redirect()->route('kelastingkat.index');
    }

    public function destroy($id)
    {
        $data_kelas_tingkat = Kelas_tingkat::with('jurusans')->find($id);
        $data_kelas_tingkat->delete();
        return redirect()->route('kelastingkat.index');
    }
}
