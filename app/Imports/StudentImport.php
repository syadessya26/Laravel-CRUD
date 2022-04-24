<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'nama' => $row[1] , 
            'absen' => $row[2] , 
            'nim'=> $row[3], 
            'nilai' => $row[4],
            'file' => $row[5],

        ]);
    }
}
