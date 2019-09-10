<?php
namespace App\Http\Controllers\Admin;

use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = 10;
        $categories = Categorie::latest()->paginate($per_page);
        return view( 'admin.categorie.index', compact('categories') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.categorie.create', compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // vv($request->all());
        $validation_rules = [
            'name'      => 'required',
            'desc'      => 'required',
            'status'    => 'required',
        ];
        $validator= Validator::make($request->all(), $validation_rules);
        $validator->validate();
        $categorie = Categorie::create(array_except($request->all(),['instructor_profile','passsword','near_by_areas','language_id','service_id']));
        //return "ok";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $file_path_image = "categorie_image/".$file_name.time().".".$file->getClientOriginalExtension();
            Storage::disk(config('filesystems.default'))->put($file_path_image, file_get_contents($file), 'public');        
            $categorie->image = $file_path_image;
        }
        $categorie->save();
        Session::flash('message', 'Categorie Created!'); 
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {   
        return view( 'admin.categorie.edit', compact('categorie') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        // vv($request->all());
        $validation_rules = [
            'name'      => 'required',
            'desc'      => 'required',
            'status'    => 'required',
        ];
        $validator= Validator::make($request->all(), $validation_rules);
        $validator->validate();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $file_path_image = "categorie_image/".$file_name.time().".".$file->getClientOriginalExtension();
            Storage::disk(config('filesystems.default'))->delete($categorie->image);
            Storage::disk(config('filesystems.default'))->put($file_path_image, file_get_contents($file), 'public');        
            $categorie->image = $file_path_image;
        }
        $categorie->name = $request->name;
        $categorie->desc = $request->desc;
        $categorie->status = $request->status;
        $categorie->save();
        Session::flash('message', 'Categorie Updated!'); 
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        Storage::disk(config('filesystems.default'))->delete($categorie->image);    
        $categorie->destroy();
        Session::flash('message', 'Categorie Deleted!'); 
        Session::flash('alert-class', 'alert-danger'); 

        return redirect()->route('categorie.index');
    }
}
