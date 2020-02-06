(function () {
  new FroalaEditor("#fro", {
    enter: FroalaEditor.ENTER_P,
    imagePaste : 'True',
    imageResizeWithPercent: true,
    imageManagerLoadURL: "/image/floaraGet",
    imageManagerLoadMethod: "GET",
    imageManagerDeleteURL: "/image/floaraDelete",
    imageUploadURL: '/image/floara',
    imageUploadParams: {
    id: 'myeditor'
  },
  'imageManager.imagesLoaded': function (data) {
    // Do something when the request finishes with success.
    alert ('Images have been loaded.');
  },
  'imageManager.imageLoaded': function ($img) {
    // Do something when an image is loaded in the image manager
    alert ('Image has been loaded.');

  },
  'imageManager.beforeDeleteImage': function ($img) {
    // Do something before deleting an image from the image manager.
    alert ('Image will be deleted.');
  },
  'imageManager.imageDeleted': function (data) {
    // Do something after the image was deleted from the image manager.
    alert ('Image has been deleted.');
  }
  })
})()
