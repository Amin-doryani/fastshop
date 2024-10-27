<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="flex justify-center items-center h-lvh font-sans ">
    <form action="{{route("checkadminlogin")}}" method="Post" class="flex flex-col w-11/12 xl:w-1/2 lg:w-1/2 md:w-8/12 shadow-md pt-20 pb-20 pl-10 pr-10 gap-3 items-center ">
        @if ($errors->any())
        <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative pt-5" role="alert">
        <strong class="font-bold">There were some problems with your input.</strong>
        <ul class="list-disc pl-5 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        

        <button type="button" onclick="document.getElementById('error-alert').style.display='none';" class="absolute top-0 right-0 mt-2 mr-2 text-red-700 hover:text-red-900">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <span class="sr-only">Close</span>
        </button>
        </div>
        @endif
        @csrf
        <h1 class="font-sans w-full text-center  font-bold text-2xl ">Login</h1>
        <label for="username " class="w-full">Username</label>
        <input type="text" name="username" id="username" placeholder="username" class="w-full  border-2 bg-white pl-7 h-10" autocomplete="off"  >
        <label for="password" class="w-full ">Password</label>
        <input type="password" name="password" id="password" class="w-full border-2 pl-7 h-10"  autocomplete="off" autocomplete="off" placeholder="password">
        <button type="submit" class="bg-cyan-400 w-1/3 rounded-sm h-10 mt-10 text-white font-bold   hover:bg-cyan-500">Login</button>
    </form>
</body>
</html>