// const { Connect } = require("vite");

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