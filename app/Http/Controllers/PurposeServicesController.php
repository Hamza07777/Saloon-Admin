<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\propose_service;
use App\Models\Service;
use Illuminate\Http\Request;

class PurposeServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("purpose-services.list")->with('services',propose_service::orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service=new Service();

        $id=$request->purpose_id;

        if($request->hasFile('image')){
            $extension=$request->image->extension();
                  $filename=time()."_.".$extension;
                  $request->image->move(public_path('service_image'),$filename);
        $service->category_id=$request->category_id;
        $service->name=$request->name;
        $service->description=$request->description;
        $service->price=$request->price;
        $service->image=$filename;
        $service->status=($request->get('status')) ? true : false;
        $service->save();
        $Service=propose_service::findOrFail($id);
        $Service->delete();
        

        }
        return redirect('/purpose_service');
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
        $categories = Category::pluck('name', 'id')->toArray();

        $service=propose_service::findOrFail($id);

        return view('purpose-services.new', compact('categories'))->with('service',$service); 
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
        $Service=propose_service::findOrFail($id);
        $Service->delete();
        return redirect('/purpose_service');
    }
}
