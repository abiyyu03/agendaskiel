<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    protected $table = "kompetensi";
    protected $fillable = ['nomor','kompetensi','mapel_id'];

    public function mapel ()
    {
        return $this->belongsTo('App\Mapel');
    }
    public function agendas()
    {
        return $this->hasMany('App\Agenda');
    }
}
