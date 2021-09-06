<?php

namespace App\Http\Controllers\Admin;

use App\Jam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JamImport; 
use Yajra\DataTables\Facades\DataTables;

class JamController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data_jam = Jam::get();
            return DataTables::of($data_jam)
                ->addIndexColumn()
                ->addColumn('action', function ($data_jam) {
                    $aksi = '<a href="jam/' . $data_jam->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i></a>';
                    $aksi .= '&nbsp;&nbsp;';
                    $aksi .= '<a class="btn btn-xs btn-danger" href="jam/' . $data_jam->id . '/destroy"><i class="fa fa-trash-alt"></i></a>';
                    return $aksi;
                })
                ->make(true);
        }
        return view('pages.admin.jam.index');
    }
    public function create()
    {
        return view('pages.admin.jam.create');
    }
    public function edit($id)
    {
        $data_jam = Jam::findOrfail($id);
        return view('pages.admin.jam.edit', compact('data_jam'));
    }
    public function update(Request $request, $id)
    {
        $data_jam = Jam::findOrfail($id);
        $data_jam->jamke = $request->get('jamke');
        $data_jam->waktu = $request->get('waktu');
        $data_jam->save();
        return redirect()->route('jam.index')->with(['success' => 'Data berhasil disunting !']);;
    }
    public function store(Request $request)
    {
        $data_jam = Jam::create($request->all());
        return redirect()->route('jam.index')->with(['success' => 'Data berhasil ditambahkan !']);
    }
    public function destroy($id)
    {
        $data_jam = Jam::findOrFail($id);
        $data_jam->delete();
        return redirect()->route('jam.index')->with(['success' => 'Data berhasil dihapus !']);;
    } 
    public function show()
    {
        // request()->validate([
        //     'import_jam' => 'mimes:xlsx,xls,ods'
        // ]);
        $file = request()->input('import_jam'); 
        $row = Excel::import(new JamImport, $file);
        return redirect()->route('jam.index')->with(['success' => 'Data berhasil diimport !']);;
    }
}
