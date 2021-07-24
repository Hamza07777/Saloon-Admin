<?php

namespace App\Imports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\ToModel;

class RawServiceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Service([
            'category_id'      => $row[0],
            'name'           => $row[1],
            'description'      => $row[2],
            'price'           => $row[3],
            'status'              => $row[4],
          
        ]);
    }
}
