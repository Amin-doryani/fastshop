<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dahsboard</title>
</head>
<body class="flex md:flex-row flex-col ">
    @include('admin.inc.nav')
    <main class=" md:ml-1/12 md:w-11/12 w-full flex flex-col bg-main  p-10  gap-5">
        <article class=" text-lg font-medium font-sans "><h1>Dahsboard</h1></article>
        <article class="w-full flex flex-wrap justify-between gap-5 ">
            <div class="bg-white sm:w-1/3 md:w-1/5 w-2/4 flex flex-col p-4 rounded-xl gap-2 shadow-lg">
                <h2 class="text-gray-500">Income Overview</h2>
                <h1 class="text-lg font-medium">1709.39 <span>DH</span></h1>
            </div>
            <div class="bg-white sm:w-1/3 md:w-1/6 w-1/3 flex flex-col p-4 rounded-xl gap-2 shadow-lg">
                <h2 class="text-gray-500">Total Orders</h2>
                <h1 class="text-lg font-medium">139</h1>
            </div>
            <div class="bg-white sm:w-1/3 md:w-1/6 w-1/3 flex flex-col p-4 rounded-xl gap-2 shadow-lg">
                <h2 class="text-gray-500">New Orders</h2>
                <h1 class="text-lg font-medium">5</h1>
            </div>
            <div class="bg-white sm:w-1/3 md:w-1/6 w-1/3 flex flex-col p-4 rounded-xl gap-2 shadow-lg">
                <h2 class="text-gray-500">Visitors</h2>
                <h1 class="text-lg font-medium">140</h1>
            </div>
        </article>
        <article class=" flex-wrap w-full justify-evenly my-10 gap-5 sm:flex">
            <div class="hidden md:flex flex-col md:w-2/5 w-full bg-white  p-5 rounded-lg shadow-lg ">
                <h1 class="font-medium mb-5">Bestsellers in the last 30 Days</h1>
                <table class="w-full table-fixed divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th class="w-1/2 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider  ">Product</th>
                        <th class="w-1/4 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider  ">Sold</th>
                        <th class="w-1/4 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider  ">Profit </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 flex items-center gap-0.5"><img class="w-10 h-10" src="{{asset("images/admin/tvimage.jpeg")}}" alt="image">Tv 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm ">150</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm ">17125 DH</td>
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  
            </div>
            <div class="md:w-2/5 w-full bg-white p-5 rounded-lg shadow-lg flex flex-wrap justify-around gap-10">
                <div class="w-full pl-5">
                    <h2 class="font-medium">Orders</h2>
                </div>
                <div class="bg-white  w-2/5  flex flex-col p-4 rounded-xl gap-2 shadow-lg">
                    <h2 class="text-gray-500">Today</h2>
                    <h1 class="text-lg font-medium ">5</h1>
                </div>
                <div class="bg-white w-2/5  flex flex-col p-4 rounded-xl gap-2 shadow-lg h-auto">
                    <h2 class="text-gray-500">Last Month</h2>
                    <h1 class="text-lg font-medium ">140</h1>
                </div>
                <div class="bg-white w-2/5  flex flex-col p-4 rounded-xl gap-2 shadow-lg">
                    <h2 class="text-gray-500">Last 6 Months</h2>
                    <h1 class="text-lg font-medium ">1420</h1>
                </div>
                <div class="bg-whitew-2/5  flex flex-col p-4 rounded-xl gap-2 shadow-lg">
                    <h2 class="text-gray-500">Last 1 year</h2>
                    <h1 class="text-lg font-medium ">11420</h1>
                </div>
            </div>
            
        </article>
        <article class="w-full p-10 bg-white rounded-lg shadow-lg">
            <h1 class="font-medium mb-5">Last Orders</h1>
            <table>
                <thead class="bg-gray-50">
                    <tr>
                      <th class="w-1/2 px-6 py-4 text-left text-xs font-medium text-gray-500  tracking-wider  ">Product</th>
                      <th class="w-1/4 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider  hidden md:table-cell">Qte</th>
                      <th class="w-1/4 px-6 py-4 text-left text-xs font-medium text-gray-500  tracking-wider  hidden md:table-cell">Date </th>
                      <th class="w-1/4 px-6 py-4 text-left text-xs font-medium text-gray-500  tracking-wider  hidden md:table-cell">Total </th>
                      <th class="w-1/4 px-6 py-4 text-left text-xs font-medium text-gray-500  tracking-wider  ">Status </th>
                      <th class="w-1/4 px-6 py-4 text-left text-xs font-medium text-gray-500  tracking-wider  ">Actions </th>
                      


                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 flex items-center gap-0.5"><img class="w-10 h-10" src="{{asset("images/admin/tvimage.jpeg")}}" alt="image"><h1 class="hidden md:block">Tv 2024 al hoceima maroc fes tanger</h1></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">24/07/2024 15:14</td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">1700 DH</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm ">New Order</td>
                        <td class="px-6 py-4 whitespace-nowrap text-2xl">...</td>
                      </tr>
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 flex items-center gap-0.5"><img class="w-10 h-10" src="{{asset("images/admin/tvimage.jpeg")}}" alt="image"><h1 class="hidden md:block">Tv 2024 al hoceima maroc fes tanger</h1></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">24/07/2024 15:14</td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">1700 DH</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm ">New Order</td>
                        <td class="px-6 py-4 whitespace-nowrap text-2xl">...</td>
                      </tr>
                  </tbody>
            </table>
        </article>
    </main>
</body>
</html>