<?php

namespace App\Imports;

use App\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;

class KelasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kelas([
            'id' => $row[0],
            'kelas' => $row[1],
            'kelas_tingkat_id' => $row[2],
            'jurusan_id' => $row[3]
        ]);
    }
}
