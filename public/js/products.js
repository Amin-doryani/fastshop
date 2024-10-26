$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    document.querySelectorAll(".deletepro").forEach(function(element){
        element.addEventListener("click",function(e){
    
            var id = e.currentTarget.getAttribute("data-id")
            var img = e.currentTarget.getAttribute("data-img")
            var name =e.currentTarget.getAttribute("data-name")
            var fullimg = "http://127.0.0.1:8000/storage/assets/images/productsimages/" + img;
           
            document.getElementById("thedeletedivimg").src = fullimg;
            if(img != null){
                $("#thedeletedivimg").fadeIn();
            }else{
                $("#thedeletedivimg").fadeOut();
            }
            
            $("#thedeletedivname").html(name);
            $("#thedeletedivid").html(id);
            $("#deleteproductdiv").fadeIn();
            $("#deleteproductdiv").css("display","flex");
            
        })
    })
    // cancel delte product
    $("#canceldeleteproduct").click(function(e){
        e.preventDefault();
        $("#thedeletedivimg").fadeOut();
        $("#deleteproductdiv").fadeOut();
    
    })
    $("#deletetheproduct").click(function(e){
        if($("#thedeletedivid").html() != ""){
            const id = Number($("#thedeletedivid").html())
            $.ajax({
                url : "deleteproduct/" +id,
                type : "get",
               
                contentType: false,
                processData: false,
                success: function(response){
                    $("#numberimgs").html(response.deletedimages)
                    $("#thedeletedivimg").fadeOut();
                    $("#deleteproductdiv").fadeOut();
                    
                    $("#hasdeleted").fadeIn();
                    setTimeout(function(e){
                        $("#hasdeleted").fadeOut();
                        location.reload();

                    },5000)
                },error: function(err){
                    $("#thedeletedivimg").fadeOut();
                    $("#deleteproductdiv").fadeOut();
                    
                    $("#hasnotdeleted").fadeIn();
                    setTimeout(function(e){
                        $("#hasnotdeleted").fadeOut();
                        location.reload();
                    },5000)
                }
            });
        }
        
    })
})


