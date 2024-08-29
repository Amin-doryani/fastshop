// const { Connect } = require("vite");

// const { data } = require("autoprefixer");

document.getElementById('dropzone-file').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("theimage").style.display = 'block';
            document.getElementById('displayimage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
function addcat(){
    document.getElementById("addcatmodel").style.display="block";
}
document.getElementById("closeaddcat").addEventListener("click",function(){
    document.getElementById("addcatmodel").style.display="none";
})
document.getElementById("closeaddcat2").addEventListener("click",function(){
    document.getElementById("addcatmodel").style.display="none";
})

document.querySelectorAll(".deletecat").forEach(function(element) {
    element.addEventListener('click', function(e) {
        document.getElementById("deletecatdiv").style.display = "block";
        let cat_id = e.target.getAttribute('data-category-id');
        let cat_name = e.target.getAttribute('data-category-name');
        document.getElementById("catnamedelete").innerHTML = cat_name;
        document.getElementById("catiddelete").innerHTML = cat_id;

     });
});

document.getElementById("canceldeletecat").addEventListener("click",function(e){
    document.getElementById("deletecatdiv").style.display = "none";
    
})
document.querySelectorAll(".updatecatbutton").forEach(function(element){
    element.addEventListener("click",function(e){
        document.getElementById("updatecatmodel").style.display = "block";
        let cat_id = e.target.getAttribute('data-category-id');
        let cat_name = e.target.getAttribute('data-category-name');
        document.getElementById("updatecatname").value = cat_name;
        document.getElementById("updatecatid").innerHTML = cat_id;
        document.getElementById("cathasbeenupdated").innerHTML = cat_name;
        let image = e.target.getAttribute('data-category-image');
        let imgpath = "/storage/assets/images/cat/" + image;
        document.getElementById("theimage2").style.display = 'block';
        document.getElementById('displayimageup').src = imgpath;
        


    })
})
document.getElementById("closeupdatecat").addEventListener("click",function(e){
    document.getElementById("updatecatmodel").style.display = "none";
})
document.getElementById("closeupdatecat2").addEventListener("click",function(e){
    document.getElementById("updatecatmodel").style.display = "none";
})
document.getElementById('dropzone-file2').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("theimage2").style.display = 'block';
            document.getElementById('displayimageup').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
// ADD CATEGORY
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#addcatform").submit(function(e){

        e.preventDefault();
        const formData = new FormData(this); 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.ajax({
        url : "savecat",
        type : "Post",
        data : formData,
       
        contentType: false,
        processData: false,
        success: function(response){
                if(response.status === 'success'){
                    $('#success').fadeIn();
                    $('#success').css("display","flex");
                    setTimeout(()=>{
                        $('#success').fadeOut();
                        $('#addcatform')[0].reset();
                        $('#theimage').css("display","none")
                    },5000)
                }
        },
        error: function(error) {
            $('#problem').fadeIn();
            $('#problem').css("display","flex");
            setTimeout(()=>{
                $('#problem').fadeOut();
                $('#addcatform')[0].reset();
                $('#theimage').css("display","none")
            },5000)
            
        }
       })
    })
    //confirm delete the category
    $("#confirmdeletecat").click(function(e){
        const catid = document.getElementById("catiddelete").innerHTML;
       
        
        $.ajax({
            url:"deletecat/" + catid,
            type:"Delete",
            
            ConnectType:false,
            processData: false,
            success: function(response){
                if(response.status == 200){
                    
                    $('#deletecatdiv').fadeOut();
                    
                
                }else if(response.status == 404){
                    alert("there is a problem deleteing this cat.. please contcat the devloper.. bcs we can't find the cat in database")
                    $('#deletecatdiv').fadeOut();

                }
            },
            error:function(err){
                alert("proble");
            }
        })
    })
    // UPDATE CATEGORY
    $("#upcatform").submit(function(e){
        e.preventDefault();
        const formData = new FormData(this);
        const id = document.getElementById("updatecatid").innerHTML;
        
        
        
        $.ajax({
            url : "upcat/" + id,
            type : "Post",
            data : formData,
           
            contentType: false,
            processData: false,
            success: function(response){
                    if(response.status === 200){
                        $('#upsuccess').fadeIn();
                        $('#upsuccess').css("display","flex");
                        setTimeout(()=>{
                            $('#upsuccess').fadeOut();
                            
                        },5000)
                    }else if(response.status === 200){
                        $('#upsuccess').fadeIn();
                        $('#upsuccess').css("display","flex");
                        setTimeout(()=>{
                            $('#upsuccess').fadeOut();
                            
                        },5000)
                        alert("updated but the image has ben not deleted yet from the server!");
                    }else {
                        $('#upproblem').fadeIn();
                        $('#upproblem').css("display","flex");
                        setTimeout(()=>{
                            $('#upproblem').fadeOut();
                            $('#upcatform')[0].reset();
                            $('#theimage').css("display","none")
                        },5000)
                    }
                    
                    
            },
            error: function(error) {
                $('#upproblem').fadeIn();
                $('#upproblem').css("display","flex");
                setTimeout(()=>{
                    $('#upproblem').fadeOut();
                    $('#upcatform')[0].reset();
                    $('#theimage').css("display","none")
                },5000)
                alert(error.message)
                
            }
           })
    })

});

