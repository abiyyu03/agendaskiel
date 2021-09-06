<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    protected $table = "jam";
    protected $fillable = ['jamke','waktu'];

    public function agendas()
    {
        return $this->hasMany('App\Agenda');
    }
}
