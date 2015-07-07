@extends('viajar')

@section('content')

<div class="foto-fundo foto-header" style="background-image:url('/img/dummy.jpg');">
	<h2>Conheça o Brasil</h2>
	<h3>Escolha seu transporte e hospedagem, reserve restaurantes e entretenimento</h3>
	<div class="col-sm-12">
		<a class="suave">Como funciona</a>
	</div>
</div>
<section class="secao-sem-bg text-center">
	<h3 class="subtitulo col-sm-12">Explore novos ares e mares</h3>
	<small class="col-sm-12">Descubra lugares novos e inspiradores</small>
	<div class="col-sm-4">
		<div class="foto-link">
			<a href="/rio">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
				<h4>Brasília</h4>
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="foto-fundo foto-link">
			<a href="/rio">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
				<h4>Brasília</h4>
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="foto-fundo foto-link">
			<a href="/rio">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
				<h4>Brasília</h4>
			</a>
		</div>
	</div>
</section>

<section class="secao-sem-bg text-center">
	<h3 class="col-sm-12">Roteiros populares</h3>
	<small class="col-sm-12">Os mais curtidos, comentados e compartilhados da Vivalá</small>
	<div class="col-sm-4">
		<div class="foto-link">
			<a href="/rio">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
				<h4>Brasília</h4>
				<div class="foto-comentario">
					<div class="col-sm-5">
						<div class="round foto">
							<div class="cover">
								<img src="/img/dummy.jpg">
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						Uma viagem para entrar em contato com a cultura local
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="foto-link">
			<a href="/rio">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
				<h4>Brasília</h4>
				<div class="foto-comentario">
					<div class="col-sm-5">
						<div class="round foto">
							<div class="cover">
								<img src="/img/dummy.jpg">
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						Uma viagem para entrar em contato com a cultura local
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="foto-link">
			<a href="/rio">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
				<h4>Brasília</h4>
				<div class="foto-comentario">
					<div class="col-sm-5">
						<div class="round foto">
							<div class="cover">
								<img src="/img/dummy.jpg">
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						Uma viagem para entrar em contato com a cultura local
					</div>
				</div>
			</a>
		</div>
	</div>
</section>

@endsection