"use strict";

// Pegando a lingua ativa na view no momento
var linguaAtiva = $("meta[name=language]").attr("content");
var lingua = [];
switch(linguaAtiva){
  case 'en':
    lingua[0] = 'Trip estimate send with success!',
    lingua[1] = 'Our team will do everything to find the trip that fits more with you!',
    lingua[2] = 'A reply email about your trip is coming soon, stay tuned to your mailbox.',
    lingua[3] = 'It wasn\'t possible to estimate your trip',
    lingua[4] = 'An error occurred in our system and your trip estimate can\'t be send!',
    lingua[5] = 'We apologize for the inconvenience and ask you to try again later.'
  break;
  case 'pt':
    lingua[0] = 'Cotação enviada com sucesso!',
    lingua[1] = 'Nosso time fará de tudo para encontrar a viagem que mais se encaixa com você!',
    lingua[2] = 'Um email de resposta sobre sua viagem chegará em breve, fique atento à sua caixa de email.',
    lingua[3] = 'Não foi possível realizar a sua cotação',
    lingua[4] = 'Um erro ocorreu em nosso sistema e sua cotação não pode ser enviada!',
    lingua[5] = 'Pedimos desculpas pelo transtorno e pedimos que tente novamente mais tarde.'
  break;
  default:
    lingua[0] = 'Cotação enviada com sucesso!',
    lingua[1] = 'Nosso time fará de tudo para encontrar a viagem que mais se encaixa com você!',
    lingua[2] = 'Um email de resposta sobre sua viagem chegará em breve, fique atento à sua caixa de email.',
    lingua[3] = 'Não foi possível realizar a sua cotação',
    lingua[4] = 'Um erro ocorreu em nosso sistema e sua cotação não pode ser enviada!',
    lingua[5] = 'Pedimos desculpas pelo transtorno e pedimos que tente novamente mais tarde.'
}

// Ativa os forms que se encontram abaixo das opções principais
var ativaForm = function(container, val){
  if(val < 1){
    $(container).addClass('hidden');
  }
  else if(val >= 1){
    $(container).removeClass('hidden');
  }
}

// Previne o usuário de escolher a data da volta em dias anteriores a data da ida
var mudaDataIdaVolta = function(containerIda, containerVolta){
  $(containerIda).datepicker().on('changeDate', function() {
      $(containerVolta).datepicker('setStartDate', $(containerIda).datepicker('getDate') );
  });
}

// Colore dias anteriores do datepicker na abertura do mesmo
var coloreDatePickerDiasPassados = function(container){
  $(container).datepicker().on('focus', function(){
      $('.datepicker table tr td.disabled').addClass('datepicker-dia-anterior');
  });
}

