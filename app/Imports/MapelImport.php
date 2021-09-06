<?php

namespace App\Imports;

use App\Mapel;
use Maatwebsite\Excel\Concerns\ToModel;

class MapelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mapel([
            'id' => $row[0],
            'nama_mapel' => $row[1],
            'kelas_tingkat_id' => $row[2],
            'jurusan_id' => $row[3] 
        ]);
    }
}
