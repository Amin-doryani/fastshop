let dropArea = document.getElementById('drop-area');
let filesArray = [];

// Prevent default drag behaviors
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
});

// Highlight drop area when item is dragged over it
['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, () => dropArea.classList.add('highlight'), false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, () => dropArea.classList.remove('highlight'), false);
});

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false);

// Handle file input
dropArea.addEventListener('click', () => document.getElementById('fileElem').click());
document.getElementById('fileElem').addEventListener('change', handleFiles, false);

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

function handleDrop(e) {
    let dt = e.dataTransfer;
    let files = dt.files;
    handleFiles({ target: { files: files } });
}

function handleFiles(e) {
    const files = e.target.files;
    const preview = document.getElementById('image-preview');
    preview.innerHTML = ''; // Clear the preview div
    filesArray = [...filesArray, ...files];
    previewFiles(filesArray);
}

function previewFiles(files) {
    const preview = document.getElementById('image-preview');
    preview.innerHTML = ''; // Clear the preview div

    files.forEach((file, index) => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.className = 'preview-img-container';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'preview-img';

                const removeBtn = document.createElement('button');
                removeBtn.className = 'remove-btn';
                removeBtn.innerHTML = '&times;';
                removeBtn.addEventListener('click', () => {
                    filesArray.splice(index, 1);
                    previewFiles(filesArray);
                });

                imgContainer.appendChild(img);
                imgContainer.appendChild(removeBtn);
                preview.appendChild(imgContainer);
            }

            reader.readAsDataURL(file);
        }
    });
}

// Display stored images (mockup example)
function displayStoredImages(images) {
    const storedImagesContainer = document.getElementById('stored-images');
    storedImagesContainer.innerHTML = ''; // Clear the stored images div

    images.forEach(imageUrl => {
        const img = document.createElement('img');
        img.src = imageUrl;
        img.className = 'stored-img';
        storedImagesContainer.appendChild(img);
    });
}

// Mockup of previously stored images
const storedImages = [
    'https://via.placeholder.com/150', 
    'https://via.placeholder.com/150', 
    'https://via.placeholder.com/150'
];

// Display stored images on page load
// displayStoredImages(storedImages);

// get the sub cat of the selected category

$("#select1").change(function(e){
    const id = document.getElementById("select1").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : "getsubcatforpro/" + id,
        type : "get",
        dataType:'Json',
        contentType: false,
        processData: false,
        success: function(response){
            $("#select2").html("<option disabled selected>SubCat</option>");
            $.each(response.res,function(key,subcat){
                $("#select2").append("<option value='"+subcat.id+"'>"+subcat.name+"</option>")
            })
            
        },error: function(err){
            alert("error")
        }
    })
})
// submit

$("#addproduct").click(function(){
    if($("#product_t").val() == "" || $("#description").val() == ""|| $("#price").val() == ""|| $("#proQ").val() == ""|| $("#disc").val() == "" || $("#select2").val() == null){
        $("#filldiv").fadeIn();
        setInterval(function(e){
            $("#filldiv").fadeOut();
        },5000)
    }else{
        if($("#disc").val() > 100 || $("#disc").val()<0 ){
            $("#discspan").fadeIn();
            $("#disc").on("input",function(){
                if($("#disc").val() > 100 || $("#disc").val()<0){
                    $("#discspan").fadeIn();
                }else{
                    $("#discspan").fadeOut();
                }
                    
                
            })
        }else{
            
            let formData = new FormData();

            function processImage(index, img) {
             return fetch(img.src)
                .then(res => res.blob())
                .then(blob => {
                    console.log(`Appending image-${index}.png`);
                    formData.append('files[]', blob, `image-${index}.png`);
                });
            }

            let imagePromises = [];

            $("#image-preview img").each(function(e, img) {
                 imagePromises.push(processImage(e, img));
            });

            Promise.all(imagePromises).then(() => {
    
             if (imagePromises.length > 0) {
                 // Append additional form data
                formData.append('title', $("#product_t").val());
                formData.append('desc', $("#description").val());
                formData.append('price', $("#price").val());
                formData.append('q', $("#proQ").val());
                formData.append('disc', $("#disc").val());
                formData.append('subcat', $("#select2").val());

                // Set up CSRF token for the AJAX request
             $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                    });

                // Perform the AJAX request
             $.ajax({
                      url: "store-product", // Update with your correct URL
                      type: "post",
                      data: formData,
                      dataType: 'json',
                      contentType: false,
                      processData: false,
                      success: function(response) {
                        $("#producthasbeenadded").fadeIn();
                        $("#producthasbeenadded").css("display","absolute");
                        setTimeout(function(e){
                            $("#producthasbeenadded").fadeOut();
                            setTimeout(function(e){
                                window.history.back();
                            },500)
                        },4000)
                         
                      },
                      error: function(error) {
                          alert("Error: " + error.statusText);
                      }
                  });
              } else {
                 // If no images were processed, show a message
                  $("#imagesdiv").fadeIn();
                  setTimeout(function() {
                      $("#imagesdiv").fadeOut();
                  }, 5000);
                }
            })
           
            


        }
        
    }


    
    
})
$("#price").on("input",function(e){
    if($("#disc").val()!= null){
        $("#newprice").val($("#price").val()-(($("#price").val()*$("#disc").val())/100))
    }
    
})
$("#disc").on("input",function(e){
    if($("#price").val()!= null){
        $("#newprice").val($("#price").val()-(($("#price").val()*$("#disc").val())/100))
    }
})
