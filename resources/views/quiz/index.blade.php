<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ trans('global.title_vivala') }}</title>

	{{-- Codificação de Caracteres --}}
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<meta charset="utf-8">

	{{-- Lingua utilizada na view --}}
			<meta name="language" content='{{ Config::get('app.locale') }}'>

	{{-- Mobile Zoom e IECompat --}}
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	{{-- Google Analytics--}}
		<meta name="google-site-verification" content="U7etmc1T1SL8IEwLdDu-Aq941mJGMpSFUapaAn-7ME0" />

	{{-- Facebook OpenGraph metatags --}}
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="fb:app_id" content="1598914903686637" />
    <meta property="og:title" content="{{ trans('global.fb-og-title_welcome') }}" />
    <meta property="og:site_name" content="Vivalá"/>
    <meta property="og:url" content="http://vivala.com.br/" />
    <meta property="og:description" content="{{ trans('global.fb-og-description_welcome') }}" />
    <meta property="og:image" content="{{ asset('/img/fb-og/fb-og-original.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

	{{-- Twitter Card metatags --}}
			<meta name="twitter:card" content="summary" />

	{{-- Favicon e relacionados --}}
		<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/v/apple-touch-icon-57x57.png') }}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/v/apple-touch-icon-60x60.png') }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/v/apple-touch-icon-72x72.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/v/apple-touch-icon-76x76.png') }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/v/apple-touch-icon-114x114.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/v/apple-touch-icon-120x120.png') }}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/v/apple-touch-icon-144x144.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/v/apple-touch-icon-152x152.png') }}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/v/apple-touch-icon-180x180.png') }}">
		<link rel="icon" type="image/png" href="{{ asset('favicon/v/favicon-32x32.png') }}" sizes="32x32">
		<link rel="icon" type="image/png" href="{{ asset('favicon/v/android-chrome-192x192.png') }}" sizes="192x192">
		<link rel="icon" type="image/png" href="{{ asset('favicon/v/favicon-96x96.png') }}" sizes="96x96">
		<link rel="icon" type="image/png" href="{{ asset('favicon/v/favicon-16x16.png') }}" sizes="16x16">
		<link rel="manifest" href="{{ asset('favicon/v/manifest.json') }}">
		<link rel="mask-icon" href="{{ asset('favicon/v/safari-pinned-tab.svg') }}" color="#f3702b">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="{{ asset('favicon/v/mstile-144x144.png') }}">
		<meta name="theme-color" content="#ffffff">

    {{-- CSS --}}
			{{-- Fontes --}}
				<link href="{{ asset('/fonts/avenir/avenir.css') }}" rel='stylesheet' type='text/css'>
				<link href="{{ asset('/fonts/futura/futura.css') }}" rel='stylesheet' type='text/css'>
				<link href="{{ asset('/fonts/gotham/gotham.css') }}" rel='stylesheet' type='text/css'>
				<link href="{{ asset('/fonts/vivala/vivala-glyphicons.css') }}" rel='stylesheet' type='text/css'>
			{{-- AllCSS --}}
				<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <nav class="navbar navbar-default menu-top">
        <div class="col-sm-2 menu-esquerda">
        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        		<span class="sr-only">Toggle Navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        	</button>
        	<a id="logo-vivala" class="navbar-brand logo tour_quiz-1-step1" href="{{ url('home') }}"><img src="/logo.png" alt="Vivalá" title="Vivalá"></a>
        </div>
        <div class="col-sm-10 text-right">
            <span id"skip-quiz" class="laranja absolute-top-right">{{ trans("global.lbl_step") }} {{ $passo }} {{ trans("global.quiz_offour") }}</span>
        </div>
	</nav>
	<div class="col-sm-2 col-md-2">
        &nbsp;
	</div>

	<div class="col-sm-8 col-md-8">
		@yield('pergunta')
	</div>

	<div class="col-sm-2 col-md-2">
        &nbsp;
	</div>
	<!-- Scripts -->
	<link href="{{ asset('/css/Jcrop/jquery.Jcrop.min.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/vendor.js') }}"></script>
</body>
</html>
