<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class AkunImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'email_verified_at' => $row[3],
            'password' => $row[4],
            'roles' => $row[5]
        ]);
    }
}
