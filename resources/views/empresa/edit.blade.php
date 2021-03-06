@extends('viajar')

@section('content')
  <h1>{{ trans('global.lbl_company_editing') }}</h1>

	<!-- Adiciona um formulario pra upload de foto-->
        <div class="text-center jc_coords row col-sm-12">

            {!! Form::open(['url' => ['foto/cropandsave',  Auth::user()->perfil->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'form-ajax', 'data-redirect' => '/home']) !!}
            {!! Form::hidden("tipoEntidade",  "App\Perfil") !!}

            <img id="preview" src="{{ $foto?$foto:'/img/interrogacao.png' }}" class="foto-preview"/>

            <div class="file-upload">
                <label for="image_file_upload">
                    {{ trans('global.lbl_photo_send') }}
                    <p>{{ trans('global.quiz_fromcomputer') }}</p>
                    {!! Form::file("image_file_upload", ['id' => 'image_file_upload', 'class' => 'upload']) !!}
                </label>
            </div>
            {!! Form::hidden("x",  0, ['id' => 'xJcropPerfil']) !!}
            {!! Form::hidden("y",  0, ['id' => 'yJcropPerfil']) !!}
            {!! Form::hidden("w",  0, ['id' => 'wJcropPerfil']) !!}
            {!! Form::hidden("h",  0, ['id' => 'hJcropPerfil']) !!}
            {!! Form::hidden("_token",  csrf_token(), ['name' => '_token' ]) !!}
            <div class="erros">
            </div>
            {!! Form::submit( trans('global.lbl_photo_update'), ['class' => 'btn btn-acao']) !!}
            {!! Form::close() !!}
        </div>

        {!! Form::model($empresa, ['method' => 'PATCH', 'action' => ['EmpresaController@update', $empresa->id] ]) !!}

		@include('empresa.form', ['btnSubmit' => trans('global.lbl_submit')]);

        {!! Form::close() !!}

    @include('errors.list')
@stop
