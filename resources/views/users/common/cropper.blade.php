
<script>


    // function settingProposal(data){
    //     var proId = $(data).attr("data-id");
    //     $('#settingsModal').find('#proposal-id').val(proId);
    //     $('#settingsModal').modal('toggle');
    // }

    function fileDetailsCrop(data)
    {
        let name = $(data).attr('name');
        let img_size = $(data).attr('data-size');
        let img_ratio = $(data).attr('data-ratio');
        $("#crop").attr('data-name', name);
        $("#crop").attr('data-size', img_size);
        $("#crop").attr('data-ratio', img_ratio);
    }

    var $modal = $('#copperModal');
    var image = document.getElementById('image');
    var cropper;
    $("body").on("change", ".image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function() {
        let img_size = $("#crop").attr('data-size');
        let img_ratio = $("#crop").attr('data-ratio');
        var csize = img_size.split('x');
        var cratio = img_ratio.split('/');
        // console.log("Ratio", cratio[0]+" / "+cratio[1]);
        // console.log(parseInt(csize[0]),parseInt(csize[1]));
        cropper = new Cropper(image, {
            aspectRatio: cratio[0] / cratio[1],
            dragMode: 'move',
            restore: false,
            guides: true,
            center: false,
            highlight: false,
            mouseWheelZoom: true,
            touchDragZoom: true,
            cropBoxMovable: true,
            cropBoxResizable: false,
            toggleDragModeOnDblclick: false,
            data: {
                width: parseInt(csize[0]),
                height: parseInt(csize[1])
            },
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    $("#crop").click(function() {
        // alert('okay');
        let fieldName = $(this).attr('data-name');
        let img_size = $(this).attr('data-size');
        var csize = img_size.split('x');

        canvas = cropper.getCroppedCanvas({
            width: parseInt(csize[0]),
            height: parseInt(csize[1]),
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                console.log("base64 data", base64data, fieldName)
                // $('#baseImage').val(base64data);
                $('#'+fieldName+'_baseImage').val(base64data);
                $("#noimage").hide();
                $('#'+fieldName+'_preview').css({
                    "background-image": "url('"+base64data+"')",
                    "background-size": "contain",
                    "background-position": "center",
                    "background-repeat": "no-repeat"
                }).html("");
                $modal.modal('hide')
            }
        });
    });

    function base64ToFile(base64String, fileName) {
        let arr = base64String.split(',');
        let mime = arr[0].match(/:(.*?);/)[1];
        let bstr = atob(arr[1]);
        let n = bstr.length;
        let u8arr = new Uint8Array(n);

        while (n--) {
            u8arr[n] = bstr.charCodeAt(n);
        }

        return new File([u8arr], fileName, { type: mime });
    }

    </script>

