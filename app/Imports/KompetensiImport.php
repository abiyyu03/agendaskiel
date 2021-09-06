<?php

namespace App\Imports;

use App\Kompetensi;
use Maatwebsite\Excel\Concerns\ToModel;

class KompetensiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kompetensi([
            'id' => $row[0],
            'nomor' => $row[1],
            'kompetensi' => $row[2],
            'mapel_id' => $row[3],
        ]);
    }
}
