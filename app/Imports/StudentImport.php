<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         return new Student([
            'registration_number' => $row['registration_number'],
            'firstname' => $row['firstname'],   
            'middlename' => $row['middlename'],
            'lastname' => $row['lastname'],
            'form' => $row['form'],
            'stream' => $row['stream'],
            'category' => $row['category'],
        ]);
    }
}
