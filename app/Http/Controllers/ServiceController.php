<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Models\Category;
use App\Models\Service;
use App\Imports\RawServiceImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(env('PER_PAGE'));

        return view("services.list", compact('services'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();

        return view("services.new", compact('categories'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [

        //     'name' => 'required',
        //     'description' => 'required',
        //     //'image' => 'required|mimes:jpg,jpeg,png'
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
                        Excel::import(new RawServiceImport(), $request->file('csv_file')->store('public'));

            }
            else{
                $service=new Service();


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

                }

            }



        # upload file

        return redirect('/services');

    }

    public function edit($id)
    {
        $service = Service::find($id);

        return view("services.edit", compact('service'));
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
                $request->image->move(public_path('service_image'),$filename);

                Service::whereId($id)->update([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price,
                'image'=>$filename,
                'status'=>($request->get('status')) ? true : false,
                ]);
                return redirect('/services');
        }
        else{
            Service::whereId($id)->update([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price,
                'status'=>($request->get('status')) ? true : false,
            ]);
            return redirect('/services');
        }

    }

    public function destroy($id)
    {
        $Service=Service::findOrFail($id);
        $Service->delete();
        return redirect('/services');
    }
}
