<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search" />
    @vite('resources/css/app.css')
</head>
<body >
    <div class="hidden  w-full bg-black sm:flex justify-center items-center h-10">
        <h3 class="text-white">Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%! <span class="ml-1 underline font-bold">ShopNow</span></h3>
    </div>
    <main class="w-full h-20 md:hidden flex justify-between items-center p-5">
        <span class="cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </span>
            <h1 class="font-bold text-2xl">Fastshop</h1>
        
        <div class="w-1/3 flex justify-between pl-2 items-center bg-slate-100 rounded-full ml-2 cursor-pointer">
            <span class="text-gray-800 left-0">Search...</span>
            <span class="material-symbols-outlined  bg-slate-100 rounded-full p-2 cursor-pointer ">
                search
            </span>
        </div>
        <div class="p-4 rounded-full cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg>
        </div>

        
    </main>
    <main class="hidden md:flex w-full h-20 justify-evenly items-center  ">
        <h1 class="font-bold text-2xl">Fastshop</h1>
        <div class="w-1/4 flex justify-between items-end">
            <a href="#" class="hover:border-b-2 border-black">Home</a>
            <a href="#" class="hover:border-b-2 border-black">Contact</a>
            <a href="#" class="hover:border-b-2 border-black">About</a>
        </div>
        <div class="w-2/12 flex justify-between lg:hidden items-center">
            <div class="p-2 rounded-full bg-slate-100 ">
                {{-- <span class="material-symbols-outlined cursor-pointer">
                    search
                </span> --}}
                <span class="cursor-pointer w-20  bg-slate-100 rounded-lg flex justify-between px-2 py-2 mr-20">
                    Search..
                    <span class="material-symbols-outlined ">
                        search
                    </span>
                </span>
            </div>
            <div class="p-2 rounded-full cursor-pointer md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg>
            </div>
        </div>
        <div class="hidden lg:flex">
            <span class="cursor-pointer w-40 xl:w-80 bg-slate-100 rounded-lg flex justify-between px-4 py-3">
                Search..
                <span class="material-symbols-outlined ">
                    search
                </span>
            </span>
            
        </div>
        <div class="p-4 rounded-full cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z"/></svg>
        </div>
        <div class="p-4 rounded-full cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg>
        </div>
        
    </main>
    
</body>
</html>