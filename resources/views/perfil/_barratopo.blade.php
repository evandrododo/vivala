
<div class="row perfil-topo margin-b-2">
    <div class="col-md-1">
        &nbsp;
        @if ($perfil->user->id == Auth::user()->id)
        <a class="link-claro edit-profile" href="{{ url($perfil->tipo.'/'.$perfil->id.'/edit') }}">
            <i class="fa fa-edit"></i> {{ trans('global.lbl_edit') }}
        </a>
        @endif
    </div>
    <div class="col-md-4">
        <div class="row perfil-title">
            <h1 class="col-sm-6 font-bold-upper">
                {{ $perfil->apelido_tratado }}
            </h1>
            <span class="col-sm-6">
                @if($perfil->cidade_atual)
                <i class="fa fa-map-marker"></i> {{ trans('global.lbl_live_in') }} {{ $perfil->cidade_atual }}
                @endif
            </span>
        </div>
        <p class="col-sm-12 row">{{ $perfil->descricao_curta }}</p>
    </div>
    <div class="col-md-2">

            {!! Form::open(['url' => ['ajax/followperfil', $perfil->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$perfil->id.')']) !!}
            <a href="{{ url($perfil->getUrl()) }}">
                @if ($perfil->id != Auth::user()->entidadeAtiva->id)
                    <button name='btn_seguir' type="submit" class='@if (Auth::user()->entidadeAtiva->isFollowing($perfil->id, get_class($perfil))) suave @else @endif  btn-follow btn_seguir_viajante ' data-id="{{ $perfil->id }}">@if (Auth::user()->entidadeAtiva->isFollowing($perfil->id, get_class($perfil))) seguindo @else seguir @endif</button>
                @endif
                    <div class="round foto quadrado7em">
                            <div class="avatar-img" style="background-image:url('{{ $perfil->getAvatarUrl() }}')">
                            </div>
                    </div>
            </a>
            {!! Form::close() !!}

    </div>
    <div class="col-md-4 font-bold-upper">
        <ul>
            <li class="col-sm-4">
                <a href="#"  data-toggle="modal" data-target="#modal-seguidores">
                    {{ $perfil->numeroSeguidores }} <br>
                    {{ trans('global.lbl_follower_') }}
                </a>
                <div id="modal-seguidores" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-md">

                        <div class="modal-content">
                            <div class="modal-body">
                                <h3 class="texto-preto">{{ trans('global.lbl_followed_by') }}</h3>
                                <ul class="lista-usuarios row">
                                @forelse($followedBy as $perfilSeguidor)
                                    <li class="foto-user col-sm-6 col-md-4 col-lg-3 margin-b-2">
                                        <a href="{{ url($perfilSeguidor->getUrl()) }}" title="{{ $perfilSeguidor->user->username }}">
                                            <div class="round foto quadrado7em">
                                                    <div class="avatar-img" style="background-image:url('{{ $perfilSeguidor->getAvatarUrl() }}')">
                                                    </div>
                                            </div>
                                            <h4 class="texto-preto">{{ $perfilSeguidor->apelido_tratado }}</h4>
                                        </a>
                                    </li>
                                @empty
                                <p>{{ trans('global.lbl_followed_by_none') }} :(</p>
                                @endforelse
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('global.lbl_close')}}</button>
                            </div>
                        </div>

                    </div>
                </div>
            </li>
            <li class="col-sm-4">
                <a href="#" data-toggle="modal" data-target="#modal-seguindo">
                {{ $perfil->numeroSeguindo }} <br>
                {{ trans('global.lbl_following') }}
                </a>
                <div id="modal-seguindo" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h3 class="texto-preto">{{ trans('global.lbl_following') }}</h3>
                                <ul class="lista-usuarios row">
                                @forelse($follow as $perfilSeguindo)
                                    <li class="foto-user col-sm-6 col-md-4 col-lg-3 margin-b-2">
                                        <a href="{{ url($perfilSeguindo->getUrl()) }}" title="{{ $perfilSeguindo->user->username }}">
                                            <div class="round foto ">
                                                    <div class="avatar-img" style="background-image:url('{{ $perfilSeguindo->getAvatarUrl() }}')">
                                                    </div>
                                            </div>
                                            <h4 class="texto-preto">{{ $perfilSeguindo->apelido_tratado }}</h4>

                                        </a>
                                    </li>
                                @empty
                                <p>{{ trans('global.lbl_followed_by_none') }} :(</p>
                                @endforelse
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('global.lbl_close')}}</button>
                            </div>
                        </div>

                    </div>
                </div>
            </li>
            <li class="col-sm-4">
                @if( $perfil->tipo == 'ong' )
                    Projeto de impacto
                    @else
                    @if( $perfil->apoiador == 'B' )
                    <i class="fa fa-star"></i>
                    <br>APOIADOR
                    @elseif ( $perfil->apoiador == 'A' )
                    <i class="fa fa-star laranja"></i>
                    <br>APOIADOR
                    @else
                    <br>
                    {{ trans('global.lbl_traveller') }}
                    @endif
                @endif
                @if(Auth::user()->isAdmin())
                {!! Form::open(['url' => ['perfilcontroller/setapoiador', $perfil->id], 'method' => 'GET', 'class' => 'form-ajax', 'data-callback'=>'location.reload()']) !!}
                    <button class="btn btn-acao" style="position: absolute;top:0;right:0;" type="submit"  data-id="{{ $perfil->id }}">
                        <i class="fa fa-star"></i>
                    </button>
                    {!! Form::close() !!}
                @endif
            </li>
        </ul>
        {{-- DESATIVADO TEMPORARIAMENTE
        <ul class="margin-0">
            <li class="col-sm-6">
              <a href="#" data-toggle="modal" data-target="#modal-mais-coisas">{{ trans('global.lbl_know_more_things') }}</a>
              <div id="modal-mais-coisas" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-md">
                      <div class="modal-content">
                          <div class="modal-body">
                              <h3 class="texto-preto">{{ trans('global.lbl_know_more_things') }}</h3>


                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('global.lbl_close')}}</button>
                          </div>
                      </div>

                  </div>
              </div>
            </li>
            <li class="col-sm-6"><a href="#" class="desativado">
                @if( $perfil->tipo == 'ong' )
                      {{ trans('global.ong_contact_keep_in') }}
                @else
                      {{ trans('global.lbl_message_send') }}
                @endif
            </a></li>
        </ul>
        --}}
    </div>
    <div class="col-md-1">
    </div>

</div>
