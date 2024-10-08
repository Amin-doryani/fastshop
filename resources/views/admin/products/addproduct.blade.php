<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset("css/addproduct.css")}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>
<body>
    @include('admin.inc.nav')
    <div id="filldiv" class="py-3 px-5 bg-red-500 absolute top-10 right-10 w-2/12 hidden">
        <h1 class="text-white">Please Fill All the Inputs!!</h1>
    </div>
    <div id="imagesdiv" class="py-3 px-5 bg-red-500 absolute top-10 right-10 w-2/12 hidden">
        <h1 class="text-white">Please Add an Image!!</h1>
    </div>
    <main class=" md:ml-1/12 md:w-11/12 w-full flex flex-col bg-main  p-10  gap-5">
        <div class="bg-green-500 py-2 px-4 absolute top-10 right-10 hidden" id="producthasbeenadded">
            <h1 class="text-white">Product Has Been Added</h1>
        </div>
        <article><h1 class=" text-2xl font-medium font-sans ">Add Product</h1></article>
        <article class="w-full bg-white  ">
            <div class="w-full bg-white flex flex-wrap p-5 rounded-lg gap-y-4 justify-center md:justify-start" >
                
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2" id="titlediv">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >1</span>Product Title</h3>
                    <input type="text" name="produvts" id="product_t"  placeholder="Product title" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12" >
                    
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2" id="descriptiondiv">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >2</span>Product Description</h3>
                    
                    <textarea name="desciption" id="description" cols="30" rows="10" placeholder="Product Description" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12"></textarea>
                    
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2" id="pricediv">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >3</span>Product Price</h3>
                    <input type="number" id="price" name="price" placeholder="Price" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2" id="proQdiv">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >4</span>Product Quantity</h3>
                    <input type="number" id="proQ" name="qnt" placeholder="Product Quantity " class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >5</span>Product Discount(%)</h3>
                    <input type="number" name="qnt" max="100" id="disc" placeholder="Product Quantity " class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                    <span class="text-red-600 hidden" id="discspan">This should be less than 100%!</span>
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >5</span>New Price</h3>
                    <input type="number" id="newprice" name="qnt" readonly value="0" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >6</span>Category</h3>

                    <select name="select1" id="select1" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                        <option disabled selected>Category</option>
                        @foreach ($Category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <select name="select2" id="select2" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                        <option disabled selected>SubCat</option>
                        
                    </select>

                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >7</span>Images</h3>
                    <div class="w-12/12 border-2 min-h-40 flex flex-wrap justify-center">
                        <div id="image-preview"  class="flex flex-wrap justify-center items-center "></div>
                        <div id="drop-area" class="drop-area md:w-1/3 w-11/12 flex flex-col justify-center items-center gap-2 md:mt-1 mt-5">
                            <p>Drag & drop your files here or click to select files</p>
                            <img src="{{asset('images/admin/icons/repo.svg')}}" alt="img" class="w-4/12">
                            <input type="file" name="files[]" id="fileElem" multiple accept="image/*" style="display:none;">
                        </div>
                    </div>
                    
                    
                    
                </div>
                <div class=" w-11/12 flex flex-col gap-y-2 justify-center items-center">
                    <button class="bg-admincolor text-white w-1/3 h-10 flex justify-center items-center rounded-md hover:bg-hoveradmincolor font-medium" id="addproduct">Submit</button>
                </div>
                
            </div>
            
        

    

    
            
        </article>
    </main>
    <script src="{{asset("js/addproduct.js")}}"></script>
    <
    
</body>
</html>