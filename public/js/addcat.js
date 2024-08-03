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



$(document).ready(function(){
    
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
});