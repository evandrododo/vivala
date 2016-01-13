'use strict';

$.ajaxSetup({
    headers: { 
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
    }
});

var ajax;

// Trata evento de seleção da passagem de ida para alterar o passagem de volta
$('#data-id-rodoviario').datepicker().on('changeDate', function() {
    console.log($('#data-id-rodoviario').datepicker('getDate'));
    $('#data-volta-rodoviario').datepicker('setStartDate',$('#data-id-rodoviario').datepicker('getDate'));
});

// Procura Cidades que tem frota da clickbus
var ajaxPlace = function(query, target) {
    if (ajax != null && ajax.state() == 'pending') {
        ajax.abort();
    }

    var pos = [$(target).position().top + $(target).outerHeight(), $(target).position().left];

    // Mostra o icone de loading
    $(target).siblings('i.fa').show();
    ajax = $.ajax({
        url: 'clickbus/place',
        type: 'POST',
        dataType: 'html',
        data: {
            query: query
        },
    })
    .done(function(data) {
        // Remove as lista antiga de cidades
        $(target).siblings('.places-list').remove();
        // Cria o div da lista de cidades
        var element = document.createElement('div');
        $(element).addClass('list-group places-list')
            .attr('data-target', $(target).prop('id'))
            .css('top', pos[0])
            .css('left', pos[1])
            .html(data);

        // Adiciona a nova lista
        $(target).parent().append(element);
        
        // Esconde o loading
        $(target).siblings('i.fa').hide();


        bindAutocompleteRodoviario();
    });
};

// Lista as viagens (de ida ou volta)
var ajaxTrips = function(params) {
    var defaultParams = {
        from: '',
        to: '',
        departure: '',
        type: 'ida'
    };
    $.extend(defaultParams, params);

    // Mostra icone de loading
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-spinner'></i></h1>");
    
    $.ajax({
        url: 'clickbus/trips',
        type: 'POST',
        dataType: 'html',
        data: defaultParams,
    })
    .done(function(data) {
        $('#clickbus-resultado-busca').html(data);
        bindClickDetail();
    })
    .fail(function() {
        $('#clickbus-resultado-busca').html('Ops, algo saiu errado, faça a busca novamente');
    });
    
};

// Envia viagem de ida e volta
// e lista as poltronas
var ajaxTrip = function(viagens) {

    // Pega o valor das cidades escolhidas para exibir na escolha de poltrona
    var from      = $('#origem-rodoviario').val(),
        to        = $('#destino-rodoviario').val();

    // Mostra icone de loading
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-spinner'></i></h1>");
    console.log(viagens);

    $.ajax({
        url: 'clickbus/trip',
        type: 'POST',
        dataType: 'html',
         data: {
            schedule: viagens,
            from: from,
            to: to
        }
    })
    .done(function(data) {
        $('#clickbus-resultado-busca').html(data);
        $('input#session-clickbus').val($('#clickbus-resultado-busca').find('input#volta-session-id').val());
        bindaPoltronas();
    })
    .fail(function() {
        $('#clickbus-resultado-busca').html('Ops, algo saiu errado.');
    });
    
};

var ajaxPoltronas = function(request, callback) {
    var params = {
        "from": "",
        "to": "",
        "seat": "",
        "name": "",
        "document": "",
        "documentType": "",
        "birthday": "",
        "email": "",
        "id": "",
        "date": "",
        "time": "",
        "timezone": "America/Sao_Paulo",
        "sessionId": ""
    };

    $.extend(params, request);

    $.ajax({
        type: 'post',
        url: '/clickbus/selecionarpoltronas',    
        data: {
            params: {
                "meta": {},
                "request": {
                    "from": params.from,
                    "to": params.to,
                    "seat": params.seat,
                    "passenger": {
                        "name": params.name,
                        "document": params.document,
                        "documentType": params.documentType, /*[rg|cpf|passaporte]*/
                        "gender": params.gender,              /*[M|F]*/
                        "birthday": params.birthday,
                        "email": params.email
                    },
                    "schedule": {
                        "id": params.id,
                        "date": params.date,
                        "time": params.time,
                        "timezone": params.timezone
                    },
                    "sessionId": params.sessionId
                }
            }
        },
        success: function (data) {
           callback(data);
        },
        error: function (data) {
            console.log('erro do ajax poltronas');
            console.log(data);
/*            console.log(data.responseObject);
            //Aqui mostro o sweetAlert com as mensagens retornadas da
            //validação 
            //TODO formatar texto corretamente

            var responseObject = data.responseJSON,
                responseText = "";

                //Iterando sob o objeto de resposta para montar a mensagem de erro 
                for (var i in responseObject)
                    {
                        responseText += "<p>" + responseObject[i] + "</p>";
                    }

                    //removendo o .n  da mensagem de erro
                    responseText = responseText.replace(/.\d /g," ");

                    swal({
                        title: 'Ocorreu um erro', 
                        text: responseText, 
                        type: 'error',
                        html: true
                    });

                    //Se tiver loading e tiver dado erro, voltar botao
                    if (loading && loading != "") {
                        $('#form-poltronas-clickbus').find('input:submit').show();
                        $('#form-poltronas-clickbus').find('#'+loading).hide();
                    }

                    */
        },
        complete: function(data, status) {
            $('form.validacao-poltrona').find('button:submit').removeAttr('disabled');
            $('form.validacao-poltrona button:submit i').hide();

        }
    });


};

