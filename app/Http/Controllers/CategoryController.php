<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Models\Category;
use App\Imports\RawCategoryImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view("categories.list")->with('categories',$categories);
    }

    public function create()
    {
        return view("categories.new");
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'image' => 'required',
        // ]);

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
                    Excel::import(new RawCategoryImport(), $request->file('csv_file')->store('public'));

        }
        else{

        $category=new Category();


        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
    	          $request->image->move(public_path('category_image'),$filename);
        $category->name=$request->name;
        $category->description=$request->description;
        $category->image=$filename;
        $category->status=($request->get('status')) ? true : false;
        $category->save();

        }
    }
    return redirect('/categories');
        // return redirect('/categories/edit/'.$category->id)->with('success', 'Category Details Inserted Successfully.');

    }

    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('categories.edit')->with('category',$category);
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',

        ]);

        if ($request->file('image')){

            $extension=$request->image->extension();
            $filename=time()."_.".$extension;
            $request->image->move(public_path('category_image'),$filename);

            Category::whereId($id)->update([

                'name'=>$request->name,
                'description'=>$request->description,
                'status'=>($request->get('status')) ? true : false,
               'image'=>$filename,

                ]);
                return redirect('/categories');
        }
        else{
            Category::whereId($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>($request->get('status')) ? true : false,
            ]);
            return redirect('/categories');
        }

    }

    public function destroy($id)
    {
        $Category=Category::findOrFail($id);
        $Category->delete();
        return redirect('/categories');
    }
}