// Subcatcode
// close subcatdiv
document.getElementById("closesubdiv").addEventListener("click", function(e){
    document.getElementById("subdiv").style.display = 'none';
    
})
// opensubcatdiv
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    document.querySelectorAll(".opensubcat").forEach(function(e){
        e.addEventListener('click',function(e2){
            const id = e.getAttribute("data-id");
            document.getElementById("subcatid").innerHTML = id;
            const name = e.getAttribute("data-name");
            document.getElementById("subcatname").innerHTML = name;
            function getdata(){
                
                $("#subdiv").fadeIn();
                $("#subdiv").css("display","flex");
                document.getElementById("subdiv").style.display="flex";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'GET',
                    url:'getsubcat/' + id,
                    dataType:'Json',
                    success:function(response){
                        // console.log(response.res)
                        $("#table").html("");
                        $("#table").append('<hr class="w-full">');
                        $.each(response.res,function(key, subcat){
                            $('#table').append('<div  class="flex min-w-10 items-center justify-start gap-2 py-2">\
               <img src="http://127.0.0.1:8000/storage/assets/images/subcat/'+subcat.image+'" class="w-16" alt="image">\
               <h1 class="font-bold text-xl w-6/12">'+subcat.name+'</h1>\
               <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 right-0 deletesubcatbtn" data-id="'+subcat.id+'" >Delete</button>\
            </div><hr class="w-full ">');
            //delete the subcat 
                document.querySelectorAll(".deletesubcatbtn").forEach(function(e){
                e.addEventListener('click',function(e2){
                    const id2 = e.getAttribute("data-id");
                    $.ajax({
                        type:'DELETE',
                        url:'deletesubcat/' + id2,
                        ConnectType:false,
                        processData: false,
                        success: function(response){
                            if(response.status == 200){
                                getdata()
                            }else if(response.status == 404){
                                alert(response.message)
                            }else{
                                alert("IDK")
                            }
                        },
                        error: function(err){
                            
                        }
                    })
                    })
                })
                        })
                    }
                })
            }
            getdata()
            
        })
    })
})
// open subcat div
$("#opensubcat").click(function(e){
    $("#addsubcatdiv").fadeIn();
    $('#addsubcatdiv').css("display","flex")
})
// close addsubcat div
$('#closeaddsubcat').click(function(e){
    $('#addsubcatdiv').fadeOut();
})

// show the image in the addsubcat after selecting an image 
$('#file-1').change(function(e) {
    if (e.target.files.length > 0) {
        let srcimg = URL.createObjectURL(e.target.files[0]);
        let theimage = document.getElementById("theimage22");
        theimage.src = srcimg;
        $("#divtext").fadeOut();
        $("#theimage22").fadeIn();
        $("#spanimageaddsub").html("Change image")
    }
    
})
//get subcat data
function getdata(){
    const id = parseInt(document.getElementById("subcatid").innerHTML);       
    $("#subdiv").fadeIn();
    document.getElementById("subdiv").style.display="flex";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'GET',
        url:'getsubcat/' + id,
        dataType:'Json',
        success:function(response){
            // console.log(response.res)
            $("#table").html("");
            $("#table").append('<hr class="w-full">');
            $.each(response.res,function(key, subcat){
                $('#table').append('<div  class="flex min-w-10 items-center justify-start gap-2 py-2">\
   <img src="http://127.0.0.1:8000/storage/assets/images/subcat/'+subcat.image+'" class="w-16" alt="image">\
   <h1 class="font-bold text-xl w-6/12">'+subcat.name+'</h1>\
   <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 right-0 deletesubcatbtn" data-id="'+subcat.id+'" >Delete</button>\
</div><hr class="w-full ">');
//delete the subcat 
    document.querySelectorAll(".deletesubcatbtn").forEach(function(e){
    e.addEventListener('click',function(e2){
        const id2 = e2.getAttribute("data-id");
        $.ajax({
            type:'DELETE',
            url:'deletesubcat/' + id2,
            ConnectType:false,
            processData: false,
            success: function(response){
                if(response.status == 200){
                    getdata()
                }else if(response.status == 404){
                    alert(response.message)
                }else{
                    alert("IDK")
                }
            },
            error: function(err){
                
            }
        })
        })
    })
            })
        }
    })
}

// add subcat to db

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#addsubcatnow").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const id =parseInt( document.getElementById("subcatid").innerHTML);
        
        let formData = new FormData();
        formData.append('name',$("#subcatinput22").val());
        formData.append('file',$('#file-1')[0].files[0]);
        formData.append('id_category',id);
        
        if($('#file-1')[0].files[0] && $("#subcatinput22").val() != "" ){
               $.ajax({
                url : "savesubcatinfo",
                type : "Post",
                data : formData,
                dataType:'Json',
                contentType: false,
                processData: false,
                success: function(response){
                    
                    openadded();
                    $("#addsubcatdiv").fadeOut();
                    getdata();
                    $("#file-1").val("");
                    $("#subcatinput22").val("");
                    $("#theimage22").fadeOut();
                    document.getElementById("theimage22").src = "";
                },error : function(err){
                    alert("baad");
                   
                }

            
            })
            
        }else{
            selectpls();
        }
        
})
})
// show the select the input image please message 