var removePoltrona = function(request, tipo, callback) {
    var params = {
        "seat": "",
        "id": $("input#"+tipo+"-id").val(),
        "sessionId": $("input#"+tipo+"-session-id").val()
    }
    
    $.extend(params, request);

    // Loading no x da poltrona
    var icone_remover = $("#poltrona-"+request.seat+"-"+tipo+" i.exclui-poltrona");
    icone_remover.removeClass("fa-close").addClass("fa-spinner fa-spin");

    $.ajax({
        url: 'clickbus/removerpoltronas',
        type: 'post',
        dataType: 'json',
        data: {
            params: {
                "meta": {},
                "request": {
                    "seat": params.seat,
                    "schedule": {
                        "id": params.id
                    },
                    "sessionId": params.sessionId
                }
            }
        }
    })
    .done(function(data) {
        callback(data, params.seat, tipo);
    });
};

var tripPayment = function(request, frm) {
    var params = {
        "store": "Vivala",
        "model": "Retail",
        "platform": "API"
    };

    //pegando objeto pelo form
    var frmObj = {};
    $.each(frm.serializeArray(), function() {
        if (frmObj[this.name] !== undefined) {
            if (!frmObj[this.name].push) {
                frmObj[this.name] = [frmObj[this.name]];
            }
            frmObj[this.name].push(this.value || '');
        } else {
            frmObj[this.name] = this.value || '';
        }
    });

    console.log(frmObj);
    $.extend(params, request);


    console.log("========== Trip Payment Request Ajax params");
    console.log(params);
    console.log("========== Trip Payment Request Ajax request");
    console.log(request);

    
    $.ajax({
        url: 'clickbus/payment',
        type: 'POST',
        dataType: 'html',
        data: {
            params: {
                "frm" : frmObj,
                "meta": {
                    "store": params.store,
                    "model": params.model,
                    "platform": params.platform
                },
            },
            "contents": params.contents
        }
    })
    .error(function(data) {

    })
    .done(function(data) {
        $('#clickbus-resultado-busca').html(data);
        console.log(data);
        bindaAbas();
        bindaBandeirasCartao();
        bindaChangePagamento();
        bindaFormPagamento();
    });
    
};

var tripBooking = function(request) {

    var params = {
        "meta": {
            "store": "Vivala",
            "model": "Retail",
            "platform": "API",
            "api_key": "$2y$05$32207918184a424e2c8ccujmuryCN3y0j28kj0io2anhvd50ryln6"
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
            "orderItems": [
            ]
        }
    };

    $.extend(params, request);

    $.ajax({
        url: 'clickbus/booking',
        type: 'POST',
        dataType: 'html',
        data: {
            params: params
        }
    })
    .error(function(data) {
        var json = JSON.parse(data);
        swal({   
            title: "Ops",
            html: "Ocorreu um problema com a sua compra:<br>"+data.errors,
            type: "error",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            },
            function() {   
                console.log('clicou botao swal error data:');
                console.log(data);
            });
    })
    .done(function(data) {
        console.log("voltou do backend : ");
        console.log(data);

        var json = JSON.parse(data);

        //se tiver dado erro
        if (!json.success) {
            swal({   
                title: "Ops",
                html: "Ocorreu um problema com a sua compra:<br><br>"+json.errors,
                type: "error",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "ok",
                closeOnConfirm: true,
            },
            function() {   
                console.log('clicou botao swal error data:');
                console.log(data);
            });

        //Se estiver tudo ok..
        } else {

            if (json.forma_pagamento == 'payment.creditcard') {

                var htmlMsg = 'Compra realizada com sucesso. Sua viagem de <h4>'+ json.ida_departure + '</h4> a <h4>'+json.ida_arrival+'</h4><br> está garantida. Em caso de dúvidas entre em contato pelo email <a href="mailto:sac@vivalabrasil.com.br">sac@vivalabrasil.com.br</a>';

                swal({ 
                    title: "Sucesso",
                    html: htmlMsg,
                    type: "success",
                    confirmButtonColor: "#14CC5B",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                }, 
                function() {
                    window.location.href="/viajar";
                }
                    );

            //Se nao for creditcard, entao possui um redirectUrl
            } else {
 
                setTimeout(function() {
                    window.open(json.redirectUrl,'_blank'); 
                }, 2200);

                //Caso a forma de pagamento requira redirecionamento
                var htmlMsg = 'Confirmacao de dados realizada com sucesso.<br>Sua viagem de <h4>'+ json.ida_departure + '</h4> a <h4>'+json.ida_arrival+'</h4><br>Iremos redireciona-lo para finalizar sua compra, se isso nao acontecer clique em <a href="'+json.redirectUrl+'" target="_blank">Redirecionar</a>';

                swal({ 
                    title: "Sucesso",
                    html: htmlMsg,
                    type: "success",
                    confirmButtonColor: "#14CC5B",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                }, 
                function() {
                    window.location.href="/viajar";
                }
                     );
            } 
        }

    });
}
