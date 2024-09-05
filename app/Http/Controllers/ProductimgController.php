<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Productimg;
use Illuminate\Http\Request;

class ProductimgController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Productimg::where("id_products",$id)->get();
        return  response()->json([
            "res" => $data,
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productimg $productimg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productimg $productimg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = Productimg::findOrFail($id);
        $id2 = $image->id_products;
        if (Storage::exists('public/assets/images/productsimages/'.$image->paths)) {
            Storage::delete('public/assets/images/productsimages/'.$image->paths);
        }
        $image->delete();
        $images =  Productimg::where("id_products",$id2)->get();
        return  response()->json([
            "res" => $images,
        ]
        );
    }
}
