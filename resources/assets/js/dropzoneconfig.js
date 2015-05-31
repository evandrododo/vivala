//fotoPerfil é versão camelCase do id do elemento (foto-perfil)
Dropzone.options.fotoPerfil = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, //MB
  acceptedFiles: "image/*",
  uploadMultiple: false,
  maxFiles: 1,
  dictDefaultMessage: "Coloque sua foto aqui",
  accept: function(file, done) {
    console.log("uploaded");
    done();
  },
  init: function() {
    this.on("addedfile", function() {
      if (this.files[1]!=null){
        this.removeFile(this.files[0]);
      }
    });
  }
};