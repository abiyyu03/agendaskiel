<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = "mapel"; 
    protected $fillable = ['nama_mapel','kelas_tingkat_id','jurusan_id']; 

    public function kompetensis()
    {
        return $this->hasMany('App\Kompetensi');
    }
    public function agendas()
    {
        return $this->hasMany('App\Agenda');
    }
    public function kelas_tingkat()
    { 
        return $this->belongsTo('App\Kelas_tingkat');
    } 
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan'); 
    }
    public function kelas()
    {
        return $this->hasMany('App\Kelas');
    }
    
}
