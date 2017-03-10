var URL = window.URL || window.webkitURL;
var uploadedImageURL;
var cropper;
var options = {
      aspectRatio: 1,
      viewMode: 1,
      ready: function () {
          croppable = true;
      }
}
var photoUploadUrl =  $('#photo-upload-url').data('url');


$('#upload-pic').on('shown.bs.modal', function(){

    var image = document.getElementById('image');
    cropper = new Cropper(image, options)


    // Import image
      var inputImage = document.getElementById('inputImage');

      if (URL) {
        inputImage.onchange = function () {
          var files = this.files;
          var file;

          if (cropper && files && files.length) {
            file = files[0];

            if (/^image\/\w+/.test(file.type)) {
              if (uploadedImageURL) {
                URL.revokeObjectURL(uploadedImageURL);
              }

              image.src = uploadedImageURL = URL.createObjectURL(file);
              cropper.destroy();
              cropper = new Cropper(image, options);
              inputImage.value = null;
            } else {
              window.alert('Please choose an image file.');
            }
          }
        };
      } else {
        inputImage.disabled = true;
        inputImage.parentNode.className += ' disabled';
      }


});

$('#upload-to-server').on('click', () => {
    roundedPhoto = getRoundedCanvas(cropper.getCroppedCanvas());

          var formData = new FormData();
          formData.append('avatar', roundedPhoto.toDataURL('image/png'));
          formData.append('_token', window.Laravel.csrfToken);

          // Use `jQuery.ajax` method
          $.ajax(photoUploadUrl, {
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
              location.reload();
            },
            error: function () {
              console.log('Upload error');
            }
          });

});


function getRoundedCanvas(sourceCanvas) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = sourceCanvas.width;
        var height = sourceCanvas.height;

        canvas.width = width;
        canvas.height = height;

        context.imageSmoothingEnabled = true;
        context.drawImage(sourceCanvas, 0, 0, width, height);
        context.globalCompositeOperation = 'destination-in';
        context.beginPath();
        context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
        context.fill();

        return canvas;
}

