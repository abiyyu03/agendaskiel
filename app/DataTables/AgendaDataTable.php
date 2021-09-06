<?php

namespace App\DataTables;

use App\Agenda;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\support\str;
use SnappyImage;
use Carbon\Carbon;

class AgendaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn() 
            ->editColumn('tanggal',function($query){
                return $query->tanggal ? with(new Carbon($query->tanggal))->format('l, d F Y') : '';
            })
            ->editColumn('evaluasi',function($query){
                return Str::limit($query->evaluasi,30);
            })
            ->addColumn('action', function($query){ 
                    return '<a class="btn btn-xs btn-danger" href="agenda/' . $query->id . '/destroy"><i class="fa fa-trash-alt"></i></a>'; 
            })
            ->addColumn('gambar',function($query){ 
                return '<img lazy="loading" src="'.asset("/images/".$query->gambar).'">';
            })
            ->rawColumns(['gambar','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Agenda $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Agenda $model)
    {
        //get data dari form filter
        $from_date = $this->request()->get('from_date');
        $to_date = $this->request()->get('to_date'); 
        $nama_guru = $this->request()->get('nama_guru');
        // dd($from_date,$to_date);
        $query = $model->newQuery()->with('mapel','kelas_tingkat','kelas','kompetensi','jam','user');
        if(!empty($from_date) && !empty($to_date))
        {
            $from_date = Carbon::parse($from_date);
            $to_date = Carbon::parse($to_date); 

            $query->whereBetween('tanggal',[$from_date,$to_date]); 
        }
        if(!empty($nama_guru))
        {
            $query->where('user_id',$nama_guru);
        }
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {  
        $dates = Carbon::now(); 
        return $this->builder()
                    ->setTableId('agenda-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip') 
                    ->orderBy(1)    
                    ->scrollX(true)
                    ->autoWidth(false) 
                    ->parameters([
                        'lengthMenu' => [
                            [5, 10,25,50,-1],
                            ['5 Rows','10 Rows','25 Rows','50 Rows','Show all']
                        ],
                        'dom' => 'Blfrtip', 
                        'buttons' => [
                            'csv','excel',
                            [
                                'extend' => 'pdf',
                                'filename' => 'Laporan_AgendaOnline',
                                'orientation' => 'landscape',
                                'columns' => 'visible',
                                'title'=> 'Laporan Agenda SMAN 2 Gunungputri'
                            ], 
                        ]
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
           'DT_RowIndex'=> ['title'=>'#'],
           'tanggal'=> ['title'=>'Tanggal'],
           'jam.jamke'=> ['title'=>'Jam'],
           'kelas.kelas'=> ['title'=>'Kelas'],  
           'user.name'=> ['title'=>'Nama Guru'],   
           'mapel.nama_mapel'=> ['title'=>'Mapel'],
           'kompetensi.kompetensi' => ['title'=>'Kompetensi'],
           'tugas'=> ['title'=>'Tugas'],
           'evaluasi'=> ['title'=>'Evaluasi','width'=> 10],
           'gambar'=> ['printable' => false, 'exportable'=> false],
           'action' => ['printable' => false, 'exportable'=> false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Agenda_' . date('YmdHis');
    }
}
