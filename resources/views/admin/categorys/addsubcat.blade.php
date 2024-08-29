<div class="px-8 py-4 bg-green-500 text-white top-14  right-20 absolute hidden" id="openadded">
    <h1>Added To DB <span class="pl-5 text-2xl cursor-pointer font-extrabold" id="closeadded">X</span></h1>
    
</div>
<div class="fixed w-screen h-screen left-0 top-0 bg-black bg-opacity-60  items-center justify-center hidden" id="addsubcatdiv">
    <div class="px-8 py-4 bg-red-500 text-white top-14  right-20 absolute hidden" id="selectpls">
        <h1>Please Add The Image And the Name <span class="pl-5 text-2xl cursor-pointer font-extrabold" id="closeselectpls">X</span></h1>
        
    </div>
    
    
    <div class="w-3/12 bg-white p-5   flex flex-col items-center justify-center gap-2 ">
        <div class="w-full">
            <h1 class="mb-2">Add Subcat For  <span id="subcatname" class="font-bold "></span> <span id="subcatid" hidden></span> : </h1>
        </div>
        
        <div class="w-full flex flex-col items-center justify-center">
            <input type="text"  placeholder="name" class="w-7/12 h-10 border-2 p-5 border-black" id="subcatinput22" >
            <input type="file" name="file-1" id="file-1" hidden accept="image/*">
            
            <div class="border-2 w-7/12 min-h-40 h-auto mt-5 flex justify-center items-center">
                <img src="" alt="" id="theimage22" hidden class="w-40 h-40">
                <h1 id="divtext" class="text-gray-600">Image will be Displayed Here!</h1>
            </div>
            <label for="file-1" class="bg-green-500 w-7/12 flex justify-center items-center py-2 mt-5 cursor-pointer">
                <h1 class="text-white flex flex-row gap-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M440-160v-326L336-382l-56-58 200-200 200 200-56 58-104-104v326h-80ZM160-600v-120q0-33 23.5-56.5T240-800h480q33 0 56.5 23.5T800-720v120h-80v-120H240v120h-80Z"/></svg><span id="spanimageaddsub">Upload image</span></h1>
            </label>
        </div>
        <button type="submit" class="h-10   bg-admincolor text-white px-20 w-10/12 hover:bg-hoveradmincolor font-bold" id="addsubcatnow" >add</button>
        
        <button class="h-10   bg-red-700 text-white px-20 w-10/12 hover:bg-red-900 font-bold" type="reset" id="closeaddsubcat" >Close</button>
        

    </div>
</div>