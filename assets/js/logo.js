var minImageWidth = 500,
    minImageHeight = 405;
var currentFile = null;
var dropzoneOptions3 = {
  clickable: '#btn-logo',
  url: "/ajax/file_logo.php",
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB

  //accept: function(file, done) {
  //  file.acceptDimensions = done;
  //  file.rejectDimensions = function() { done("Image too small."); };
  //},
  previewTemplate: document.getElementById('template-preview2').innerHTML,
  addRemoveLinks: false,
  maxFiles: 1,
  init: function() {
    this.on("addedfile", function(file) {
      //alert("Added file.");
        if (currentFile) {
            this.removeFile(currentFile);
        }
        currentFile = file;

    });
    this.on("removedfile", function(file) {
      //alert("Removed file.");
      //console.log("removing");
      //console.log(file);
      //console.log(file.upload.uuid);
      $.ajax({
        type:'DELETE',
        url:'/ajax/file_logo.php',
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
      this.emit('thumbnail', file, "/img/logos-clientes/" + serverResponse.filename);

      // If it needs resizing:
      this.createThumbnailFromUrl(file,  "/img/logos-clientes/" + serverResponse.filename);
    });
  }

};
var myDropzone3 = new Dropzone("div#zona3", dropzoneOptions3 );


// initialize dropzone
Dropzone.autoDiscover = false;


//preload gallery
$.ajax({
  type:'GET',
  url:'/ajax/file_logo.php',
  data : {
    "idfranquicia" : 2
  },
  success : function (data) {
    for (var i = 0; i < data.length; i++){
      var obj = data[i];
      var mockFile = { name: obj.base , upload: { uuid: obj.uuid } , size: 12345 };
      myDropzone3.options.addedfile.call(myDropzone3, mockFile);
      myDropzone3.files.push(mockFile);
      myDropzone3.options.thumbnail.call(myDropzone3, mockFile, "/img/logos-clientes/"+obj.base);
      currentFile = mockFile;
    }
  }
});
