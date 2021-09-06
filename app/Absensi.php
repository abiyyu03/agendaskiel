<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = "absensi";
    protected $fillable = ['nama_siswa','opsi_absensi','keterangan'];
}
