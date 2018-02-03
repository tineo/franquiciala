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
  init: function() {
    this.on("addedfile", function(file) {
      //alert("Added file.");
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

    /*this.on("thumbnail", function(file) {
      // Do the dimension checks you want to do
      console.log('file.width')
      console.log(file.width)
      console.log('file.height')
      console.log(file.height)
      if (file.width < minImageWidth || file.height < minImageHeight) {
        file.rejectDimensions()
      }
      else {
        file.acceptDimensions();
      }
    });*/
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
});
