<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class MatriculeDirectionHoraireImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        dump($row);
        // return new User([
        //     'name'     => $row[0],
        //     'email'    => $row[1],
        //     'password' => Hash::make($row[2]),
        // ]);
    }
}
