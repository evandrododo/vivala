<div id="cotacao-viagem" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="{!! trans('lbl_close') !!}">
          <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
        <h3 class="modal-title font-bold-upper text-center">
          {!! trans('global.wannatravel_trip_setup') !!}
        </h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
          {!! Form::open(['url' => '/cotarviagem', 'class' =>'form-ajax', 'method' => 'POST', 'data-redirect' => '', 'data-loading'=>'form-loading']) !!}
            {{-- Botões Iniciais --}}
            <div class="row">
              <h4 class="sub-titulo ajuste-fonte-avenir-medium text-center margin-b-1">
                  {!! trans('global.lbl_what_are_you_looking_for') !!}?
              </h4>
              <div class="col-md-12 col-lg-12 list-group text-center">
                {{-- Botão VÔOS --}}
                <div class="col-md-2 col-md-offset-3 col-lg-2 col-lg-offset-3">
                  <div class="text-center">
                    <a href="#" id="ativa-form-voos" class="click-img-no-border">
                      <span class="fa-stack fa-5x conjunto-icones">
                        <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                        <i class="fa fa-plane fa-stack-1x icone-interno"></i>
                      </span>
                    </a>
                    <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_go') !!}</p>
                    {!! Form::hidden('cotacao-voos', 0, ['id' => 'cotacao-voos']) !!}
                  </div>
                </div>
                {{-- Botão ÔNIBUS --}}
                <div class="col-md-2 col-lg-2">
                  <a href="#" id="ativa-form-onibus" class="click-img-no-border">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                      <i class="fa fa-bus fa-stack-1x icone-interno"></i>
                    </span>
                  </a>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_bus') !!}</p>
                  {!! Form::hidden('cotacao-onibus', 0, ['id' => 'cotacao-onibus']) !!}
                </div>
                {{-- Botão HOSPEDAGEM --}}
                <div class="col-md-2 col-lg-2">
                  <a href="#" id="ativa-form-hospedagem" class="click-img-no-border">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                      <i class="fa fa-bed fa-stack-1x icone-interno"></i>
                    </span>
                  </a>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.quimera_lodge') !!}</p>
                  {!! Form::hidden('cotacao-hospedagem', 0, ['id' => 'cotacao-hospedagem']) !!}
                </div>
                {{-- Botão CARROS -- Desativado temporariamente
                <div class="col-md-2 col-lg-2">
                  <a href="#" id="ativa-form-carros" class="click-img-no-border desativado">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                      <i class="fa fa-car fa-stack-1x icone-interno"></i>
                    </span>
                  </a>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_drive') !!}</p>
                  {!! Form::hidden('cotacao-carros', 0, ['id' => 'cotacao-carros']) !!}
                </div>
                --}}
              </div>
            </div>
            {{-- Form Básico --}}
            <div class="row">
              <div id="cotacao-basica" data-value="0" class="hidden">
                <div class="col-md-12 col-lg-12 text-right margin-b-1">
                  <p class="laranja">
                    <i class="fa fa-plus-circle"></i><span class="ajuste-fonte-avenir-medium"> {!! trans('global.quimera_lodge') !!}?</span>
                  </p>
                </div>
                {{-- Infos de IDA e VOLTA e DATAS --}}
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('origem-1', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                  </div>
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('destino-1', null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <input type="text" name="cotacao-data-partida-1" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-3 col-lg-3">
                    <input type="text" name="cotacao-data-retorno-1" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-1 col-lg-1">
                    {!! Form::checkbox('mais-hospedagem-1', null, false, ['class' => 'form-control']) !!}
                  </div>
                </div>
                {{--
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('origem-2', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                  </div>
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('destino-2', null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <input type="text" name="cotacao-data-partida-2" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-3 col-lg-3">
                    <input type="text" name="cotacao-data-retorno-2" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-1 col-lg-1">
                    {!! Form::checkbox('mais-hospedagem-2', null, false, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('origem-3', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                  </div>
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('destino-3', null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <input type="text" name="cotacao-data-partida-3" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-3 col-lg-3">
                    <input type="text" name="cotacao-data-retorno-3" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-1 col-lg-1">
                    {!! Form::checkbox('mais-hospedagem-3', null, false, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('origem-4', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                  </div>
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('destino-4', null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <input type="text" name="cotacao-data-partida-4" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-3 col-lg-3">
                    <input type="text" name="cotacao-data-retorno-4" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-1 col-lg-1">
                    {!! Form::checkbox('mais-hospedagem-4', null, false, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('origem-5', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                  </div>
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('destino-5', null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <input type="text" name="cotacao-data-partida-5" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-3 col-lg-3">
                    <input type="text" name="cotacao-data-retorno-5" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                  </div>
                  <div class="col-md-1 col-lg-1">
                    {!! Form::checkbox('mais-hospedagem-5', null, false, ['class' => 'form-control']) !!}
                  </div>
                </div>
                --}}

                {{-- Adicionar mais destinos --}}
                <div class="col-md-12 col-lg-12 margin-t-1 text-left margin-t-1 margin-b-1">
                  <div class="col-md-12 col-lg-12">
                    <a href="#">
                      <i class="fa fa-plus-circle laranja"></i><span class="ajuste-fonte-avenir-medium laranja"> {!! trans('global.lbl_travel_to_add_more') !!}</span>
                    </a>
                  </div>
                </div>

                {{-- Datas Flexíveis --}}
                <div class="col-md-12 col-lg-12 margin-t-1 text-left margin-b-1">
                  <div class="col-md-12 col-lg-12">
                      {!! Form::checkbox('datas-flexiveis', false, false) !!}</span>
                      <span class="ajuste-fonte-avenir-medium">{!! trans('global.lbl_flexible_dates') !!}</span>
                  </div>
                </div>
                {{-- Numero de Adultos e Crianças --}}
                <div class="col-md-12 col-lg-12 margin-t-1">
                  <div class="col-md-6 col-lg-6">
                    <div class="col-md-6 col-lg-6 padding-l-no">
                      {!! Form::label('qtd-adultos', trans('global.lbl_how_many_travellers'), null, ['class' => 'form-control']) !!}<strong>?</strong>
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <select id="qtd-adultos" class="form-control" required>
                          @for($i=0; $i<=10; $i++)
                              <option name="nro-adultos-{{ $i }}" value="{{ $i }}" @if($i === 0) disabled selected @endif>
                              @if($i === 0)
                                {{ trans('global.lbl_select') }}
                              @elseif($i === 1)
                                {{ $i }} {{ trans('global.passenger_adult') }}
                              @elseif($i >= 2)
                                {{ $i }} {{ trans('global.passenger_adult_') }}
                              @endif
                              </option>
                          @endfor
                      </select>
                      {!! Form::hidden('nro-adultos', 0, ['id' => 'nro-adultos']) !!}
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="col-md-6 col-lg-6 padding-l-no">
                      {!! Form::label('qtd-criancas', trans('global.lbl_how_many_child'), null, ['class' => 'form-control']) !!}<strong>?</strong>
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <select id="qtd-criancas" class="form-control" required>
                        @for($i=-1; $i<=10; $i++)
                            <option name="nro-criancas-{{ $i }}" value="{{ $i }}" @if($i === -1) disabled selected @endif>
                            @if($i === -1)
                              {{ trans('global.lbl_select') }}
                            @elseif($i === 0)
                              {{ trans('global.passenger_child_no') }}
                            @elseif($i === 1)
                              {{ $i }} {{ trans('global.passenger_child') }}
                            @elseif($i >= 2)
                              {{ $i }} {{ trans('global.passenger_child_') }}
                            @endif
                            </option>
                        @endfor
                      </select>
                      {!! Form::hidden('nro-criancas', 0, ['id' => 'nro-criancas']) !!}
                    </div>
                  </div>
                </div>
                {{-- Períodos para Viajar --}}
                <div class="col-md-12 col-lg-12 margin-t-2">
                  <div class="col-md-12 col-lg-12">
                    <strong>{!! trans('global.lbl_any_preference_period_to_travel') !!}?</strong>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12 margin-t-2 margin-b-2">
                  <div class="row">
                    <ul class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-manha" class="click-img-no-border">
                          <span title="{!! trans('global.time_morning') !!}">
                            <span class="fa-stack fa-3x conjunto-icones">
                              <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                              <i class="wi wi-horizon-alt fa-stack-1x icone-interno"></i>
                            </span>
                          </span>
                        </a>
                        {!! Form::hidden('pref-tempo-manha', 0, ['id' => 'pref-tempo-manha']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-tarde" class="click-img-no-border">
                          <span title="{!! trans('global.time_afternoon') !!}">
                            <span class="fa-stack fa-3x conjunto-icones">
                              <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                              <i class="wi wi-day-sunny fa-stack-1x icone-interno"></i>
                            </span>
                          </span>
                        </a>
                        {!! Form::hidden('pref-tempo-tarde', 0, ['id' => 'pref-tempo-tarde']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-noite" class="click-img-no-border">
                          <span title="{!! trans('global.time_night') !!}">
                            <span class="fa-stack fa-3x conjunto-icones">
                              <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                              <i class="fa fa-moon-o fa-stack-1x icone-interno"></i>
                            </span>
                          </span>
                        </a>
                        {!! Form::hidden('pref-tempo-noite', 0, ['id' => 'pref-tempo-noite']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-madrugada" class="click-img-no-border">
                          <span title="{!! trans('global.time_dawn') !!}">
                            <span class="fa-stack fa-3x conjunto-icones">
                              <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                              <i class="wi wi-stars fa-stack-1x icone-interno"></i>
                            </span>
                          </span>
                        </a>
                        {!! Form::hidden('pref-tempo-madrugada', 0, ['id' => 'pref-tempo-madrugada']) !!}
                      </li>
                    </ul>
                  </div>
                </div>
                {{-- Horários Restritos --}}
                <div class="col-md-12 col-lg-12 margin-t-1 margin-b-2">
                  <div class="col-md-12 col-lg-12 margin-b-1">
                    <a href="#">
                        <i class="fa fa-plus-circle laranja"></i><span class="ajuste-fonte-avenir-medium laranja"> {!! trans('global.lbl_restrict_hours') !!}</span>
                    </a>
                  </div>
                  <div class="col-md-12 col-lg-12">
                    {!! Form::textarea('horarios-restritos', null, ['class' => 'form-control hidden', 'rows' => '5', 'placeholder' => trans('global.lbl_restrict_hours'), 'style' => 'resize:none']) !!}
                  </div>
                </div>
              </div>
              <div id="cotacao-hospedagem" data-value="0" class="hidden">
                <hr class="divisoria"/>
                <div id="cotacao-hospedagem-titulo" class="row margin-t-2 margin-b-2">
                  <div class="col-md-12 col-lg-12 text-center">
                    <h5 class="titulo-secao">{!! trans('global.quimera_lodge') !!}</h5>
                  </div>
                </div>
                <div id="cotacao-hospedagem-quartos" class="row margin-t-1">
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-6 col-lg-6">
                      <div class="col-md-5 col-lg-5">
                        {!! Form::label('qtd-quartos-hotel', trans('global.lbl_how_many_rooms'), null, ['class' => 'form-control']) !!}?</strong>
                      </div>
                      <div class="col-md-7 col-lg-7">
                        <select id="qtd-quartos-hotel" class="form-control">
                            @for($i=1; $i<=10; $i++)
                                <option name="nro-quartos-hotel-{{ $i }}" value="{{ $i }}">
                                {{ $i }}
                                @if($i === 1)
                                  {!! trans('global.quimera_travel_room') !!}
                                @endif
                                @if($i >= 2)
                                  {!! trans('global.quimera_travel_room_') !!}
                                @endif
                                </option>
                            @endfor
                        </select>
                        {!! Form::hidden('nro-quartos-do-hotel', 0) !!}
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cotacao-hospedagem-adicionais" class="row margin-t-1">
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-12 col-lg-12">
                        <strong>
                          {!! trans('global.lbl_extra_hosting') !!}?
                        </strong>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('hospedagem-adicional-cafe', 0) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_breakfast_included') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-wifi', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_wifi') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-ar-condicionado', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_air_conditioning') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-tv-cabo', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_tv_cable') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-cancelamento', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_cancellation') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-animal', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pet_') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-piscina', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pool') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-academia', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_gym') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-estacionamento', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_parking') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-banheiro-privativo', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_privative_bathroom') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-varanda', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_balcony') !!}</span>
                        </p>
                        <p>
                        {!! Form::checkbox('hospedagem-adicional-translado', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_shuttle') !!}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cotacao-hospedagem-bairro" class="row margin-t-1">
                  <div clas="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-12 col-lg-12">
                        <div class="col-md-3 col-lg-3">
                          {!! Form::label('hospedagem-bairro-regiao-preferencia', trans('global.lbl_neighborhood_preferred_region'), null, ['class' => 'form-control']) !!} :
                        </div>
                        <div class="col-md-3 col-lg-3">{!! Form::text('hospedagem-bairro-regiao-preferencia', null, ['class' => 'form-control']) !!}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cotacao-hospedagem-adicional" class="row margin-t-1">
                  <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-12 col-lg-12">
                        <a href="#">
                          <i class="fa fa-plus-circle laranja"></i><span class="ajuste-fonte-avenir-medium laranja"> {!! trans('global.lbl_like_to_add_more_information') !!}?</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-12 col-lg-12">
                        {!! Form::textarea('hospedagem-informacoes-adicionais', null, ['class' => 'form-control', 'rows' => '10', 'placeholder' => trans('global.lbl_like_to_add_more_information'), 'style' => 'resize:none']) !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="cotacao-carros" data-value="0" class="hidden">
                <hr class="divisoria"/>
                <div id="cotacao-carros-titulo" class="row margin-t-2">
                  <div class="col-md-12 col-lg-12 text-center">
                    <h5 class="titulo-secao">{!! trans('global.wannatravel_trip_drive') !!}</h5>
                  </div>
                </div>
              </div>
              <div id="cotacao-enviar">
                <div class="row margin-t-4">
                  <div class="col-md-12 col-lg-12 text-center">
                    {!! Form::submit(trans('global.lbl_submit'), ['class' => 'btn btn-primario btn-acao']) !!}
                  </div>
                </div>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