var bindaFormCotaViagem = function() {
  /* FORM BÁSICO */
  // Icones Superiores
  var ativaFormVoos = $('#ativa-form-voos'),
      ativaFormOnibus = $('#ativa-form-onibus'),
      ativaFormHospedagem = $('#ativa-form-hospedagem'),
      ativaFormCarros = $('#ativa-form-carros'),
      formBasico = $('#cotacao-basica'),
      formBasicoValue =  $(formBasico).attr("data-value"),
      formHospedagem = $('#cotacao-hotel'),
      formHospedagemValue = $(formHospedagem).attr("data-value"),
      formCarros = $('#cotacao-veiculos'),
      formCarrosValue = $(formHospedagem).attr("data-value");
      formBtnEnviar = $('#cotacao-enviar');

    $(ativaFormVoos).bind('click', function() {
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        formBasicoValue++;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-voos').val(1);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-voos').val(0);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
    });
    $(ativaFormOnibus).bind('click', function() {
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        formBasicoValue++;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-onibus').val(1);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-onibus').val(0);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
    });
    $(ativaFormHospedagem).bind('click', function() {
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        formBasicoValue++;
        formHospedagemValue++;
        $(formBasico).attr("data-value", formBasicoValue);
        $(formHospedagem).attr("data-value", formHospedagemValue);
        $('input#cotacao-hospedagem').val(1);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
        ativaForm(formHospedagem, formHospedagemValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        formHospedagemValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $(formHospedagem).attr("data-value", formHospedagemValue);
        $('input#cotacao-hospedagem').val(0);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
        ativaForm(formHospedagem, formHospedagemValue);
      }
    });
    $(ativaFormCarros).bind('click', function(){
      var tooltipFormCarros = new Tooltip({
        target: ativaFormCarros,
        content: "TESTE",
        classes: 'tooltip-theme-arrows',
        position: 'right middle'
      });
    });

  var basicoDataIda1 = $('#basico-data-ida-1'),
      basicoDataVolta1 = $('#basico-data-volta-1');
      //aplicando mascara nos campos de date para funcionar melhor com o calendário
      coloreDatePickerDiasPassados(basicoDataIda1);
      coloreDatePickerDiasPassados(basicoDataVolta1);
      mudaDataIdaVolta(basicoDataIda1, basicoDataVolta1);

  // Hospedagem-x
  var dataHospdagem1 = $('#mais-hospedagem-1'),
      datasMaisHospedagem1 = $('#basico-mais-hospedagem-1');
    $(dataHospdagem1).click(function() {
        if(this.checked){
          $(datasMaisHospedagem1).val(1);
          ativaFormHospedagem.click();
        }
        else if(!this.checked){
          $(datasMaisHospedagem1).val(0);
          ativaFormHospedagem.click();
        }
    });

  // Mais Destinos
  var ativaMaisDestinos = $('#ativa-mais-destinos');

    $(ativaMaisDestinos).bind('click', function(){
    });

  // Datas Flexíveis
  var dataFlexivel = $('#data-flexivel'),
      datasFlexiveis = $('#datas-flexiveis');
    $(dataFlexivel).click(function() {
        if (this.checked) $(datasFlexiveis).val(1);
        else if(!this.checked) $(datasFlexiveis).val(0);
    });

  // Quantidade Viajantes - Adultos e Crianças
  var qtdAdultos = $('#qtd-adultos'),
      qtdCriancas = $('#qtd-criancas'),
      nroAdultos = $('input#nro-adultos'),
      nroCriancas = $('input#nro-criancas');

        $(qtdAdultos).change(function(){
          $(nroAdultos).val(this.value);
        });
        $(qtdCriancas).change(function(){
          $(nroCriancas).val(this.value);
        });

  // Icones de Tempo
  var ativaTempoManha = $('#ativa-tempo-manha'),
      ativaTempoTarde = $('#ativa-tempo-tarde'),
      ativaTempoNoite = $('#ativa-tempo-noite'),
      ativaTempoMadrugada = $('#ativa-tempo-madrugada');

    $(ativaTempoManha).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-tempo-manha').val(1);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-tempo-manha').val(0);
      }
    });
    $(ativaTempoTarde).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-tempo-tarde').val(1);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-tempo-tarde').val(0);
      }
    });
    $(ativaTempoNoite).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-tempo-noite').val(1);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-tempo-noite').val(0);
      }
    });
    $(ativaTempoMadrugada).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-tempo-madrugada').val(1);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-tempo-madrugada').val(0);
      }
    });

  // Horarios Restritos
  var ativaHorarioRestrito = $('#ativa-horario-restrito'),
      campoHorarioRestrito = $('#campo-horario-restrito');

    $(ativaHorarioRestrito).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(campoHorarioRestrito).removeClass('hidden');
      }
      else{
        $(this).removeClass('active');
        $(campoHorarioRestrito).addClass('hidden');
        $(campoHorarioRestrito).val('');
      }
    });

  /* FORM HOSPEDAGEM */
  // Quantidade de Quartos
  var hospQtdQuartos = $('#qtd-quartos-hotel'),
      hospNroQuartos = $('input#nro-quartos-hotel');

      $(hospQtdQuartos).change(function(){
        $(hospNroQuartos).val(this.value);
      });

  // Adicionais do Hotel
  var AdcCafe = $('#adicional-cafe'), hospAdcCafe = $('input#hospedagem-adicional-cafe'),
      AdcWifi = $('#adicional-wifi'), hospAdcWifi = $('input#hospedagem-adicional-wifi'),
      AdcArCondicionado = $('#adicional-ar-condicionado'), hospAdcArCondicionado = $('input#hospedagem-adicional-ar-condicionado'),
      AdcTvCabo = $('#adicional-tv-cabo'), hospAdcTvCabo = $('input#hospedagem-adicional-tv-cabo'),
      AdcCancelamento = $('#adicional-cancelamento'), hospAdcCancelamento = $('input#hospedagem-adicional-cancelamento'),
      AdcAnimal = $('#adicional-animal'), hospAdcAnimal = $('input#hospedagem-adicional-animal'),
      AdcAcademia = $('#adicional-academia'), hospAdcAcademia = $('input#hospedagem-adicional-academia'),
      AdcPiscina = $('#adicional-piscina'), hospAdcPiscina = $('input#hospedagem-adicional-piscina'),
      AdcEstacionamento = $('#adicional-estacionamento'), hospAdcEstacionamento = $('input#hospedagem-adicional-estacionamento'),
      AdcBanheiroPrivativo = $('#adicional-banheiro-privativo'), hospAdcBanheiroPrivativo = $('input#hospedagem-adicional-banheiro-privativo'),
      AdcVaranda = $('#adicional-varanda'), hospAdcVaranda = $('input#hospedagem-adicional-varanda'),
      AdcTranslado = $('#adicional-translado'), hospAdcTranslado = $('input#hospedagem-adicional-translado');

        $(AdcCafe).click(function() {
            if (this.checked) $(hospAdcCafe).val(1);
            else if(!this.checked) $(hospAdcCafe).val(0);
        });
        $(AdcWifi).click(function() {
            if (this.checked) $(hospAdcWifi).val(1);
            else if(!this.checked) $(hospAdcWifi).val(0);
        });
        $(AdcArCondicionado).click(function() {
            if (this.checked) $(hospAdcArCondicionado).val(1);
            else if(!this.checked) $(hospAdcArCondicionado).val(0);
        });
        $(AdcTvCabo).click(function() {
            if (this.checked) $(hospAdcTvCabo).val(1);
            else if(!this.checked) $(hospAdcTvCabo).val(0);
        });
        $(AdcCancelamento).click(function() {
            if (this.checked) $(hospAdcCancelamento).val(1);
            else if(!this.checked) $(hospAdcCancelamento).val(0);
        });
        $(AdcAnimal).click(function() {
            if (this.checked) $(hospAdcAnimal).val(1);
            else if(!this.checked) $(hospAdcAnimal).val(0);
        });
        $(AdcAcademia).click(function() {
            if (this.checked) $(hospAdcAcademia).val(1);
            else if(!this.checked) $(hospAdcAcademia).val(0);
        });
        $(AdcPiscina).click(function() {
            if (this.checked) $(hospAdcPiscina).val(1);
            else if(!this.checked) $(hospAdcPiscina).val(0);
        });
        $(AdcEstacionamento).click(function() {
            if (this.checked) $(hospAdcEstacionamento).val(1);
            else if(!this.checked) $(hospAdcEstacionamento).val(0);
        });
        $(AdcBanheiroPrivativo).click(function() {
            if (this.checked) $(hospAdcBanheiroPrivativo).val(1);
            else if(!this.checked) $(hospAdcBanheiroPrivativo).val(0);
        });
        $(AdcVaranda).click(function() {
            if (this.checked) $(hospAdcVaranda).val(1);
            else if(!this.checked) $(hospAdcVaranda).val(0);
        });
        $(AdcTranslado).click(function() {
            if (this.checked) $(hospAdcTranslado).val(1);
            else if(!this.checked) $(hospAdcTranslado).val(0);
        });

  // Mais informações
  var ativaInfoAdicional = $('#ativa-info-adicional'),
      campoInfoAdicional = $('#campo-info-adicional');

      $(ativaInfoAdicional).bind('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $(campoInfoAdicional).removeClass('hidden');
        }
        else{
          $(this).removeClass('active');
          $(campoInfoAdicional).addClass('hidden');
          $(campoInfoAdicional).val('');
        }
      });

  /* FORM CARROS */
}

