<?php

namespace App\Http\Controllers;

use App\Imports\RawCompanyImport;
use App\Models\RawCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class RawCompanyController extends Controller
{

    public function index()
    {
        return view("raw-companies.upload");
    }

    public function store(Request $request)
    {


        if($request->file('csv_file')){
            $path = $request->file('csv_file')->getRealPath();

      
            Excel::import(new RawCompanyImport(), $request->file('csv_file')->store('public'));

        }
        else{
       
                       RawCompany::create([
                        'company_name'=>$request->name, 
                        'address'=>$request->address, 
                        'phone_number'=>$request->phone_number, 
                        'website'=>$request->website, 
                        'type'=>$request->saloon_type, 
                        'rating'=>$request->rating, 
                        'total_reviews'=>$request->total_reviews, 
                        'business_hours'=>$request->business_hours,
                        'latitude'=>$request->latitude, 
                        'longitude'=>$request->longitude,
                    ]);    

        }

  return redirect('/home');

        

      
    }
}
