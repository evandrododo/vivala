
/**
 * Funcao para disparar um ajax para loggar as informacoes
 * de uma interacao com a plataforma
 *
 * @param strTipo - string, tipo mapeado em config/logger.php
 * @param strDesc - string, descricao mapeada em config/logger.php
 * @param strUrl - (opcional) - url relacionada a interacao
 * @param strExtra - (opcional) - string/obj com qualquer informacao extra (persistido como JSON)
 *
 */
var logaAcao = function(strTipo, strDesc, strUrl="", strExtra="") {
    var data = {
        tipo : strTipo,
        descricao : strDesc,
        url : strUrl,
        extra : strExtra
    };

    $.ajax({
        url: '/logger/logaction',
        type: 'POST',
        data: data
    });
};

// Shorthand for $( document ).ready()
$(function() {

    /**
     * Binda o click dos elementos com .logger-ativo,
     * pegando as informacoes data-x e chamando o logaAcao
     */
    var checaInteracaoPlataforma = function() {
         $('.logger-ativo').on('click', function(event) {
             //pegando as informacoes data-x do elemento
             var data = $(this).data();

             //disparando ajax para salvar as informacoes
             logaAcao(data.tipo, data.desc, data.loggerurl, data.extra);
        });
    }(); //fazendo a funcao auto-executar
});


