<?php

namespace App\Imports;

use App\Jam;
use Maatwebsite\Excel\Concerns\ToModel;

class JamImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jam([ 
            'jamke' => $row[0],
            'waktu' => $row[1]
        ]);
    }
}
