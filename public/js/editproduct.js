$("#disc").on("input",function(e){
    let price = Number($("#price").val());
    let disc = Number($("#disc").val());
    const newprice = price - (price * disc)/100
    $("#newprice").val(newprice)
})
$("#price").on("input",function(e){
    let price = Number($("#price").val());
    let disc = Number($("#disc").val());
    const newprice = price - (price * disc)/100
    $("#newprice").val(newprice)
})
//cancel update
$("#cancelupdate").click(function(){
    window.history.back();
})
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
    });
    // get the subcats
    $("#select1").on("change",function(e){
        var url = "{{ route('getcats', '') }}/" + Number($('#select1').val());
        $.ajax({
            url: "getsubcatforpro/" + Number($("#select1").val()), 
            type: "get",
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                    
                    $("#select2").html("");
                    $.each(response.res,function(key,subcat){
                        $("#select2").append("\
                            <option value="+subcat.id+">"+subcat.name+"</option>\
                            ");
                    })
            },
            error: function(err){
                alert("error")
            }
        })
    })
    // update the product
    $("#updateproduct").click(function(e){
        if($("#product_t").val() == "" || $("#description").val() == ""|| $("#price").val() == ""|| $("#proQ").val() == ""|| $("#disc").val() == "" || $("#select2").val() == null){
            $("#problemdiv").fadeIn();
            setTimeout(function(){
                $("#problemdiv").fadeOut();
            },5000)
        }else{
            let formData = new FormData();
            formData.append("title",$("#product_t").val())
            formData.append("desc",$("#description").val())
            formData.append("price",$("#price").val())
            formData.append("q",$("#proQ").val())
            formData.append("disc",$("#disc").val())
            formData.append("select2",Number($("#select2").val()))
            
            $.ajax({
                url: "updateproduct/" + Number($('#idproduct').html()),
                      type: "post",
                      data: formData,
                      dataType: 'json',
                      contentType: false,
                      processData: false,
                      success: function(response) {
                          $("#updateddiv").fadeIn();
                          setTimeout(function(e){
                            $("#updateddiv").fadeOut();
                            setTimeout(function(e){
                            window.history.back();
                            },1000)
                          },5000)
                        $("#updateddiv").fadeIn();

                        
                      },
                      error: function(err) {
                          console.log(err)
                      }
            })

        }
    })
    
})
$("#updateimages").click(function(e){
    
    let id = $("#idproduct").html()
    
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
    });
    $.ajax({
        url: "getimages/" + Number(id), 
        type: "get",
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(response){
            $("#proimages").html("");
            $.each(response.res,function(key,img){
                
                $("#proimages").append('\
                        <div class="w-10/12 flex flex-col justify-center items-center  gap-2 py-2 shadow-md mb-2">\
                        <img src="http://127.0.0.1:8000/storage/assets/images/productsimages/'+img.paths+'" alt="img" class="w-6/12 ">\
                        <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-6 rounded-sm w-4/12 deleteimage" data-id="'+img.id+'">Delete Image</button>\
                        </div>\
                    ')
            })
            $("#updateimagesdiv").fadeIn();
            $("#updateimagesdiv").css("display","flex");
            addevntltt();
            console.log(response.res)
        },error: function(err){

        }
})

})
$("#goback").click(function(e){
    $("#updateimagesdiv").fadeOut();
})
// delete image

function addevntltt(){
    document.querySelectorAll(".deleteimage").forEach(function(element){
        element.addEventListener("click",function(e){
               let id2 =  e.target.getAttribute("data-id");
               $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
                });
                $.ajax({
                    url: "deleteimage/" + Number(id2), 
                    type: "get",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $("#imagedeleted2").fadeIn();
                        $("#imagedeleted2").css("display","absolute")
                        setTimeout(function(){
                            $("#imagedeleted2").fadeOut();
                        },5000)
                        $("#proimages").html("");
                        $.each(response.res,function(key,img){
                
                        $("#proimages").append('\
                            <div class="w-10/12 flex flex-col justify-center items-center  gap-2 py-2 shadow-md mb-2">\
                            <img src="http://127.0.0.1:8000/storage/assets/images/productsimages/'+img.paths+'" alt="img" class="w-6/12 ">\
                            <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-6 rounded-sm w-4/12 deleteimage" data-id="'+img.id+'">Delete Image</button>\
                            </div>\
                        ')
                    })
                    addevntltt()
                    },error:function(e){
                        alert("there is a problem please contcat the devs!!")
                    }
                })
        })
    })
}
