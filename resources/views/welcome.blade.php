<!DOCTYPE html>
<html id="welcome-html" lang="en">
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

    {{-- Google SEO --}}
      <meta name="description" content="{{ trans('global.description_vivala') }}"/>
      <meta name="keywords" content="{{ trans('global.keywords_vivala') }}"/>
      <meta name="robots" content="index, follow, noarchive"/>

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

    {{-- Styles - CSS --}}
      {{-- Fontes --}}
        <link href="{{ asset('/fonts/avenir/avenir.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('/fonts/futura/futura.css') }}" rel='stylesheet' type='text/css'>
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
    {{-- OutdatedBrowser com ajaxcall -> https://github.com/burocratik/outdated-browser --}}
      <div id="outdated"></div>

    {{-- Corpo da aplicação MOBILE - menor que 768px [em construção] --}}
      <div id="welcome-mobile-warning" class="hidden-md hidden-lg padding-b-2 padding-t-2 fundo-cheio text-justified">
          <div class="row">
              <div class="col-xs-12 col-sm-12 margin-b-1 text-center">
                  <a class="navbar-brand-mobile nav-logo" href="{{ url('home') }}" alt="{{ trans('global.lbl_vivala') }}">
                      {{-- SVG da logo VIVALÁ --}}
                      <img src="{{ asset('vivala-logo.svg') }}" alt="{{ trans('global.lbl_vivala') }}" title="{{ trans('global.lbl_vivala') }}" width="100%" height="80vh" />
                  </a>
              </div>
              <div class="col-xs-12 col-sm-12 margin-b-1 text-center">
                <h3 class="font-bold-upper">
                    {{ trans('global.mobile_warning_welcome') }}
                </h3>
              </div>
          </div>
          <div class="row margin-t-2 margin-b-8">
              <p class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 text-center">
                {{ trans('global.mobile_warning_desctopo') }}
              </p>
              <p class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 text-center">
                  {!! trans('global.mobile_warning_descbody') !!}
              </p>
              <p class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 text-center">
                  {!! trans('global.mobile_warning_desclink') !!}
              </p>
          </div>
      </div>

    {{-- Modal Vídeo Manifesto --}}
      <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="fa fa-times fa-2x laranja"></i>
                      </button>
                      <div>
                          <div class="modal-title padding-t-1 padding-b-1">
                            <img src="{{ asset('vivala-logo.svg') }}" alt="{{ trans('global.lbl_vivala') }}" title="{{ trans('global.lbl_vivala') }}" width="100%" height="35px"/>
                          </div>
                          <iframe width="100%" height="350" src="" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    {{-- Header da Welcome --}}
      <div id="welcome-header" class="hidden-xs hidden-sm">
          <div class="container-fluid">
              <div class="col-md-5 col-lg-5 text-center">
                  <a class="navbar-brand nav-logo col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1" href="{{ url('home') }}" target="_self" rel="{{ trans('global.title_vivala') }}">
                      {{-- SVG da logo VIVALÁ --}}
                        <img src="{{ asset('vivala-logo.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" width="100%" height="100%" />
                  </a>
              </div>
              <div class="col-md-7 col-lg-7">
                  <div class="col-md-10 col-lg-10">
                      {!! Form::open(['url' => '/auth/login', 'class' => 'form-horizontal form-login']) !!}
                      <div class="row">
                          <div class="col-md-4 col-lg-4">
                              {!! Form::label('idioma', trans('global.lbl_language'), ['class' => 'titulo']) !!}
                          </div>
                          <div class="col-md-3 col-lg-3">
                              {!! Form::label('email', trans('global.lbl_login'), ['class' => 'titulo']) !!}
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4 col-lg-4">
                              {!! Form::select('idioma', ['pt' => trans('global.lang_pt-br'), 'en' => trans('global.lang_en-us')], 'pt') !!}
                          </div>
                          <div class="col-md-4 col-lg-4">
                              {!! Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => trans('global.lbl_email') ]) !!}
                          </div>
                          <div class="col-md-4 col-lg-4">
                              {!! Form::password("password", ['class' => 'form-control', "placeholder" => trans('global.lbl_password') ]) !!}
                              <span class="btn-submit">
                                  {!! Form::submit( trans('global.lbl_ok'), ['class' => 'btn-default btn loginbtn']) !!}
                              </span>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4 col-lg-4">
                              &nbsp;
                          </div>
                          <div class="col-md-4 col-lg-4">
                              <label class="rememberme" for="remember"><input type="checkbox" name="remember" id="remember">&#8192;{{ trans('global.lbl_login_keepme') }}</label>
                          </div>
                          <div class="col-md-4 col-lg-4">
                              <span class="forgotpassword">
                                <a href="{{ url('/password/email') }}">{{ trans('global.lbl_password_forgot') }}</a>
                              </span>
                          </div>
                      </div>
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>

    {{-- Body da Welcome --}}
      <div id="welcome-content" class="hidden-xs hidden-sm margin-t-2 margin-b-2">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-7 col-lg-7">
                <div class="col-md-11 col-md-offset-1 col-lg-11 col-lg-offset-1">
                  {{-- SVG do mapa WELCOME - Agora com tradução --}}
                    <div id="brasilwelcome">
                        @if (Config::get('app.locale') === 'pt')
                          <img src="{{ asset('/img/welcome/mapa-vivala-ptbr.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.join_vivala') }}" width="100%" height="100%" />
                        @elseif (Config::get('app.locale') === 'en')
                          <img src="{{ asset('/img/welcome/mapa-vivala-en.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.join_vivala') }}" width="100%" height="100%" />
                        @endif
                    </div>
                  <div class="balao-flutuante balao-1">
                      {{ trans('global.welcome_floatingballon1') }}
                  </div>
                  <div class="balao-flutuante balao-2">
                      {{ trans('global.welcome_floatingballon2') }}
                  </div>
                  <div class="balao-flutuante balao-3">
                      {{ trans('global.welcome_floatingballon3') }}
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div id="modal-manifesto">
                        <a href="#" class="btn btn-acao" data-toggle="modal" data-target="#videoModal" data-theVideo="https://www.youtube.com/embed/kaIRH4Uh7nw" data-backdrop="static">
                          {{ trans('global.lbl_our_essence') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-lg-5 padding-b-2 form-cadastro-wrapper">

              {!! Form::open(['url' => '/auth/register', 'class' => 'form-horizontal']) !!}
                <div id="welcome-cadastrar">

                  <div class="row">
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-5 padding-l-no"><h3>{{ trans('global.lbl_signup1') }}</h3></div>
                      <div class="col-md-6 col-md-offset-1">
                          <a href="{{ url('/fbLogin') }}" class="btn btn-social btn-facebook margin-t-1" target="_self" rel="nofollow">
                              <span class="fa fa-facebook"></span> {{ trans('global.fb_login') }}
                          </a>
                      </div>
                    </div>
                  </div>

                  <div class=row>
                    <div class="col-md-11 col-lg-11 margin-t-2">
                      @if (count($errors) > 0)
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                      @endif

                      <div class="form-group">
                          <div class="col-md-6 col-lg-6">
                              {!! Form::text("username", null, ['class' => 'form-control text-uppercase', 'placeholder' => trans('global.lbl_name')]) !!}
                          </div>
                          <div class="col-md-6 col-lg-6">
                              {!! Form::text("username_last", null, ['class' => 'form-control text-uppercase', 'placeholder' => trans('global.lbl_name_last')]) !!}
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-lg-6">
                              <label class="radio-button radio-hidden">
                                  {!! Form::radio("genero", "masculino") !!}
                                  <span class="text-uppercase">{{ trans('sexorient-gender.gen_opt_male') }}</span>
                              </label>
                          </div>
                          <div class="col-md-6 col-lg-6">
                              <label class="radio-button radio-hidden">
                                  {!! Form::radio("genero", "feminino") !!}
                                  <span class="text-uppercase">{{ trans('sexorient-gender.gen_opt_female') }}</span>
                              </label>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-12 col-lg-12">
                              <input type="text" name='aniversario' class="mascara-data form-control text-uppercase" placeholder='{{ trans("global.lbl_birthday") }}'>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-12 col-lg-12">
                              {!! Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => trans('global.lbl_email')]) !!}
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-12 col-lg-12">
                              {!! Form::password("password", ['class' => 'form-control text-uppercase', "placeholder" => trans('global.lbl_password')]) !!}
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-12 col-lg-12">
                              {!! Form::password("password_confirmation", ['class' => 'form-control text-uppercase', "placeholder" => trans('global.lbl_password_confirmation') ]) !!}
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-11 col-lg-11 welcome-privacy">
                          <p>
                            <span>{{ trans('global.welcome_aboutprivacy1') }}</span>
                              <span> <a href="/paginas/termosecondicoes" target="_self" rel="license">{{ trans('global.lbl_legal_terms') }}</a></span>
                              <span>{{ trans('global.welcome_aboutprivacy2') }}</span>
                              <span> <a href="/paginas/termosecondicoes" target="_self" rel="license">{{ trans('global.lbl_data_policy') }}</a></span>
                              <span>{{ trans('global.welcome_aboutprivacy3') }}</span>
                              <span> <a href="/paginas/termosecondicoes" target="_self" rel="license">{{ trans('global.lbl_cookie_use') }}</a>.</span>
                          </p>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-11 col-lg-11">
                      {{-- Tour OFFLINE - Desativado atualmente
                      <!--div class="col-md-11 col-lg-11">
                          <a href="{{ url('/auth/login') }}" class="anchor-tour">Fazer um tour pela Vivalá, sem se cadastrar.</a>
                      </div-->
                      --}}
                      <div class="col-md-4 col-lg-4 pull-right padding-r-0">
                          {!!Form::submit( trans('global.lbl_confirm'), ['class' => 'btn btn-default']) !!}
                      </div>
                    </div>
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
      </div>

    {{-- Footer da Welcome / Desabilitada para versões MD/LG --}}
      <footer id="footer-welcome" class="hidden-md hidden-lg">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-sm-12 text-center">
              <span>{!! trans('global.title_vivala') !!}</span><i class="fa fa-copyright"></i><span>{{ $date->year }}</span>
            </div>
          </div>
        </div>
      </footer>

    {{-- Scripts de carregamento no fim do HTML --}}
      <script src="{{ asset('/js/vendor.js') }}"></script>

</body>
</html>
