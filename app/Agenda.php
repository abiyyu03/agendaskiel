<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = "agenda"; 
    protected $fillable = ['tanggal','kelas_id','kelas_tingkat_id','jam_id','user_id','mapel_id','evaluasi','tugas','kompetensi_id','gambar']; 

    public function mapel ()
    {
        return $this->belongsTo('App\Mapel');
    }
    public function kelas ()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function kelas_tingkat ()
    {
        return $this->belongsTo('App\Kelas_tingkat');
    }
    public function kompetensi ()
    {
        return $this->belongsTo('App\Kompetensi');
    }
    public function user ()
    {
        return $this->belongsTo('App\User');
    }
    public function jam ()
    {
        return $this->belongsTo('App\Jam');
    } 
}