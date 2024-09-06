<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Productimg;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        
        $products = Product::with('subcategory', 'Productimg')
        ->take(20)
        ->get();
        
        
        foreach($products as $pro){
            if ($pro->productimg->isEmpty()) {
                
                $pro->productimg->push([
                    'id' => null, 
                    'id_products' => $pro->id,
                    'paths' => 'defultimage.png', 
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        
        return view("admin.products",['products'=>$products]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view("admin.products.addproduct",['Category'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pro = new Product();
        $pro->id_subcat =(int) $request->input("subcat");
        $pro->title = $request->input("title");
        $pro->desc = $request->input("desc");
        $pro->price =(int) $request->input("price");
        $pro->quantity =(int) $request->input("q");
        $pro->discount =(int) $request->input("disc");
        $pro->image = "test";
        
        $pro->save();
        if ($request->hasFile('files')){
            $a = 11;
            foreach($request->file('files') as $file){
                $filename = time() .$a. '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/assets/images/productsimages',$filename);
                $img = New Productimg();
                $img->paths = $filename;
                 $img->id_products = $pro->id;
                $img->save();
                $a +=2;
            }
            return  response()->json([
                "res" => "saved with images",
            ]
            );
                

        }
        return  response()->json([
            "res" => "saved without images",
        ]
        );
       
        
        //////////////////
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){   
        $product = Product::find($id);
        $data = Category::all();
        return view("admin.products.editproduct",['category'=>$data,"product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $pro = Product::find($id);
        $pro->title = $request->input("title");
        $pro->desc = $request->input("desc");
        $pro->price = $request->input("price");
        $pro->quantity = $request->input("q");
        $pro->discount = $request->input("disc");
        $pro->image = "test";
        $pro->id_subcat = $request->input("select2");
        $pro->save();
        return  response()->json([
            "res" => "Updated",
        ]
        );
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $images = Productimg::where("id_products",$id)->get();
        
        $deletedimages = 0; //public\assets\images\productsimages\
        foreach($images as $image){
            if (Storage::exists('public/assets/images/productsimages/'.$image->paths)) {
                Storage::delete('public/assets/images/productsimages/'.$image->paths);
                $deletedimages +=1;
            }
            $image->delete();
            
        }

        $pro = Product::find($id);
        $pro->delete();
        return  response()->json([
            "status" => "200",
            "deletedimages" => $deletedimages,
        ]
        );
    }
    public function getcats($id){
        $data = Subcategory::where("id_category",$id)->get();
        return  response()->json([
            "res" => $data,
        ]
        );
    }
}
