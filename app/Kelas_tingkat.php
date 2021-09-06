<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas_tingkat extends Model
{
    protected $table = "kelas_tingkat";
    protected $fillable = ['kelas_tingkat'];

    public function Kompetensis()
    {
        return $this->hasManyThrough('App\Kompetensi', 'App\Mapel');
    } 
    
    //relasi 1:N ke tabel kelas
    public function kelas () 
    {
        return $this->hasMany('App\Kelas');
    }

    // relasi one to many ke tabel mapel
    public function mapels()
    {
        return $this->hasMany('App\Mapel', 'kelas_tingkat_id');
    }
    
    public function agendas()
    {
        return $this->hasMany('App\Agenda');
    }

    // public function jurusans()
    // {
    //     return $this->belongsToMany('App\Jurusan','kelas')->withPivot('id');
    // }

    // public function jurusans()
    // {
    //     return $this->belongsToMany('App\Jurusan','mapel')->withPivot('id');
    // }
}
