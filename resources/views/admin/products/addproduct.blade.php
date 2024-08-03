<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset("css/addproduct.css")}}">
   
</head>
<body>
    @include('admin.inc.nav')
    <main class=" md:ml-1/12 md:w-11/12 w-full flex flex-col bg-main  p-10  gap-5">
        <article><h1 class=" text-2xl font-medium font-sans ">Add Product</h1></article>
        <article class="w-full bg-white  ">
            <form action="#" method="POST" class="w-full bg-white flex flex-wrap p-5 rounded-lg gap-y-4 justify-center md:justify-start" enctype="multipart/form-data">
                @csrf
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >1</span>Product Title</h3>
                    <input type="text" name="produvts" placeholder="Product title" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >2</span>Product Description</h3>
                    
                    <textarea name="desciption" id="description" cols="30" rows="10" placeholder="Product Description" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12"></textarea>
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >3</span>Product Price</h3>
                    <input type="number" name="price" placeholder="Price" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >4</span>Product Quantity</h3>
                    <input type="number" name="qnt" placeholder="Product Quantity " class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >5</span>Product Discount(%)</h3>
                    <input type="number" name="qnt" max="100" placeholder="Product Quantity " class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >5</span>New Price</h3>
                    <input type="number" name="qnt" readonly value="0" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                </div>
                <div class="md:w-1/2 w-11/12 flex flex-col gap-y-2">
                    <h3 class="font-medium flex items-center gap-x-2 text-lg "><span class="bg-admincolor w-5 h-5 p-2 rounded-full flex justify-center items-center text-white text-sm" >6</span>Category</h3>

                    <select name="select" id="select" class=" h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm  md:w-8/12 w-10/12">
                        
                        <option disabled selected>Category</option>
                        <option value="phone-tablte">Phone/Iphone</option>
                        <option value="phone-tablte">Phone/Iphone</option>
                        <option value="phone-tablte">Phone/Iphone</option>
                        <option value="phone-tablte">Phone/Iphone</option>
                        <option value="phone-tablte">Phone/Iphone</option>

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
                    <button type="submit" class="bg-admincolor text-white w-1/3 h-10 flex justify-center items-center rounded-md hover:bg-hoveradmincolor font-medium">Submit</button>
                </div>
                
            </form>
            
        

    

    
            
        </article>
    </main>
    <script src="{{asset("js/addproduct.js")}}"></script>
    
</body>
</html>