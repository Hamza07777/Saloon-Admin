<?php

namespace App\Http\Controllers;

use App\Imports\RawCategoryImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RawCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("raw-category.upload");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('csv_file')->getRealPath();

        //        Storage::disk('public')->put($path, file_get_contents())
        //
        //        $file = fopen("contacts.csv","r");
        //        print_r(fgetcsv($file));
        //        fclose($file);
        //
        //        $contents = file_get_contents($request->file('csv_file')->getRealPath());
        //
        //
        //        dd ($contents);
                Excel::import(new RawCategoryImport(), $request->file('csv_file')->store('public'));
        
                return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
