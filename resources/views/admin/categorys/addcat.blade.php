
<div class="relative z-10 " style="display:none;" id="addcatmodel" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 ">
        
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-11/12 sm:my-8 sm:w-full sm:max-w-lg ">
          <div class="hidden absolute inset-0 bg-black bg-opacity-95 z-50 flex justify-center items-center flex-col gap-5" id="success">
            <?xml version="1.0"?><svg fill="#40C057" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="50px" height="50px">    <path d="M43.171,10.925L24.085,33.446l-9.667-9.015l1.363-1.463l8.134,7.585L41.861,9.378C37.657,4.844,31.656,2,25,2 C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23C48,19.701,46.194,14.818,43.171,10.925z"/></svg>
            <h1 class="text-white">The category has been added.</h1>
          </div>
          <div class="hidden absolute inset-0 bg-black bg-opacity-95 z-50 flex justify-center items-center flex-col gap-5" id="problem">
            <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#8B1A10"><path d="m40-120 440-760 440 760H40Zm138-80h604L480-720 178-200Zm302-40q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Zm40-100Z"/></svg>
            <h1 class="text-white">There is a problem. Please try again, or contact the developers.</h1>
          </div>
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
            <div class=" w-12/12 pr-3 flex justify-end ">
                <span id="closeaddcat2" class="font-bold text-2xl cursor-pointer">X</span>
            </div>
            
            <div class="flex flex-col gap-2 ">
                <h1 class="font-bold">Add New Category</h1>
              <form action=""  class="flex flex-col   items-center gap-5" enctype="multipart/form-data" id="addcatform">
                @csrf
                <input type="text"  id="catname" name="name" class="border-2 border-slate-950 pl-5 h-10 w-10/12" placeholder="Name" required >
                
                <div class="flex flex-col items-center justify-center w-full ">
                    <div class="w-10/12 mb-5 " id="theimage" style="display: none;">
                        <img src="" alt="img" id="displayimage" class="max-w-10/12 ">
                    </div>
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-10/12 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload the image</span></p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF </p>
                </div>
                <input id="dropzone-file" name="file" type="file" id="catfile" class="hidden" />
            </label>
            
            </div> 

                <button type="submit" class="h-10   bg-admincolor text-white px-20 w-10/12 hover:bg-hoveradmincolor font-bold" >add</button>
               
                <button class="h-10   bg-red-700 text-white px-20 w-10/12 hover:bg-red-900 font-bold" type="reset" id="closeaddcat" >Close</button>

              </form>
            </div>
          </div>
          
          
        </div>
        
      </div>
      
    </div>
  </div>

  

