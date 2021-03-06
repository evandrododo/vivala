@extends('cuidar')
    @section('barra-topo')
@endsection

@section('content')
<div class="col-sm-12 margin-b-1">
<div class="col-sm-12 foto-fundo foto-header" style="background-image:url('{{ $Ong->getCapaUrl() }}');">
    @if ($Ong->user->id == Auth::user()->id)
        <div class="hora-post"><a class="btn btn-action" href="{{ url('ong/trocacapa') }}">Trocar foto de capa</a></div>
    @endif
</div>
</div>

<h3 class="font-bold-upper text-center">{{ $Ong->nome }}</h3>
<div class="col-sm-12 sobre-ong">
<div class="text-center fundo-cheio">
    <div class="spritemap-vaga sprite-casa"></div>
    <b class="font-bold-upper col-sm-12">Sobre a organização</b>
    <p>{{ $Ong->descricao?:"Sem descrição." }}</p>
</div>
</div>

<div class="col-sm-4">
<div class="text-center fundo-cheio height-18">
    <div class="spritemap-vaga sprite-calendario"></div>
    <b class="font-bold-upper col-sm-12">Datas e horários</b>
    <p>{{ $Ong->horario_funcionamento }}</p>
</div>
</div>

<div class="col-sm-4">
<div class="text-center fundo-cheio height-18">
    <div class="spritemap-vaga sprite-mapmarker"></div>
    <b class="font-bold-upper col-sm-12">Localização</b>
    <p>{{ $Ong->local }}</p>
</div>
</div>

<div class="col-sm-4">
<div class="text-center fundo-cheio height-18">
    <b class="font-bold-upper col-sm-12 margin-t-2">Responsável</b>
    <div class="follow-perfil col-sm-8 col-sm-offset-2 margin-t-1">
        {!! Form::open(['url' => ['ajax/followperfil', $responsavel->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$responsavel->id.')']) !!}
        <a href="{{ url($responsavel->getUrl()) }}">
        <button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $responsavel->id }}">{{trans('global.lbl_follow')}}</button>
                <div class="round foto quadrado7em">
                        <div class="cover">
                            <div class="round foto quadrado7em foto-perfil">
                                <div class="avatar-img" style="background-image:url('{{ $responsavel->getAvatarUrl() }}')">
                                </div>
                            </div>
                        </div>
                </div>
                <strong class="col-sm-12 margin-t-1">{{ $responsavel->user->username }}</strong>
        </a>
        {!! Form::close() !!}
    </div>
    <br><br>
</div>
</div>

@if(isset($volutarios) && count($voluntarios))
<div class="text-center fundo-cheio col-sm-12">
    <div class="spritemap-vaga sprite-casa"></div>
    <h3 class="font-bold-upper col-sm-12">Voluntários nesta Ong</h3>
    @foreach($voluntarios as $PerfilVoluntario)
        {{ $PerfilVoluntario->apelido }}
    @endforeach
    <a class='button' href="{{url('vagas/create')}}">Criar Vaga</a>
</div>
@endif

@endsection
