<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\companies_brands;
use App\Models\Product;
use App\Imports\RawBrandImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.list')->with('product',brand::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->file('csv_file')){
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
                    Excel::import(new RawBrandImport(), $request->file('csv_file')->store('public'));

        }
        else{
        $product=new brand();

        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
                  $request->image->move(public_path('product_image'),$filename);

        $product->name=$request->name;
        $product->description=$request->description;
        $product->logo=$filename;
        $product->status=($request->get('status')) ? true : false;
        $product->save();

        }
    }
    return redirect('/product');
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
        $product=brand::findOrFail($id);
        return view('products.edit')->with('product',$product);
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
        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
    	          $request->image->move(public_path('product_image'),$filename);

        brand::whereId($id)->update([

            'name'=>$request->name,
            'description'=>$request->description,
            'logo'=>$filename,
            'status'=>($request->get('status')) ? true : false,

            ]);
        }
        else{
            brand::whereId($id)->update([

                'name'=>$request->name,
                'description'=>$request->description,
                'status'=>($request->get('status')) ? true : false,

                ]);

        }
            return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category=brand::findOrFail($id);
        $Category->delete();
        return redirect('/product');
    }
}
