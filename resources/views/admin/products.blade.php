<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('admin.inc.nav')
    <main class=" md:ml-1/12 md:w-11/12 w-full flex flex-col bg-main  md:p-10 p-2  gap-5">
        <article class="w-full flex p-5">
            <h1 class="text-lg font-medium font-sans">Products</h1>
        </article>
        <article class="w-full p-5 bg-white rounded-lg shadow-md flex flex-wrap justify-around">
            <input type="text" name="produvts" placeholder="Search with id or title" class="md:w-1/3 2/3 h-10 pl-2 border-2 focus:ring  focus:outline-none rounded-sm">
            <a href="{{route("add-product")}}" class="bg-admincolor text-white md:w-1/6 w-1/3 flex justify-center items-center rounded-md hover:bg-hoveradmincolor font-medium">Add Product</a>
        </article>
    </main>
</body>
</html>