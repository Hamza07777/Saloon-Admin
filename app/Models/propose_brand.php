<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propose_brand extends Model
{
    use HasFactory;

    public function company_name($id){
        $company=company::where('user_id',$id)->first();
            $logo= $company->name;
            return $logo;
    }
}
