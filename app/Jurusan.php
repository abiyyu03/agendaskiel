<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";
    protected $fillable = ['jurusan'];

    public function kelas_tingkats()
    {
    	return $this->belongsToMany('App\Kelas_tingkat','kelas')->withPivot('id');
    }
    
    // Relasi 1:N ke tabel kelas
    public function kelas()
    {
    	return $this->hasMany('App\Kelas','kelas_tingkat_id');
    }

    // public function kelas_tingkats()
    // {
    //     return $this->belongsToMany('App\Kelas_tingkat','mapel')->withPivot('id');
    // }

    public function mapel()
    {
        return $this->hasMany('App\Mapel');
    }
}

