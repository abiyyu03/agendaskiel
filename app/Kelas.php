<?php

namespace App; 
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = ['kelas','jurusan_id','kelas_tingkat_id'];

    public function agendas ()
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
}