function selectpls(){
    $("#selectpls").fadeIn();
}

setTimeout(function(){$("#selectpls").fadeOut()}, 5000);
$("#closeselectpls").click(function(){
    $("#selectpls").fadeOut()
})
// open and close the div for succs for subcat add
function openadded(){
    $("#openadded").fadeIn();
    setTimeout(function(){$("#openadded").fadeOut()}, 5000);
}

$("#closeadded").click(function(){
    $("#openadded").fadeOut()
})

// show the search cat
$(document).ready(function(){
    $("#searchname").on("input",function(e){
        let val = $("#searchname").val();
        if (val.trim() === ""){
            val = "getall29082024";
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : "getcats/" + val,
            type : "get",
            dataType:'Json',
            contentType: false,
            processData: false,
            success: function(response){
                $("#getcats").html("");
                $.each(response.res,function(key, subcat){
                    $('#getcats').append('\
                        <tr class="border-b border-gray-200 hover:bg-gray-50">\
                            <td class="px-4 py-2">#'+subcat.id+'</td>\
                            <td class="px-4 py-2 flex items-center"><img src="http://127.0.0.1:8000/storage/assets/images/cat/'+subcat.image+'" alt="cat"  class="w-10 h-10 rounded-sm mr-3">'+subcat.name+'</td>\
                            <td class="px-4 py-2 hover:bg-slate-400 cursor-pointer opensubcat" data-name="'+subcat.name+'"  data-id="'+subcat.id+'"><span>'+subcat.subcategory_count+' </span> Subcat</td>\
                            <td class="px-4 py-2 text-blue-500 cursor-pointer updatecatbutton"  data-category-id="'+subcat.id+'" data-category-name="'+subcat.name+'" data-category-image="'+subcat.image+'" >Edit</td>\
                            <td class="px-4 py-2 text-red-500 cursor-pointer deletecat" data-category-id="'+subcat.id+'" data-category-name="'+subcat.name+'"  >Delete</td>\
                        </tr>\
                        ');
                })
               //opensub cat div v2
                document.querySelectorAll(".opensubcat").forEach(function(e){
                    e.addEventListener('click',function(e2){
                        const id = e.getAttribute("data-id");
                        document.getElementById("subcatid").innerHTML = id;
                        const name = e.getAttribute("data-name");
                        document.getElementById("subcatname").innerHTML = name;
                        function getdata(){
                            
                            $("#subdiv").fadeIn();
                            $("#subdiv").css("display","flex");
                            document.getElementById("subdiv").style.display="flex";
                            
                            $.ajax({
                                type:'GET',
                                url:'getsubcat/' + id,
                                dataType:'Json',
                                success:function(response){
                                    // console.log(response.res)
                                    $("#table").html("");
                                    $("#table").append('<hr class="w-full">');
                                    $.each(response.res,function(key, subcat){
                                        $('#table').append('<div  class="flex min-w-10 items-center justify-start gap-2 py-2">\
                           <img src="http://127.0.0.1:8000/storage/assets/images/subcat/'+subcat.image+'" class="w-16" alt="image">\
                           <h1 class="font-bold text-xl w-6/12">'+subcat.name+'</h1>\
                           <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 right-0 deletesubcatbtn" data-id="'+subcat.id+'" >Delete</button>\
                        </div><hr class="w-full ">');
                        //delete the subcat 
                            document.querySelectorAll(".deletesubcatbtn").forEach(function(e){
                            e.addEventListener('click',function(e2){
                                const id2 = e.getAttribute("data-id");
                                $.ajax({
                                    type:'DELETE',
                                    url:'deletesubcat/' + id2,
                                    ConnectType:false,
                                    processData: false,
                                    success: function(response){
                                        if(response.status == 200){
                                            getdata()
                                        }else if(response.status == 404){
                                            alert(response.message)
                                        }else{
                                            alert("IDK")
                                        }
                                    },
                                    error: function(err){
                                        
                                    }
                                })
                                })
                            })
                                    })
                                }
                            })
                        }
                        getdata()
                        
                    })
                })
                document.querySelectorAll(".deletecat").forEach(function(element) {
                    element.addEventListener('click', function(e) {
                        document.getElementById("deletecatdiv").style.display = "block";
                        let cat_id = e.target.getAttribute('data-category-id');
                        let cat_name = e.target.getAttribute('data-category-name');
                        document.getElementById("catnamedelete").innerHTML = cat_name;
                        document.getElementById("catiddelete").innerHTML = cat_id;
                
                     });
                });
            },error: function(err){

            }
        })
    })
})

