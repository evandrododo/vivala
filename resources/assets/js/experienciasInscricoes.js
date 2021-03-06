/**
* Metodo para mostrar a sweetAlert de DELETE de InscricaoExperiencia
*/
var confirmaInscricaoExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma inscricao
    swal({
        title: "Atenção",
        html: "Essa Inscriçãoo será confirmada e emails serão disparados para o candidato e para a institição. <br> Tem certeza que deseja continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, confirmar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxConfirmaInscricaoExperiencia(target);
            }
    });
};

/**
* Metodo para disparar um Ajax de POST para confirmar uma InscricaoExperiencia
*/
var ajaxConfirmaInscricaoExperiencia = function (target) {

    var parentLinha = $(target).parents('.inscricao-experiencia-item');

    //sweetalert de loading :)
    swal({
        html : '<br><i class="fa fa-3x fa-pulse fa-spin fa-spinner laranja"></i> <br><br> <h4>Processando...</h4>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide'
    });

    //inserindo o token manualmente
    //@TODO inserir uma meta no header das versoes mobile logadas
    var params = {
        id_inscricao : parentLinha.data('id-inscricao'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/experiencias/confirmainscricao',
        type: 'POST',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoConfirmaInscricaoExperiencia();

            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroConfirmaInscricaoExperiencia();
        }
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertSucessoConfirmaInscricaoExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Inscrição confirmada! Recarregando...</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 900,
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertErroConfirmaInscricaoExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa!</h4> <br> <p> Ocorreu um erro e nao foi possivel confirmar a Inscrição!</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};

/**
* METODOS PARA DELETE
*/

/**
 * Metodo para mostrar a sweetAlert de DELETE de InscricaoExperiencia
 */
var confirmaCancelaInscricaoExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma inscricao
    swal({
        title: "Atenção",
        html: "Essa Inscrição será cancelada e emails serão disparados para o candidato e para a institição. <br> Tem certeza que deseja continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, cancelar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxCancelaInscricaoExperiencia(target);
            }
    });
};

/**
 * Metodo para mostrar a sweetAlert de CANCELAMENTO de InscricaoExperiencia p/ USER
 */
var confirmaUsuarioCancelaInscricaoExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma inscricao
    swal({
        title: "Atenção",
        html: "Sua inscrição será removida e nao conseguiremos avisar de novas ocorrencias da experiencia. Tem certeza que deseja continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, cancelar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxUsuarioCancelaInscricaoExperiencia(target);
            }
    });
};

/**
* Metodo para disparar um Ajax de POST para confirmar uma InscricaoExperiencia
*/
var ajaxUsuarioCancelaInscricaoExperiencia = function (target) {

    var target = $(target);

    //sweetalert de loading :)
    swal({
        html : '<br><i class="fa fa-3x fa-pulse fa-spin fa-spinner laranja"></i> <br><br> <h4>Processando</h4>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide'
    });

    //inserindo o token manualmente
    //@TODO inserir uma meta no header das versoes mobile logadas
    var params = {
        id_inscricao : target.data('id-inscricao'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/experiencias/cancelainscricao',
        type: 'POST',
        data: params,
        success: function (data, textStatus, jqXHR) {

            console.log(data);
            if (data.status =='pendente') {
                sweetAlertCancelamentoPendenteInscricaoExperiencia();
            }

            else if (data.status == 'cancelada') {
                //mostrando sweetAlert de sucesso (user-friendly)
                sweetAlertSucessoCancelaInscricaoExperiencia();
                location.reload(true);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroCancelaInscricaoExperiencia();
        }
    });
};
/**
* Metodo para disparar um Ajax de POST para confirmar uma InscricaoExperiencia
*/
var ajaxCancelaInscricaoExperiencia = function (target) {

    var parentLinha = $(target).parents('.inscricao-experiencia-item');

    //sweetalert de loading :)
    swal({
        html : '<br><i class="fa fa-3x fa-pulse fa-spin fa-spinner laranja"></i> <br><br> <h4>Processando</h4>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide'
    });

    //inserindo o token manualmente
    //@TODO inserir uma meta no header das versoes mobile logadas
    var params = {
        id_inscricao : parentLinha.data('id-inscricao'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/experiencias/cancelainscricao',
        type: 'POST',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoCancelaInscricaoExperiencia();

            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroCancelaInscricaoExperiencia();
        }
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertSucessoCancelaInscricaoExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Inscricao cancelada! Recarregando...</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 900,
    });
};

/**
* Funcao para mostrar uma sweetAlert de erro
*/
var sweetAlertErroCancelaInscricaoExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa..</h4> <br> <p> Ocorreu um erro e nao foi possivel cancelar a inscricao. !</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};

/**
* Funcao para mostrar uma sweetAlert de warning que a inscricao ja teve pagamento confirmado e portando o cancelamento passara por uma análise
*/
var sweetAlertCancelamentoPendenteInscricaoExperiencia = function() {
    swal({
        type: "warning",
        html: '<h4>Atenção!</h4> <br> <p> Como já confirmamos sua inscrição, o cancelamento passará por uma análise de reembolso. Após esse processo, você receberá um email notificando sobre o cancelamento de sua inscrição!</p><br>',
        confirmButtonColor: "#F9A325",
        showCancelButton: false
    },
    function (){
        location.reload();
    });
};



/**
 * Metodo para mostrar a sweetAlert de DELETE de InscricaoExperiencia c/ Pagamento Confirmado
 */
var confirmaCancelamentoInscricaoExperienciaComPagamentoConfirmado = function (ev) {
    ev.preventDefault();

    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma inscricao
    swal({
        title: "Atenção",
        html: "Essa Inscrição será cancelada e emails serão disparados para o candidato e para a institição. <br> Tem certeza que deseja continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, cancelar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxCancelaInscricaoConfirmadaExperiencia(target);
            }
    });
};

/**
* Metodo para disparar um Ajax de POST para confirmar uma InscricaoExperiencia
*/
var ajaxCancelaInscricaoConfirmadaExperiencia = function (target) {

    var parentLinha = $(target).parents('.inscricao-experiencia-item');

    //sweetalert de loading :)
    swal({
        html : '<br><i class="fa fa-3x fa-pulse fa-spin fa-spinner laranja"></i> <br><br> <h4>Processando</h4>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide'
    });

    //inserindo o token manualmente
    //@TODO inserir uma meta no header das versoes mobile logadas
    var params = {
        id: parentLinha.data('id-inscricao'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/experiencias/cancelainscricaoconfirmada',
        type: 'POST',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoCancelaInscricaoExperiencia();

            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroCancelaInscricaoExperiencia();
        }
    });
};
