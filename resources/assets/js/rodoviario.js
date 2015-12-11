'use strict';

jQuery(document).ready(function($) {
    var ajax;

    $('#rodoviario-filtros #origem-rodoviario').on('keydown focus', function() {
        if ($(this).val().length >= 2) {
            // vale a pena fazer o timeout aqui? (copiado do viajar.js)
            // autocompleteTimeout = setTimeout(autocompleteFlights, 500, value, '#origem-voo', container, lista); 
            ajaxPlace($(this).val(), this);
        }
    });
    $('#rodoviario-filtros #destino-rodoviario').on('keydown focus', function() {
        if ($(this).val().length >= 2) {
            ajaxPlace($(this).val(), this);
        }
    });

    $('#rodoviario-filtros #origem-rodoviario, #rodoviario-filtros #destino-rodoviario')
        .on('blur', function() {
            setTimeout(function() {
                $('.places-list').remove();
            }, 100);
    });

    $('#buscar-rodoviario .btn').on('click', function(e) {
        e.preventDefault();

        var from      = $('#origem-rodoviario-hidden').val(),
            to        = $('#destino-rodoviario-hidden').val(),
            departure = $('#data-id-rodoviario').val(),
            type      = 'ida';

        $('#clickbus-resultado-busca').html("<h1 style='text-align-center'><i class='fa fa-spin fa-spinner'></i></h1>");

        ajaxTrips({
            from: from,
            to: to,
            departure: departure,
            type: type
        })
    });
});

// Binda o clique do resultado de autocomplete (quando escolhe a cidade)
var bindAutocompleteRodoviario = function() {
    $('.places-list a').on('click', function(e) {
        e.preventDefault();

        // Pega o id do campo que vai ser modificado, origem ou destino
        var target = $(this).parent('.places-list').attr('data-target');

        // Muda o valor do input para a string do resultado (friendly)
        $('#'+target).val($(this).find('span').text());
        // Muda o valor do input hidden para a string da busca (non-friendly)
        $('#'+target+'-hidden').val( $(this).attr('data-value'));

        // Remove os resultados
        $('.places-list').remove();
    });
};

var bindClickDetail = function() {
    $('.search-by-date').on('click', function(e) {
        e.preventDefault();

        var from      = $('#destino-rodoviario-hidden').val(),
            to        = $('#origem-rodoviario-hidden').val(),
            departure = $(this).attr('data-date'),
            type      = $(this).attr('data-type');

        ajaxTrips({
            from: from,
            to: to,
            departure: departure,
            type: type
        });
    });

    $('.btn-choose-ida').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id'),
            horario_ida = $(this).attr('data-horario'),
            diames_ida = $('#data-id-rodoviario').val(),
            horario_chegada_ida = $(this).attr('data-horario-chegada'),
            classe_ida = $(this).attr('data-classe'),
            from_ida  = $(this).attr('data-from'),
            to_ida = $(this).attr('data-to')
            
            from      = $('#destino-rodoviario-hidden').val(),
            to        = $('#origem-rodoviario-hidden').val();

        $('#departure-schedule-id').val(id);
        $('#horario-ida').val(horario_ida);
        $('#horario-chegada-ida').val(horario_chegada_ida);
        $('#classe-ida').val(classe_ida);
        $('#from-ida').val(from_ida);
        $('#to-ida').val(to_ida);

        if ($('#data-volta-rodoviario').val().length <= 0) {
            ajaxTrip(JSON.stringify([{ 'id':id, 'horario':horario_ida ,'diames':diames_ida, 'from':from_ida, 'to':to_ida, 'horario_chegada': horario_chegada_ida, 'classe': classe_ida }]));
        } else {
            var departure = $('#data-volta-rodoviario').val(),
                type      = 'volta';

            ajaxTrips({
                from: from,
                to: to,
                departure: departure,
                type: type
            });
        }
    });

    $('.btn-choose-volta').on('click', function(e) {
        e.preventDefault();

        var id_ida = $('#departure-schedule-id').val(),
            horario_ida = $('#horario-ida').val(),
            diames_ida = $('#data-id-rodoviario').val(),
            horario_chegada_ida = $('#horario-chegada-ida').val(),
            classe_ida = $('#classe-ida').val(),
            from_ida  = $('#from-ida').val(),
            to_ida = $('#to-ida').val(),

            from      = $('#destino-rodoviario-hidden').val(),
            to        = $('#origem-rodoviario-hidden').val(),

            id_volta = $(this).attr('data-id'),
            horario_volta = $(this).attr('data-horario'),
            diames_volta = $('#data-volta-rodoviario').val(),
            horario_chegada_volta = $(this).attr('data-horario-chegada'),
            classe_volta = $(this).attr('data-classe'),
            from_volta  = $(this).attr('data-from'),
            to_volta = $(this).attr('data-to');

            var json_resposta = JSON.stringify([{ 'id':id_ida, 'horario':horario_ida, 'diames':diames_ida, 'from':from_ida, 'to':to_ida , 'horario_chegada': horario_chegada_ida, 'classe': classe_ida }, { 'id':id_volta, 'horario':horario_volta, 'diames':diames_volta , 'from':from_volta, 'to':to_volta , 'horario_chegada': horario_chegada_volta, 'classe': classe_volta }]);
            console.log(json_resposta);
        ajaxTrip(json_resposta);
    });


};

