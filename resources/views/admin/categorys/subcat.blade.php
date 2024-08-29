<style>
   .scrollbar-green::-webkit-scrollbar {
    width: 12px;
}

.scrollbar-green::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.scrollbar-green::-webkit-scrollbar-thumb {
    background: #FF8901;
    
}

.scrollbar-green::-webkit-scrollbar-thumb:hover {
    background: #FF8901;
}
</style>
<div class=" fixed top-0  left-0 bg-black bg-opacity-60 h-screen w-screen  hidden justify-center items-center " id="subdiv">
    <div class="w-4/12 bg-white p-5 max-h-[90vh] overflow-y-auto scrollbar-green">
        <h1 class="font-bold text-xl">SubCategoryies</h1>
         <div class="w-full  h-10 flex items-center p-5 justify-end">
            <button class="bg-admincolor text-white hover:bg-hoveradmincolor py-1 px-2 rounded " id="opensubcat">Add SubCAt </button>
         </div>
         <div id="table" class="">
            {{-- <div  class="flex min-w-10 items-center justify-start gap-2 ">
               
               <img src="{{asset('storage/assets/images/cat/1722724911.png')}}" class="w-16" alt="image">
               <h1 class="font-bold text-xl w-6/12">IPTV</h1>
               <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 right-0">Delete</button>
               
            </div> --}}
            
           
            
            
            
            
            
           
            
         </div>
         <div class="w-full  h-10 flex items-center p-5 justify-end">
            <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" id="closesubdiv">Close</button>
         </div>
    </div>
</div>