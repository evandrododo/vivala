<div class="row barra-post fundo-cheio" id="barra-post-{{ $Post->id }}">

        <div class="col-sm-4 tag">
    {{--
		<a href="#perfilcontroller/likepost/{{ $Post->id }}" class="tag-btn"><i class="fa fa-tag"></i></a>
		<span class="qtd-likes">
		</span>
    --}}
                &nbsp;
        </div>
	<div class="col-sm-2 like">
		<a href="#post/likepost/{{ $Post->id }}" class="fa-1-3x like-btn like-btn-post {{ $Post->likedByMe() }}">
      <i class="fa @if(Auth::user()->entidadeAtiva->likePost->find($Post->id)) fa-heart @else fa-heart-o @endif"></i>
    </a>
		<span class="qtd-likes">
			@if($Post->getQuantidadeLikes() > 1)
				 {{ $Post->getQuantidadeLikes() }} {{ trans('global.lbl_like_') }}
			@elseif($Post->getQuantidadeLikes() == 1)
				 {{ $Post->getQuantidadeLikes() }} {{ trans('global.lbl_like') }}
			@else
				{{ trans('global.lbl_liker') }}
			@endif
		</span>
	</div>
	<div class="col-sm-2 comentario">
		<a href="#post/likepost/{{ $Post->id }}" class="fa-1-3x comment-btn"><i class="fa fa-comment-o {{ $Post->likedByMe() }}"></i></a>
		<span class="qtd-comentarios">
		    {{ count($Post->comentarios) }} {{ trans('global.lbl_comment_') }}
		</span>
	</div>
	<div class="col-sm-2 share">
		<a href="#post/sharepost/{{ $Post->id }}" class="fa-1-3x share-btn"><i class="fa fa-share"></i></a>
		<span class="qtd-likes">
			{{ trans('global.lbl_sharer') }}
		</span>
	</div>
</div>