var bindaPoltronas = function(){

    // Binda o clique das poltronas para seleção
    $(".poltrona input").click(function(){

        // Pega o elemento da poltrona
        var poltrona = $(this).parents('.poltrona'),
            // Pega somente o valor numerico. Ex.: '12-ida' -> '12'
            numero_poltrona = poltrona.find('input').val().split('-')[0];

        // Testa se é ida ou volta
        var container = poltrona.parents('.container-onibus');
        var tipo_viagem = 'ida';

        if(container.hasClass('volta')){
            tipo_viagem = 'volta';
        }
        
        // Testa se a poltrona já está selecionada
        if(poltrona.hasClass('selecionada'))
        {
            // Unselect na poltrona
            $('#poltrona-'+numero_poltrona+'-'+tipo_viagem).remove(); 

            // Muda a cor da poltrona
            poltrona.removeClass('selecionada');
        }else{

            $("#modal-poltrona-"+tipo_viagem+" .num-poltrona").html(numero_poltrona);
            $("#modal-poltrona-"+tipo_viagem+" #seat").val(numero_poltrona);
            $("#modal-poltrona-"+tipo_viagem).modal();
        }


    });

    // Binda o submit do modal das poltronas para validacao de disponibilidade
    $('form.validacao-poltrona').submit(function(e){
        e.preventDefault();
        
        var frm = $(this),
            loading = frm.data('loading');

        if (loading && loading != "") {
            $(this).find('button:submit').attr('disabled','disabled');
            $(this).find('#'+loading).show();
        }

        
        var params = {
            "tipo": $(this).find('input#tipo').val(), 
            "from": $(this).find('input#from').val(), 
            "to":  $(this).find('input#to').val(),
            "seat":$(this).find('input#seat').val(),
            "name": $(this).find('input#name').val(),
            "documentType": $(this).find('select#document-type option:selected').val(),
            "document": $(this).find('input#document').val(),
            "birthday": $(this).find('input#birthday').val(),
            "email": $(this).find('input#email').val(),
            "id": $(this).find('input#trip-id').val(),
            "date": $(this).find('input#date').val(),
            "time": $(this).find('input#time').val(),
            "timezone": "America/Sao_Paulo",
            "sessionId": $(this).find('input#session-id').val(),
        } ;


        // Envia ajax de validaçao, caso seja bem sucedido marca como
         // selecionada a poltrona
        ajaxPoltronas(params);

    });


    // Binda o submit do form de todas as poltronas
    $('#form-poltronas-clickbus').submit(function (ev) {
        ev.preventDefault();
        
        var params = {
            "store": "clickbus",
            "model": "retail",
            "platform": "web",
            "contents": []
        };

        var frm = $(this),
            loading = frm.data('loading');
        
        if (loading && loading != "") {
            $(this).find('input:submit').attr('disabled','disabled');
            $(this).find('#'+loading).show();
        }


        console.log("Submit das poltronas para a tela de pagamento");

        tripPayment(params, frm);

    });
};

// Mostra a poltronacomo selecionada e adicona no 
// formulario de sumissao de compra
var adicionaPoltronaFront = function(poltrona, tipo_viagem, viajante){
    var numero_poltrona = poltrona.seat;
    var poltrona_elemento = $("input#"+numero_poltrona+"-"+tipo_viagem).parents('.poltrona');

    var seatReservation = poltrona.schedule.id;

    // marca o elemento da poltrona como selecionado (laranja)
    poltrona_elemento.addClass('selecionada');

    // Adiciona o html da poltrona no formulario de compra
    // CUIDADO: HTML DIRETO NO JS
    var html = ' <div class="row poltrona-container" id="poltrona-'+numero_poltrona+'-'+tipo_viagem+'"> <div class="col-sm-12 margin-b-1"> <div class="poltrona-externa selecionada">'+numero_poltrona+'</div> <div class="pull-right"><i class="fa fa-close exclui-poltrona" onclick="removePoltrona({\'seat\':'+numero_poltrona+'},\''+tipo_viagem+'\')"></i></div> <input type="hidden" name="'+tipo_viagem+'-numero_poltrona" value="'+numero_poltrona+'"> </div> <div class="col-sm-12"> <label for="nome">Nome:</label> </div> <div class="col-sm-12"> <span>'+viajante.name+'</span> </div> <div class="col-sm-12"> <label for="doc">Documento:</label> </div> <div class="col-sm-4"> '+viajante.documentType.toUpperCase()+'</div> <div class="col-sm-8"> '+viajante.document+'</div> <input type="hidden" name="'+tipo_viagem+'-email" value="'+viajante.email+'"> <input type="hidden" name="'+tipo_viagem+'-birthday" value="'+viajante.birthday+'">  <input type="hidden" name="'+tipo_viagem+'-documento" value="'+viajante.document+'"> <input name="'+tipo_viagem+'-documentType" type="hidden" value="'+viajante.documentType.toUpperCase()+'"> <input name="'+tipo_viagem+'-nome" type="hidden" value="'+viajante.name+'">  </div> ';

    $('.poltronas-selecionadas-'+tipo_viagem).append(html);

    // Fecha a modal
    $('#modal-poltrona-'+tipo_viagem).modal('hide');
};

