<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset("css/addproduct.css")}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>
<body>
    @include('admin.inc.nav')
    @include('admin.products.updateimages')
    
    <main class=" md:ml-1/12 md:w-11/12 w-full flex flex-col bg-main  p-10  gap-5">
        
        <div class="bg-red-500 absolute top-10 right-10 p-2 hidden" id="problemdiv">
            <h1 class="text-white">Please Fill All the Inputs!</h1>
        </div>
        <div class="bg-green-500 absolute top-10 right-10 p-2 hidden" id="updateddiv">
            <h1 class="text-white">The product Has Been Updated!</h1>
        </div>
        <article><h1 class=" text-2xl font-medium font-sans ">Update Product <span id="idproduct" class="hidden">{{$product->id}}</span></h1></article>
        <article class="w-full bg-white  ">
            <div class="w-full bg-white flex flex-wrap p-5 rounded-lg gap-y-4 justify-center md:justify-start" >
                
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2" id="titlediv">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >1</span>Product Title</h3>
                    <input type="text" name="produvts" id="product_t"  placeholder="Product title" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12" value="{{$product->title}}">
                    
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2" id="descriptiondiv">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >2</span>Product Description</h3>
                    
                    <textarea name="desciption" id="description" cols="30" rows="10" placeholder="Product Description" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12" ></textarea>
                    
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2" id="pricediv">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm"   >3</span>Product Price</h3>
                    <input type="number" id="price" name="price" placeholder="Price" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12" value="{{$product->price}}">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2" id="proQdiv">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >4</span>Product Quantity</h3>
                    <input type="number" id="proQ" name="qnt" placeholder="Product Quantity " class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12" value="{{$product->quantity}}">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >5</span>Product Discount(%)</h3>
                    <input type="number" name="qnt" max="100" id="disc" placeholder="Product Quantity " class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12" value="{{$product->discount}}">
                    <span class="text-red-600 hidden" id="discspan">This should be less than 100%!</span>
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >5</span>New Price</h3>
                    <input type="number" id="newprice" name="qnt" readonly  class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12" value="{{$product->price - ($product->discount * $product->price)/100}}">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >6</span>Category</h3>

                    <select name="select1" id="select1" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                        <option disabled selected>Category</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <select name="select2" id="select2" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                        <option disabled selected>SubCat</option>
                        
                    </select>
                    <div class="w-4/12 py-4 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" height="100px" viewBox="0 -960 960 960" width="100px" fill="#000" class="shadow-xl"><path d="M360-400h400L622-580l-92 120-62-80-108 140Zm-40 160q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/></svg>
                        <button class="py-2 px-4 bg-green-400 text-white hover:bg-green-600 rounded-md shadow-lg mt-2" id="updateimages">Update Images</button>
                    </div>

                </div>
                <div class=" w-11/12 flex gap-4 gap-y-2 justify-center items-center">
                    <button class="bg-red-500 text-white w-1/3 h-10 flex justify-center items-center rounded-md hover:bg-red-700 font-medium" id="cancelupdate">Cancel</button>
                    <button class="bg-admincolor text-white w-1/3 h-10 flex justify-center items-center rounded-md hover:bg-hoveradmincolor font-medium" id="updateproduct">Submit</button>
                </div>
                
            </div>
            
        

    

    
            
        </article>
    </main>
    <script src="{{asset("js/editproduct.js")}}"></script>
    
    
</body>
</html>