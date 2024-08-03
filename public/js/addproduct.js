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
displayStoredImages(storedImages);