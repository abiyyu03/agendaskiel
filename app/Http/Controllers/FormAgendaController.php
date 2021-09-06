<?php

namespace App\Http\Controllers;

use App\{Kompetensi, Mapel, Agenda, Kelas, Absensi, Jam, Kelas_tingkat, Foto,Jurusan};
use Carbon\Carbon;
use Image;
use File;
use DB;
use Yajra\Datatables\DataTables;
use Illuminate\Http\Request;

class FormAgendaController extends Controller
{
    public function index(Request $request)
    {
        $mapels = Mapel::get();
        $kelas = Kelas::get();
        $data_jam = Jam::get();
        $kelas_tingkat = Kelas_tingkat::get();
        $data_kompetensi = Kompetensi::get();
        $data_jurusan = Jurusan::get();
        return view('pages.form-agenda', compact('mapels', 'kelas', 'data_jam', 'kelas_tingkat', 'data_kompetensi','data_jurusan'));
    }

    
    public function findKelas(Request $request)
    {
        $data = Kelas::select(['kelas', 'id', 'kelas_tingkat_id'])
            ->where('kelas_tingkat_id', $request->id)
            ->get();
        return response()->json($data);
    }

    public function findMapel(Request $request)
    {
        if ($request->id == 2) {
            $data = Mapel::select(['id', 'nama_mapel', 'kelas_tingkat_id'])
                ->where('kelas_tingkat_id', '=', 1)
                ->get();
            return response()->json($data);
        } elseif ($request->id == 1) {
            $data = Mapel::select(['id', 'nama_mapel', 'kelas_tingkat_id'])
                ->where('kelas_tingkat_id', '=', 1)
                ->get();
            return response()->json($data);
        } elseif ($request->id == 4) {
            $data = Mapel::select(['id', 'nama_mapel', 'kelas_tingkat_id'])
                ->where('kelas_tingkat_id', '=', 3)
                ->get();
            return response()->json($data);
        } elseif ($request->id == 3) {
            $data = Mapel::select(['id', 'nama_mapel', 'kelas_tingkat_id'])
                ->where('kelas_tingkat_id', '=', 3)
                ->get();
            return response()->json($data);
        } elseif ($request->id == 6) {
            $data = Mapel::select(['id', 'nama_mapel', 'kelas_tingkat_id'])
                ->where('kelas_tingkat_id', '=', 5)
                ->get();
            return response()->json($data);
        } elseif ($request->id == 5) {
            $data = Mapel::select(['id', 'nama_mapel', 'kelas_tingkat_id'])
                ->where('kelas_tingkat_id', '=', 5)
                ->get();
            return response()->json($data);
        }
    }

    public function findKompetensi(Request $request)
    {
        $data = Kompetensi::select(['id', 'nomor', 'kompetensi', 'mapel_id'])
            ->where('mapel_id', $request->id)
            ->get();
        return response()->json($data);
    }


    public function store(Request $request)
    {
        //Validasi 
        $request->validate([
            'kelas_tingkat_id' => 'required|not_in:0',
            'kelas_id' => 'required|not_in:0',
            'mapel_id' => 'required|not_in:0',
            'jam_id' => 'required|not_in:0',
            'kompetensi_id' => 'required|not_in:0',
            'jumlah_siswa' => 'required',
            'opsi_absensi' => 'required',
            'gambar' => 'required',
            'keterangan' => 'required',
            'jumlah_siswa' => 'required' 
        ]);

        //Simpan gambar ke storage
        $foto = $request->file('gambar'); 
        $filename = $foto->getClientOriginalName();

        $foto->move(public_path() . '/full/', $filename);
        $foto_resize = Image::make(public_path() . '/full/' . $filename);
        $foto_resize->fit(240, 120);
        $foto_resize->save(public_path('images/' . $filename));
        unlink(public_path('full/'.$filename));

        //simpan agenda ke database
        $agenda = new Agenda();
        $agenda->tanggal = $request->get('tanggal');
        $agenda->user_id = $request->get('user_id');
        $agenda->jam_id = $request->get('jam_id');
        $agenda->kelas_id = $request->get('kelas_id');
        $agenda->kelas_tingkat_id = $request->get('kelas_tingkat_id');
        $agenda->mapel_id = $request->get('mapel_id');
        $agenda->kompetensi_id = $request->get('kompetensi_id');
        $agenda->tugas = $request->get('tugas');
        $agenda->evaluasi = $request->get('evaluasi');
        $agenda->gambar = $filename;
        $agenda->save();

        //simpan absensi
        foreach ($request->get('jumlah_siswa') as $i => $value) 
        { 
            $absensi = new Absensi(); 
            $absensi->jumlah_siswa = $request->get('jumlah_siswa')[$i]; 
            $absensi->opsi_absensi = $request->get('opsi_absensi')[$i];
            $absensi->keterangan = $request->get('keterangan')[$i];
            $absensi->save();
        }  
        return redirect()->route('form-agenda')->with(['success' => 'Agenda Berhasil Disimpan !']);;
    }
}
