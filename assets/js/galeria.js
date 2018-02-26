var minImageWidth = 500,
    minImageHeight = 405;
var dropzoneOptions = {
  clickable: '#btn-galeria',
  url: "/ajax/file_gallery.php",
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB

  //accept: function(file, done) {
  //  file.acceptDimensions = done;
  //  file.rejectDimensions = function() { done("Image too small."); };
  //},
  previewTemplate: document.getElementById('template-preview').innerHTML,
  addRemoveLinks: true,
    dictRemoveFileConfirmation:  "Deseas eliminar esta imagen?",
  init: function() {
    this.on("addedfile", function(file) {
      //alert("Added file.");
        //console.log($(this));
        file.previewElement.addEventListener("click", function(evt) {
            //console.log(file);
            console.log(file);
            console.log(file.upload.uuid);
            console.log($(this));
            var fileExt = file.upload.filename.split('.').pop();

            //console.log($(this));
            //console.log($(this).name);
            //myDropzone.removeFile(file);

            if(!$(evt.target).hasClass("icon-remove")) {
                $(".foto-selected").removeClass("foto-selected");
                $("img[alt='" + file.name + "']").addClass("foto-selected");
                $.ajax({
                    type: 'POST',
                    url: '/ajax/file_select.php',
                    data: {
                        "foto": file.upload.uuid + "." + fileExt
                    },
                    success: function (data) {
                        console.log(data)
                    }
                })
            }

        });
    });
    this.on("removedfile", function(file) {
      //alert("Removed file.");
      //console.log("removing");
      //console.log(file);
      //console.log(file.upload.uuid);
      $.ajax({
        type:'DELETE',
        url:'/ajax/file_gallery.php',
        data : {
          "uuid" : file.upload.uuid
        },
        success : function (data) {

        }
      });

    });
    this.on('sending', function(file, xhr, formData){
      console.log("sending");
      console.log(file);
      //console.log(file.upload.uuid);
      formData.append('uuid', file.upload.uuid);
    });

    this.on("thumbnail", function(file) {
      // Do the dimension checks you want to do
      /*console.log('file.width')
      console.log(file.width)
      console.log('file.height')
      console.log(file.height)
      if (file.width < minImageWidth || file.height < minImageHeight) {
        file.rejectDimensions()
      }
      else {
        file.acceptDimensions();
      }*/
      console.log(file);

    });
    this.on("success", function(file, serverResponse) {
      // Called after the file successfully uploaded.
      console.log("success");
      console.log(file);
      console.log(serverResponse);

      // If the image is already a thumbnail:
      this.emit('thumbnail', file, "/img/galeria/" + serverResponse.filename);

      // If it needs resizing:
      this.createThumbnailFromUrl(file,  "/img/galeria/" + serverResponse.filename);
    });
  }

};
var myDropzone = new Dropzone("div#zona", dropzoneOptions );


// initialize dropzone
Dropzone.autoDiscover = false;


//preload gallery
$.ajax({
  type:'GET',
  url:'/ajax/file_gallery.php',
  data : {
    "idfranquicia" : 2
  },
  success : function (data) {
    for (var i = 0; i < data.length; i++){
      var obj = data[i];
      var mockFile = { name: obj.base , upload: { uuid: obj.uuid } , size: 12345 };
      myDropzone.options.addedfile.call(myDropzone, mockFile);
      myDropzone.files.push(mockFile);
      myDropzone.options.thumbnail.call(myDropzone, mockFile, "/img/galeria/"+obj.base);

    }
  }
}).then(function () {

    $(".dz-details img").on('click', function (evt) {
        console.log($(this).attr("alt"));
        console.log(evt);
        console.log($(evt.target).hasClass("icon-remove"))

        if(!$(evt.target).hasClass("icon-remove")){
        $(".foto-selected").removeClass("foto-selected");
        $(this).addClass("foto-selected");

        $.ajax({
            type:'POST',
            url:'/ajax/file_select.php',
            data : {
                "foto" : $(this).attr("alt")
            },
            success : function (data) {
                console.log(data)


            }
        })
        }
    });
}).then(function () {

    $.ajax({
        type:'GET',
        url:'/ajax/file_select.php',
        success : function (data) {
            console.log(data.foto)
            $("img[alt='"+data.foto+"']").addClass("foto-selected");

        }
    })

});
