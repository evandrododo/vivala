<h3 class="font-bold-upper text-center">TRANSPORTE - ÔNIBUS
    <small class="sub-titulo">Como viajar?</small>
</h3>

<input type="hidden" name="_token" value="{{\Session::token() }}">

<div class="row" id="rodoviario-filtros">
    <div class="col-sm-12">
        <div class="select-filtro">
            <input id="origem-rodoviario" placeholder="DE" type="text" class="form-control">
            <input id="origem-rodoviario-hidden" type="hidden">
            <i class="fa-spin fa-spinner fa loading-search soft-hide"></i>
        </div>
        <div class="select-filtro">
            <input id="destino-rodoviario" placeholder="PARA" type="text" class="form-control">
            <input id="destino-rodoviario-hidden" type="hidden">
            <i class="fa-spin fa-spinner fa loading-search soft-hide"></i>
        </div>
        <div class="select-filtro">
            <input placeholder="IDA" data-provide="datepicker" data-date-format="dd/mm/yyyy" id="data-id-rodoviario" name="data-id-rodoviario" class="form-control" type="text">
        </div>
        <div class="select-filtro">
            <input placeholder="VOLTA" data-provide="datepicker" data-date-format="dd/mm/yyyy" id="data-volta-rodoviario" name="data-volta-rodoviario" class="form-control" type="text">
        </div>
    </div>

    <div class="col-sm-12" id="buscar-rodoviario">
        <button type="button" class="btn btn-acao">Buscar Transporte</button>
    </div>
</div>

<hr>

<input type="hidden" id="departure-schedule-id">

<div id="clickbus-resultado-busca">
    
</div>