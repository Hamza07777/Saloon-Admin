<?php

namespace App\Imports;

use App\Models\brand;
use Maatwebsite\Excel\Concerns\ToModel;

class RawBrandImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new brand([
            'name'      => $row[0],
            'description'           => $row[1],
            'status'      => $row[2],
        ]);
    }
}
