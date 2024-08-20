<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view("admin.categorys.category",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            $request->validate([
                'file' => 'required|image|file',
                'name' => 'required',
            ]);
    
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/assets/images/cat',$filename);
                $cat = New Category();
                $cat->name = $request->input("name");
                $cat->image = $filename;
                $cat->save();
                
                
            }

            
            
            
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $cat = Category::find($id);
        $catimagepath = $cat->image;
        if($cat){
            $request->validate([
                'name'=>'required',
            ]);

            if($request->hasFile('file')){
                $file = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/assets/images/cat',$filename);
                Storage::delete('');
                if (Storage::exists('public/assets/images/cat/'.$catimagepath)) {
                    Storage::delete('public/assets/images/cat/'.$catimagepath);
                    
                }
                $cat->name = $request->input("name");
                $cat->image = $filename;
                $cat->save();
               
            }else{
                $cat->name = $request->input("name");
                $cat->save();
                
            }
            
            return response()->json([
                'status' => 200, 
                'cat' => $cat,
            ]);
            
        }else{
            return response()->json([
                'status' => 404, 
                'message' => 'not found',
            ]);
        }
        




        
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