jQuery(document).ready(function($) {
  bindaFormCotaViagem();

  // Token do laravel para Ajax
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
     }
  });

  $('#form-cotar-viagens').submit(function (ev) {
    ev.preventDefault();
    var modal = $('#modal-cotacao-viagem');
        frm = $('#form-cotar-viagens'),
        frmObj = {},
        callbackFunction = frm.data('callback'),
        redirect = frm.data('redirect'),
        loading = frm.data('loading');

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

    if (loading && loading != "") {
      $('input:submit').hide();
      $('#'+loading).show();
    }

    console.log(frm);

    $.ajax({
        url: frm.attr('action'),
        type: frm.attr('method'),
        data: frmObj,

        success: function (data) {
            if(callbackFunction) {
              swal({
                  title: lingua[0],
                  html: lingua[1]+"<br/>"+lingua[2],
                  type: "success",
                  confirmButtonColor: "#FF5B00",
                  confirmButtonText: "OK",
                  closeOnConfirm: true,
              });
              document.getElementById("form-cotar-viagens").reset();
              modal.modal('hide');
            }
            if(redirect) {
                window.location = redirect;
            }
        },
        error: function (data) {
          if(callbackFunction) {
            swal({
                title: lingua[3],
                html: lingua[4]+"<br/>"+lingua[5],
                type: "error",
                confirmButtonColor: "#FF5B00",
                confirmButtonText: "OK",
                closeOnConfirm: true,
            });
            document.getElementById("form-cotar-viagens").reset();
            modal.modal('hide');
          }
        },
        complete: function (data) {
          // Se tiver loading e tiver dado erro, voltar botao
          if (loading && loading != "") {
             $('input:submit').show();
             $('#'+loading).hide();
          }
       }
    });

  });

});
