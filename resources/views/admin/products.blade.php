<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')

</head>
<body>
    @include('admin.inc.nav')
    <div class="bg-green-400 py-2 px-4 top-10 right-10 absolute hidden" id="hasdeleted">
        <h1 class="text-white">The Product Has been Deleted</h1>
        <p class="text-white"><span id="numberimgs"></span> Has been deleted</p>
    </div>
    <div class="bg-red-400 py-2 px-4 top-10 right-10 absolute hidden" id="hasnotdeleted">
        <h1 class="text-white">The Product Has  Not been Deleted.. </h1>
        <span class="text-white">Please Contact The Devs</span>
        
    </div>
    
    <main class=" md:ml-1/12 md:w-11/12 w-full flex flex-col bg-main  md:p-10 p-2  gap-5">
        @include('admin.products.deleteproducts')
        <article class="w-full flex p-5">
            <h1 class="text-lg font-medium font-sans">Products</h1>
        </article>
        <article class="w-full p-5 bg-white rounded-lg shadow-md flex flex-wrap justify-around">
            <input type="text" name="produvts" placeholder="Search with id or title" class="md:w-1/3 2/3 h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm">
            <a href="{{route("add-product")}}" class="bg-admincolor text-white md:w-1/6 w-1/3 flex justify-center items-center rounded-md hover:bg-hoveradmincolor font-medium">Add Product</a>
        </article>
        <article class="w-full p-5 min-h-screen    justify-around gap-2 gap-y-2">
           
               
            <table class="table w-full">
                <thead class="bg-gray-50 border-b-2 h-16">
                    <tr>
                        <th class="p-2 text-left">Product Name</th>
                        <th class="p-2 text-left">SubCategory</th>
                        <th class="p-2 text-left">Qte</th>
                        <th class="p-2 text-left">Discount</th>
                        <th class="p-2 text-left">Final Price</th>
                        
                        <th class="p-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($products as $pro)
                    <tr class="hover:bg-gray-100 border-b-2 ">
                        <td class="p-2 flex gap-2 items-center ">
                            <img src="{{asset('storage/assets/images/productsimages/'.$pro['productimg'][0]['paths'])}}"  alt="image" class="w-16 h-16 object-cover object-center"> 
                            <span class="text-lg">{{$pro->title}}</span>
                        </td>
                        <td class="p-2">{{$pro->subcategory->name}}</td>
                        <td class="p-2 ">{{$pro->quantity}}</td>
                        <td class="p-2  text-green-500">- {{$pro->discount}}%</td>
                        <td class="p-2 ">{{$pro->price-($pro->price*$pro->discount)/100}} Dh</td>
                        
                        <td class="p-2 ">
                            <div class="w-full h-full flex justify-center items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#f70808" class="cursor-pointer deletepro" data-id="{{$pro->id}}"  data-name="{{$pro->subcategory->name}}"  data-img="{{$pro['productimg'][0]['paths']}}"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                               <a href="{{route('edit-product',$pro->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000" class="cursor-pointer editpro" data-id="{{$pro->id}}"><path d="M80 0v-160h800V0H80Zm160-320h56l312-311-29-29-28-28-311 312v56Zm-80 80v-170l448-447q11-11 25.5-17t30.5-6q16 0 31 6t27 18l55 56q12 11 17.5 26t5.5 31q0 15-5.5 29.5T777-687L330-240H160Zm560-504-56-56 56 56ZM608-631l-29-29-28-28 57 57Z"/></svg></a>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#274483" class="cursor-pointer viewon" data-id="{{$pro->id}}"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#274483" class="cursor-pointer hidden viewoff"  data-id="{{$pro->id}}"><path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
            
            
            
           
            
            
        </article>
    </main>
    <script src="{{asset("js/products.js")}}"></script>
</body>
</html>