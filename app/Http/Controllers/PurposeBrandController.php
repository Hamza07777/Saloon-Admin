<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\propose_brand;
use Illuminate\Http\Request;

class PurposeBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("purpose-brand.list")->with('brand',propose_brand::orderBy('id', 'DESC')->get());
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
        $product=new brand();

        $id=$request->purpose_brand_id;
        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
                  $request->image->move(public_path('product_image'),$filename);

        $product->name=$request->name;
        $product->description=$request->description;
        $product->logo=$filename;
        $product->status=($request->get('status')) ? true : false;
        $product->save();
        $Service=propose_brand::findOrFail($id);
        $Service->delete();
       

        }

        return redirect('/purpose_brand');
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
        $brand=propose_brand::findOrFail($id);

        return view('purpose-brand.new')->with('brand',$brand); 
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
        $Service=propose_brand::findOrFail($id);
        $Service->delete();
        return redirect('/purpose_brand');
    }
}
