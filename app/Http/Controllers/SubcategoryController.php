<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
            $request->validate([
                'file' => 'required|image|file',
                'name' => 'required',
                'id_category' => 'required',
            ]);
    
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/assets/images/subcat',$filename);
                $subcat = New Subcategory();
                $subcat->name = $request->input("name");
                $subcat->image = $filename;
                $subcat->id_category = $request->input("id_category");
                $subcat->save();
                
                
            }
            return response()->json(['status' => 'success']);
        
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data =Subcategory::where('id_category', $id)->get();
        return  response()->json([
                "res" => $data,
            ]
        );
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subcat = Subcategory::find($id);
        $image = $subcat->image;
        if (Storage::exists('public/assets/images/subcat/'.$image)) {
            Storage::delete('public/assets/images/subcat/'.$image);
            
        }
        $subcat->delete();
        if($subcat){
            return response()->json([
                'status' => 200,
                'message' => "Subcat founded",
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Subcat Not found',
            ]);
        }
        
    }
}
