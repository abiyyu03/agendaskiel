<?php

namespace App\Http\Controllers\Admin;
use App\{Agenda,Mapel,Kelas,Kelas_tingkat,Jam,User};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\DataTables\AgendaDataTable;
use Carbon\Carbon;
use DB;

class AgendaController extends Controller
{
    public function index(AgendaDataTable $dataTable )
    {  
        Carbon::setlocale('id'); 
        $data_user = User::get(); 
        return $dataTable->render('pages.admin.agenda.index',compact('data_user'));
    } 
    public function destroy($id)
    {
        $data_agenda = Agenda::find($id);
        unlink(public_path('images/'.$data_agenda->gambar)); 
        $data_agenda->delete();
        return redirect()->route('agenda.index')->with(['success'=>'Data Agenda berhasil dihapus']);;
    }
}
