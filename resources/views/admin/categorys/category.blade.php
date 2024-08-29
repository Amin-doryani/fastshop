<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    {{-- <script src="{{asset("js/jquery.js")}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/css/app.css')
    
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body>
    @include('admin.inc.nav')

    <main class=" md:ml-1/12 md:w-11/12 w-full flex flex-col bg-main  md:p-10 p-2  gap-5 min-h-lvh">
    @include('admin.categorys.addcat')
    
    @include('admin.categorys.deletecat')
    @include('admin.categorys.updatecat')
    @include('admin.categorys.subcat')
    @include('admin.categorys.addsubcat')



        <article class="w-full flex p-5">
            <h1 class="text-lg font-medium font-sans">Category</h1>
        </article>
        <article class="w-full p-5 bg-white rounded-lg shadow-md flex flex-wrap justify-around">
            <input id="searchname" type="text" name="produvts" placeholder="Search with id or title" class="md:w-1/3 2/3 h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm">
            
            <a   class="bg-admincolor text-white md:w-1/6 w-1/3 flex justify-center items-center cursor-pointer rounded-md hover:bg-hoveradmincolor font-medium" onclick="addcat()">Add Category</a>
           
        </article>
        <article class="w-full  p-5 bg-white rounded-lg shadow-md flex flex-wrap justify-around">
            
            
            <div class="w-10/12 mt-10 border-2 border-gray-300 rounded-lg shadow-lg ">
                <table class="table-auto w-11/12 mx-auto my-4">
                    <thead>
                        <tr class="bg-gray-200 text-left text-sm font-semibold text-gray-700">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">CATEGORY</th>
                            <th class="px-4 py-2">SUBCAT</th>
                            <th class="px-4 py-2">Edit</th>
                            <th class="px-4 py-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="getcats">
                        @foreach ($data as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">#{{$item->id}}</td>
                            <td class="px-4 py-2 flex items-center"><img src="{{ asset('storage/assets/images/cat/' . $item->image) }}" alt="cat"  class="w-10 h-10 rounded-sm mr-3"> {{$item->name}}</td>
                            <td class="px-4 py-2 hover:bg-slate-400 cursor-pointer opensubcat" data-name="{{$item->name}}"  data-id="{{$item->id}}"><span>{{$item->subcategory_count}}</span> Subcat</td>
                            <td class="px-4 py-2 text-blue-500 cursor-pointer updatecatbutton"  data-category-id="{{$item->id}}" data-category-name="{{$item->name}}" data-category-image="{{$item->image}}" >Edit</td>
                            <td class="px-4 py-2 text-red-500 cursor-pointer deletecat" data-category-id="{{$item->id}}" data-category-name="{{$item->name}}"  >Delete</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </article>
    </main>
    
    <script src="{{asset("js/addcat.js")}}"></script>
    </script>
</body>
</html>