var minImageWidth = 500,
    minImageHeight = 405;
var dropzoneOptions2 = {
  clickable: '#btn-banner',
  url: "/ajax/file_banner.php",
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
    dictRemoveFileConfirmation:  "Deseas eliminar esta imagen?",
  //accept: function(file, done) {
  //  file.acceptDimensions = done;
  //  file.rejectDimensions = function() { done("Image too small."); };
  //},
  previewTemplate: document.getElementById('template-preview').innerHTML,
  addRemoveLinks: true,
  init: function() {
    this.on("totaluploadprogress", function(progress) {

      console.log($(this));

      var last = $(this).get(0).element.lastChild;
      $(last).find(".img-thumbnail")
          .attr("src","/img/loader5.gif")
          //.width(50);
          console.log($(last).find(".img-thumbnail")
          .attr("src"));
      console.log(progress);


    });

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
        url:'/ajax/file_banner.php',
        data : {
          "uuid" : file.upload.uuid
        },
        success : function (data) {

        }
      });

    });
    this.on('sending', function(file, xhr, formData){
      console.log($(this));
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
      this.emit('thumbnail', file, "/img/banners/" + serverResponse.filename);

      // If it needs resizing:
      this.createThumbnailFromUrl(file,  "/img/banners/" + serverResponse.filename);
    });
  }

};
var myDropzone2 = new Dropzone("div#zona2", dropzoneOptions2 );


// initialize dropzone
Dropzone.autoDiscover = false;


//preload gallery
$.ajax({
  type:'GET',
  url:'/ajax/file_banner.php',
  data : {
    "idfranquicia" : 2
  },
  success : function (data) {
    for (var i = 0; i < data.length; i++){
      var obj = data[i];
      var mockFile = { name: obj.base , upload: { uuid: obj.uuid } , size: 12345 };
      myDropzone2.options.addedfile.call(myDropzone2, mockFile);
      myDropzone2.files.push(mockFile);
      myDropzone2.options.thumbnail.call(myDropzone2, mockFile, "/img/banners/"+obj.base);
    }
  }
});
