<?php

namespace App\Imports;

use App\Models\RawCompany;
use Maatwebsite\Excel\Concerns\ToModel;

class RawCompanyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

//    protected $fillable = ['company_name'];

    public function model(array $row)
    {
        return new RawCompany([

            'company_name'      => $row[0],
            'address'           => $row[1],
            'phone_number'      => $row[2],
            'website'           => $row[3],
            'type'              => $row[4],
            'rating'            => $row[5],
            'total_reviews'     => $row[6],
            'business_hours'    => $row[7],
            'latitude'          => $row[8],
            'longitude'         => $row[9]
        ]);
    }
}
