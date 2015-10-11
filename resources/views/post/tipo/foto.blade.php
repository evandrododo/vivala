<article class="foto">
    <div class="hora-post"> {{ $Post->data_postagem_diff }}[
        @if ( Auth::user()->entidadeAtiva == $Post->entidade )
                {!! Form::open([ 'method' => 'DELETE', 'route' => ['post.destroy', $Post->id] ]) !!}
                    {!! Form::submit('Remover ', ['class' => 'btn', 'onclick' => "return confirm('Tem certeza que deseja remover esse post?');"]) !!}
            
                {!! Form::close() !!}
        @endif
         </div>
	<div class="row principal foto-fundo"
	@if($Post->fotos)
	 style="background-image:url('{{ $Post->fotos->path }}')"
	@endif
	>
		<h4>{{ $Post->titulo }}</h4>

		<div class="col-sm-2">
			<div class="foto-label">
                            <a href="{{ url($Post->entidade->getUrl()) }}">
				<img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
				<div class="titulo-label">{{$Post->entidade->apelido }}</div>
                            </a>
			</div>
		</div>
	</div>
	@include('post._barrainfos')
	<div class="row box-post">
		<div class="col-sm-6 fundo-cheio">
			<p class="status text-center">{{$Post->descricao}}</p>
		</div>
		<div class="col-sm-6 fundo-cheio">
			<div class="comentarios-wrapper">
				@include('post._comentarios')
			</div>
			@include('post._novocomentario')
		</div>
	</div>
</article>
