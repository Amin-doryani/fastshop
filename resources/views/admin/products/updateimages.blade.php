<div class=" fixed w-screen h-screen top-0 left-0 bg-black bg-opacity-60  items-center justify-center hidden" id="updateimagesdiv">
   <div style="height:80vh; overflow-y: scroll;"  class="bg-white flex flex-col items-center py-10 w-4/12" >
    {{-- // --}}
    <span id="theproductid" class="hidden"></span>
    <div class="w-full pl-2"><button class="py-2 px-4 bg-red-500 hover:bg-red-700 shadow-2xl rounded-md text-white mb-4" id="goback">Go Back</button></div>
    
    <label for="updateimage2" class="flex flex-col items-center justify-center w-10/12 h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload the image</span></p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF </p>
        </div>
        <input  name="updateimage2[]" type="file" id="updateimage2" multiple class="hidden" accept="image/*"/>
    </label>
    {{-- // --}}
       <h1 class="text-black font-bold text-xl mt-10">Update Images</h1>
       <div class="w-full flex flex-col items-center" id="proimages">
            <div class="w-10/12 flex flex-col justify-center items-center  gap-2 py-2 shadow-md">
                <img src="{{asset("images/admin/tvimage.jpeg")}}" alt="img" class="w-6/12 ">
                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-6 rounded-sm w-4/12 ">Delete Image</button>
            </div>
            
        </div>  
       
       
       
   </div>
</div>
<div class="top-20 right-20 bg-green-500 py-2 px-4  absolute hidden" id="imagedeleted2">
    <h1 class="text-white">Image Has Been Deleted</h1>
</div>


