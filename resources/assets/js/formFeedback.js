/*
* Formulário de Feedback da Plataforma
* ../paginas/contato#
*/

$(function() {
    //token do laravel para ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    // Funcões para Upload
    $('#form-feedback').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this),
            dataForm = new FormData(this),
            callbackFunction = frm.data('callback'),
            redirect = frm.data('redirect'),
            loading = frm.data('loading');

        if (loading && loading != "") {
            $('input:submit').hide();
            $('#'+loading).show();
        }

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: dataForm,
            contentType: false, //file
            processData: false,  //file
            success: function (data) {
                // Executa uma função de javascript
                if(callbackFunction) {
                   swal({
                     title: lingua[3],
                     imageUrl: 'https://vivala.com.br/img/icones/svg/vivala-icon-mensagem-enviada.svg',
                     imageWidth: 58,
                     imageHeight: 53,
                     html: "<p>"+lingua[4]+"</p><p>"+lingua[5]+"</p>",
                     showCancelButton: false,
                     confirmButtonColor: corLaranjaPrimario
                   });
                   document.getElementById("form-feedback").reset();
                   $('#modal-feedback').modal('hide');
                }
                // Redireciona para outra pagina
                if(redirect) {
                    window.location = redirect;
                }
            },
            complete: function (data) {
                //Se tiver loading e tiver dado erro, voltar botao
                if (loading && loading != "") {
                    $('input:submit').show();
                    $('#'+loading).hide();
                }
            }
        });

    });

});