var bindaAbas = function() {
    $('#abas-pagamento a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if($(e.target).hasClass('tipo-cliente')){
            $("#tipo-cliente").val($(e.target).attr('aria-controls'));
        }else if($(e.target).hasClass('forma-pagamento')){
            $("#forma-pagamento").val($(e.target).attr('aria-controls'));
        }
        // Remove os required do que foi deselecionado
        $($(e.target).attr("href")).parent(".tab-content").find(".required").prop("required",false);
        // Adiciona required no que ta selecionado
        $($(e.target).attr("href")).find(".required").prop("required",true);
    })
};

//Funcao para bindar quando o usuario selecionar a bandeira do creditcard,
//esconde todos os selects e mostra o atual;
//@TODO: bindar selects com update de precos?
var bindaBandeirasCartao = function() {
    $('input.seleciona-bandeira').change(function(evt) {
       evt.preventDefault();
       $('.select-parcelas').hide();
       $('#bandeira-'+$(this).val()).show();
    });
};
var bindaChangePagamento = function() {
    $('input.seleciona-bandeira[name="bandeira-cartao"]').change(function(){
        atualizaValorParcelas();
    });
    $('.select-parcelas').change(atualizaValorParcelas);
};

var atualizaValorParcelas = function(){
    var bandeira = $('input.seleciona-bandeira[name="bandeira-cartao"]:checked').val(),
        opcao_selecionada = $( "select#bandeira-"+bandeira+" option:selected"),
        qtd_parcelas = opcao_selecionada.val(),
        total_with_discount = opcao_selecionada.data('total_with_discount'),
        total = opcao_selecionada.data('total'),
        installment = opcao_selecionada.data('installment'),
        discount_value = opcao_selecionada.data('discount_value'),
        fee = opcao_selecionada.data('fee');


    if(discount_value > 0){
        $('.row-desconto').show();
        $('.valor-desconto').html(discount_value.toFixed(2).toString().replace(',','').replace('.',','));
    }else{
        $('.row-desconto').hide();
    }

    $('.num-vezes').html(qtd_parcelas);
    $('.valor-fee').html(fee.toFixed(2).toString().replace(',','').replace('.',','));
    $('.valor-installment').html(installment.toFixed(2).toString().replace(',','').replace('.',','));

    $('#valor-total-pagamento-passagem').val(total_with_discount);
};

var bindaFormPagamento = function() {
    
    // Binda o submit da compra
    $('#form-pagamento').submit(function (ev) {
        ev.preventDefault();
        
        console.log("Submit do pagamento");
        
        console.log(this);
        console.log($(this));
        
        var numero_poltronas = $('input#quantidade-poltronas').val(),
            orderItems = [];
    
                
        for (var i = 0; i < numero_poltronas; i++) {
           var  seatReservation = $('#form-pagamento').find('input[name="passagens['+i+'][\'seatReservation\']"]').val();
            var passenger = {
               "firstName" : $('#form-pagamento').find('input[name="passagens['+i+'][\'firstName\']"]').val(),
               "lastName" : $('#form-pagamento').find('input[name="passagens['+i+'][\'lastName\']"]').val(),
               "email" : $('#form-pagamento').find('input[name="passagens['+i+'][\'email\']"]').val(),
               "document" : $('#form-pagamento').find('input[name="passagens['+i+'][\'document\']"]').val(),
               "gender" : "M",
               "birthday" : $('#form-pagamento').find('input[name="passagens['+i+'][\'birthday\']"]').val(),
               "seat" : $('#form-pagamento').find('input[name="passagens['+i+'][\'seat\']"]').val(),
               "meta" : {}
            };
           
            orderItems.push({
                "seatReservation" : seatReservation,
                "passenger" : passenger
            })
        }

        console.log('orderItens');
        console.log(orderItems);

        var params = {
             "meta": {
                "model": "retail",
                "store": "clickbus",
                "platform": "web"
            },
             "request": {
                "sessionId": "",
                "ip": "",
                "buyer": {
                    "locale": "pt_BR",
                    "gender": "M",
                    "meta": {},
                    "payment": {
                     }
                 },
                "orderItems": orderItems
             }
        };

        var frm = $(this),
            loading = frm.data('loading');
        
        if (loading && loading != "") {
            $(this).find('input:submit').attr('disabled','disabled');
            $(this).find('#'+loading).show();
        }

        tripBooking(params);

    });
};
