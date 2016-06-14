@extends('viajar')

@section('content')
<div id="tour-pilares" class="pilar-viajar">
    <div class="foto-fundo-bottom foto-header" style="background-image:url('/img/queroviajar.png');">
        <h2>{{ trans('global.wannatravel_title') }}</h2>
        <h3>{{ trans('global.wannatravel_subtitle') }}</h3>
        <div class="col-sm-12">
            <a class="suave padding-btn">{{ trans('global.lbl_how_it_works') }}</a>
        </div>
    </div>

    <div class="fundo-cheio col-sm-12 tour-pilar-viajar-step2">
        <h3 class="font-bold-upper text-center">
          {{ trans('global.wannatravel_trip_already_know') }}
            <small class="sub-titulo">{{ trans('global.wannatravel_trip_setup') }}</small>
        </h3>

        <ul class="lista-border pesquisa-viajar margin-t-2 margin-b-3">
            <li class="col-sm-3 tour-pilar-viajar-step3">
                <a class="experiencias" href="#experiencias" aria-controls="experiencias" role="tab" data-toggle="tab">
                    Experiências
                </a>
            </li>
            <li class="col-sm-3 tour-pilar-viajar-step3">
                <a class="rodoviario" href="#rodoviario" aria-controls="rodoviario" role="tab" data-toggle="tab">
                   {{ trans('global.wannatravel_trip_bus_drive') }}
                </a>
            </li>

            <li class="col-sm-4 tour-pilar-viajar-step4">
                <a class="ativa-modal-quimera" href="#quimera" data-url="https://www.e-agencias.com.br/vivala">
                   {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
                </a>
            </li>

            <li class="col-sm-2 active tour-pilar-viajar-step5">
                <a class="restaurantes" href="#restaurantes" aria-controls="restaurantes" role="tab" data-toggle="tab">
                    {{ trans('global.wannatravel_trip_restaurants') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane " id="rodoviario">
                <div class="lista-rodoviario"></div>
            </div>
            <div role="tabpanel" class="tab-pane " id="restaurantes">
            </div>
            <div role="tabpanel" class="tab-pane active text-center" id="experiencias">
                <span class="col-xs-12">
                    <i class="fa fa-envelope round-icon-bg"></i>
                </span>
                <h1 class="negrito-exp col-xs-12">Você está quase lá!</h1>
                <small class="col-xs-12">Te enviaremos um email com todos os detalhes.</small>

                <span class="col-xs-12 margin-t-1">Para confirmar sua inscrição na experiência <b>Cão Feliz</b>, realize o depósito de <b>R${{$Experiencia->preco}}</b> na conta a seguir:</span>
                <div class="col-xs-12">
                    <div class="dados-bancarios margin-t-1">
                        <span class="row text-left negrito-exp col-xs-12">CONTA</span>
                        <span class="row text-left negrito-exp col-xs-12">AGÊNCIA</span>
                        <span class="row text-left negrito-exp col-xs-12">CNPJ</span>
                        <span class="row text-left negrito-exp col-xs-12">BANCO DO BRASIL</span>
                    </div>
                </div>
                <div class="col-xs-12 separador">
                    <span>ou</span>
                </div>
                <span class="col-xs-12">Pague com boleto bancário:</span>
                <span class="col-xs-12 margin-t-1">
                    <i class="fa fa-barcode sqr-icon-bg"></i>
                </span>
                <a href="/experiencias/{{ $Experiencia->id }}">
                    <i class="fa fa-times x-preto"></i>
                </a>
            </div>
            <a class="btn-full-bottom" href="/experiencias">Ver mais experiências</a>
        </div>
    </div>

</div>
@endsection
