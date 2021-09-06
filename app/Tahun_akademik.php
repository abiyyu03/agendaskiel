<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahun_akademik extends Model
{
    protected $table = "tahun_akademik";
    protected $fillable = ['nama_tahun_akademik','semester'];
}
