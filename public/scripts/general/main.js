
/* global URL, base_url */

var loadFile = function (event) {
    var output = document.getElementById('change-profile-pic');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('#change-profile-pic').cropper("destroy");

    var $previews = $('.preview');
    $('#change-profile-pic').cropper({
        ready: function () {
            var $clone = $(this).clone().removeClass('cropper-hidden');
            $clone.css({
                display: 'block',
                width: '100%',
                minWidth: 0,
                minHeight: 0,
                maxWidth: 'none',
                maxHeight: 'none'
            });
            $previews.css({
                width: '100%',
                overflow: 'hidden'
            }).html($clone);
        },
        crop: function (e) {

            var imageData = $(this).cropper('getImageData');
            var croppedCanvas = $(this).cropper('getCroppedCanvas');
            
            function dataURLtoFile(dataurl, filename) {
                var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
                        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
                while (n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new File([u8arr], filename, {type: mime});
            }

            var file = dataURLtoFile(croppedCanvas.toDataURL(), 'a.png');
            console.log(file);
            
            
            $('#profile-result').html('<img src="' + croppedCanvas.toDataURL() + '" class="thumb-lg img-circle" id="secreto"><input type="hidden" value="' + croppedCanvas.toDataURL() +'" name="secreto">');
            
            localStorage.setItem('miGato', croppedCanvas.toDataURL());
            
            $('#save-profile').click(function () {
                $('#loading').show();
                $.ajax({
                    type: 'POST',
                    //****************************************** //auxiliarphp/set-profile**//
                    url: 'set-profile.php',
                    data: {
                        url: croppedCanvas.toDataURL()
                    },
                    success: function (response) {

                        if (response == "success") {
                            $('#loading').html("Profile picture successfully updated");
                            setTimeout(function () {
                                $('#loading').hide();
                                $('#change-profile').modal('hide');
                            }, 2000);


                        }

                    }
                });
            });

            var previewAspectRatio = e.width / e.height;
            $previews.each(function () {
                var $preview = $(this);
                var previewWidth = $preview.width();
                var previewHeight = previewWidth / previewAspectRatio;
                var imageScaledRatio = e.width / previewWidth;
                $preview.height(previewHeight).find('img').css({
                    width: imageData.naturalWidth / imageScaledRatio,
                    height: imageData.naturalHeight / imageScaledRatio,
                    marginLeft: -e.x / imageScaledRatio,
                    marginTop: -e.y / imageScaledRatio
                });
            });

        }
    });
};
