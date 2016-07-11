//variavel para controlar o timeout
var tempoDigitando = null;

// Shorthand for $( document ).ready()
$(function() {
    bindaInputsFontAwesome();
    bindaMascaraValorExperiencia();
});

/**
 * Binda a mudanca do icone conforme o texto dos input's de informacao experiencia
 */
var bindaInputsFontAwesome = function() {
    $('.bind-icone-ativo').on('keyup', function(event) {
        //limpando timeout para apenas testar quando o usuario tiver terminado de digitar
        clearTimeout(tempoDigitando);

        //console.log('inside bindaIcone: event : ');
        //console.log(event);
        tempoDigitando = setTimeout(function() {
            testaClasseFontAwesome(event.target);
        }, 300);
    });
};

/**
* Funcao para testar se as classes do input sao classes do fontAwesome
*/
var testaClasseFontAwesome = function(target) {

    //console.log('inside testaRegex: target : ');
    //console.log(target);
    //guardando matches da regex procurando por 'fa fa-*'
    var isFontAwesome = fontAwesomeArray.indexOf($(target).val().trim());

    //se tiver encontrado algum indice com o valor do target é fontawesome
    if (isFontAwesome > -1) {

        //pegando novas classes para o icone
        var novasClasses = fontAwesomeArray[isFontAwesome];

        var icone = $(target).parents('.container-campos-fontawesome').find('i.icone-show');
        var classesIcone = icone.attr('class').replace(/fa\s*/g, '').replace(/fa-\w*-*\w*-*\w*/g, '');

        classesIcone += " fa-2x";

        //console.log('classes do icone: ' + classesIcone);
        //settando as novas classes do icone
        icone.attr('class', classesIcone + " " + novasClasses);
    }
}

/**
* Funcao para adicionar uma nova linha de InformacaoExperiencia
* no formulario de create/edit de experiencias
*/
var adicionaInfoExperiencia = function(ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos inserir antes (<li> que contem o botao add)
    var parentLinha = $(ev.target).parents('.container-campos-fontawesome');

    $(ev.target).toggleClass('soft-hide');
    parentLinha.find('i.loading-icon').toggleClass('soft-hide');

    $.ajax({
        url: '/experiencias/addinformacaoextra',
        type: 'GET',
        complete: function (jqXHR, textStatus) {
            parentLinha.find('i.loading-icon').toggleClass('soft-hide');
            $(ev.target).toggleClass('soft-hide');
            //console.log('ajax completed');
        },
        success: function (data, textStatus, jqXHR) {
            //console.log('ajax success');
            var novaLinha = $(data.html);

            //inserindo antes da linha do botao add
            novaLinha.insertBefore(parentLinha);

            //chamando funcao para bindar a mudanca de icone conforme o texto do botao
            bindaInputsFontAwesome();

        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log('ajax error');
        }
    });
};

/**
* Funcao para remover uma linha de InformacaoExperiencia
* no formulario de create/edit de experiencias.
*/
var removeInfoExperiencia = function(ev) {

    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var parentLinha = $(ev.target).parents('.container-campos-fontawesome');

    $(ev.target).toggleClass('soft-hide');
    parentLinha.find('i.loading-icon').toggleClass('soft-hide');

    var data = {
        id : parentLinha.data('id')
    };

    $.ajax({
        url: '/experiencias/deleteinformacaoextra',
        type: 'PUT',
        dataType: 'json',
        data: data,
        complete: function (jqXHR, textStatus) {
            $(ev.target).toggleClass('soft-hide');
            parentLinha.find('i.loading-icon').toggleClass('soft-hide');
        },
        success: function (data, textStatus, jqXHR) {
            //deixando vermelho e removendo o elemento
            parentLinha.addClass('bg-danger').fadeOut(400, function() {
                $(this).remove()
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });
};

/**
* Funcao para aplicar a mascara no campo VALOR do
* formulario de create/edit de experiencias.
*/
var bindaMascaraValorExperiencia = function(){
  $('#experiencia-valor').maskMoney({'prefix': 'R$'});
}