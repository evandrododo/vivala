@if(isset($posts))
<ul class="lista-posts">

	@forelse($posts as $Post)
        <li class="post col-sm-12">
			@if($Post->tipoPost == 'status')
            	@include('feed.status')
			@elseif($Post->tipoPost == 'foto')
            	@include('feed.foto')
			@endif
        </li>
	@empty
	    <p>Que silêncio, fala alguma coisa aí! :)</p>
	@endforelse
</ul>
@endif