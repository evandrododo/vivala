<div class="col-lg-12 fundo-cinza-com-borda padding-t-1 margin-b-2">

    {{-- Seção TROCAR FOTO da INSTITUIÇÃO/EMPRESA responsável pela experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
        {{-- Aqui insiro o input hidden que guardará o id da foto associada ao owner da experiencia --}}
        {!!
            Form::hidden('owner-experiencia-foto-id',
                isset($experiencia) ? ($experiencia->fotoOwner ?  $experiencia->fotoOwner->id : '') : '',
                ['id' => 'owner-experiencia-foto-id'])
        !!}

        {{-- Aqui insiro o input hidden que guardará o path da foto associada ao owner da experiencia (para caso erre o form) --}}
        {!!
            Form::hidden('owner-experiencia-foto-path',
                isset($experiencia) ? ($experiencia->fotoOwner ?  $experiencia->fotoOwner->path : '') : '',
                ['id' => 'owner-experiencia-foto-path'])
        !!}

        {{-- Incluindo o conjunto (foto / botao troca foto), que dispara a modal contendo o form de trocar foto por ajax --}}
        @include('experiencias._owner_fotoform')
    </div>
    {{-- Fim da Seção TROCAR FOTO da INSTITUIÇÃO/EMPRESA responsável pela experiência --}}

    {{-- Seção de SELEÇÃO da INSTITUIÇÃO/EMPRESA RESPONSÁVEL pela experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
        <div class="row">
          <div class="col-lg-9">
            {!! Form::label('ong_select', 'Instituição/Empresa responsável') !!}
            <span class="campo-obrigatorio">* Obrigatório</span>
          </div>
          <div class="col-lg-3 text-right">
            <table class="col-lg-6 col-lg-offset-6 text-right">
              <td><abbr title="Esse é o campo que identifica a Instituição/Empresa que será responsável por esta experiência dentro da plataforma."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
            </table>
          </div>
          <div class="col-lg-12">
            {!! Form::select('projeto', $ongs, (isset($experiencia) ? $experiencia->owner->id : []), ['id' => 'ong_select', 'class' => 'form-control', 'required' => 'required']) !!}
          </div>
        </div>
    </div>
    {{-- Fim da Seção de SELEÇÃO da INSTITUIÇÃO/EMPRESA RESPONSÁVEL pela experiência --}}

    {{-- Seção NOME do PROJETO RESPONSÁVEL pela experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-9">
          {!! Form::label('owner_nome', 'Nome do Projeto responsável') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-3 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Nome do Projeto da Instituição/Empresa que será veiculado como responsável pela experiência."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
            <td><a href="#"><i class='fa fa-2x fa-desktop'></i></a></td>
            <td><a href="#"><i class='fa fa-2x fa-mobile'></i></a></td>
          </table>
        </div>
        <div class="col-lg-12">
          {!! Form::text('owner_nome', null, ['placeholder' => 'Ex: Vivalá', 'class' => 'form-control', 'required' => 'required']) !!}
        </div>
      </div>
    </div>
    {{-- Fim da NOME do PROJETO RESPONSÁVEL pela experiência --}}

    {{-- Seção de DESCRIÇÃO DA INSTITUIÇÃO/EMPRESA responsável (enviada no email) pela experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-9">
          {!! Form::label('descricao-instituicao', 'Descrição da Instituição/Empresa responsável') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-3 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Descrição da Empresa/Instituição responsável que está promovendo a experiência."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
            <td><a href="#"><i class='fa fa-2x fa-desktop'></i></a></td>
            <td><a href="#"><i class='fa fa-2x fa-mobile'></i></a></td>
          </table>
        </div>
        <div class="col-lg-12">
          {!! Form::textarea('owner_descricao', null, ['id'=>'descricao-instituicao', 'placeholder'=> 'Ex: A Vivalá é uma plataforma global que conecta pessoas que têm interesse em viajar e transformar o Brasil. [...]', 'class' => 'form-control sem-resize sem-upper', 'required' => 'required', 'rows' => 2]) !!}
        </div>
      </div>
    </div>
    {{-- Fim da Seção de DESCRIÇÃO DA INSTITUIÇÃO/EMPRESA responsável (enviada no email) pela experiência --}}

    {{-- Seção TROCAR FOTO da experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
        {{-- Aqui insiro o input hidden que guardará o id da foto associada á experiencia --}}
        {!!
            Form::hidden('experiencia-foto-id',
               isset($experiencia) ? ($experiencia->fotoCapa ?  $experiencia->fotoCapa->id : '') : '',
               ['id' => 'experiencia-foto-id'])
        !!}

        {{-- Aqui insiro o input hidden que guardará o path da foto associada á experiencia --}}
        {!!
            Form::hidden('experiencia-foto-path',
               isset($experiencia) ? ($experiencia->fotoCapa ?  $experiencia->fotoCapa->path : '') : '',
               ['path' => 'experiencia-foto-path'])
        !!}

        {{-- Incluindo o conjunto (foto / botao troca foto), que dispara a modal contendo o form de trocar foto por ajax --}}
        @include('experiencias._fotoform')
    </div>
    {{-- Fim da Seção TROCAR FOTO da experiência --}}

    {{-- Seção CIDADE/LOCAL da experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-9">
          {!! Form::label('campo-autocomplete-cidades', 'Cidade da Experiência') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-3 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Cidade/Local onde a experiência será realizada. Escreva uma cidade brasileira onde a experiência será realizada e espere a lista aparecer, selecione a cidade desejada."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
          </table>
        </div>
        <div class="col-lg-12">
          <input id="campo-autocomplete-cidades" autocomplete="off" class="form-control autocomplete-cidades-ativo" type="text" placeholder="Ex: São Paulo" value="{{ isset($experiencia) ? $experiencia->local->nome : "" }}" required="required"/>
          <input id="campo-autocomplete-cidades-hidden" name="cidade" autocomplete="off" type="hidden" value="{{ isset($experiencia) ? $experiencia->local->id : "" }}">
          <i class="fa fa-spin fa-spinner loading-search soft-hide laranja"></i>
        </div>
      </div>
    </div>
    {{-- Fim da Seção CIDADE/LOCAL da experiência --}}

    {{-- Seção ENDEREÇO da experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-9">
          {!! Form::label('endereco_completo', 'Endereço Completo da Experiência') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-3 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Endereço Completo onde a experiência será realizada, seja bem específico usando as nomenclaturas rua/avenida/etc, especifique o número do endereço e tente separar os itens por vírgula ou traço."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
          </table>
        </div>
        <div class="col-lg-12">
          {!! Form::text('endereco_completo', null, ['placeholder' => 'Ex: Rua do Rócio, 52, CJ 122, Vila Olímpia, São Paulo - SP', 'class' => 'form-control', 'required' => 'required']) !!}
        </div>
      </div>
    </div>
    {{-- Fim da Seção ENDEREÇO da experiência --}}

    {{-- Seção DESCRIÇÃO NA LISTAGEM da experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-9">
          {!! Form::label('experiencia-descricao-listagem', 'Descrição na Listagem da Experiência (máx: 85 caracteres)') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-3 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="A Descrição na Listagem da experiência é a descrição que aparece na lista de todas as esperiências, é menor em caracteres e uma espécie de chamada, portanto deve ser sucinta e direta para atrair a atenção do usuário para a experiência."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
            <td><a href="#" data-toggle="modal" data-target="#modal-tutoriais-internos-experiencias-desktop-descricaolistagem"><i class='fa fa-2x fa-desktop'></i></a></td>
            <td><a href="#" data-toggle="modal" data-target="#modal-tutoriais-internos-experiencias-mobile-descricaolistagem"><i class='fa fa-2x fa-mobile'></i></a></td>
          </table>
        </div>
        <div class="col-lg-12">
          {!! Form::textarea("descricao_na_listagem", null, ['id'=>'experiencia-descricao-listagem', 'rows' => 3, 'maxlength' => 85, 'title'=> 'Descrição na Listagem', 'placeholder'=> 'Descrição na listagem', 'onkeyup' => 'contadorDescListagem(event)', 'onchange' => 'contadorDescListagem(event)', 'class' => 'form-control sem-resize sem-upper', 'required' => 'required']) !!}
          <div class="row margin-t-0-5 margin-r-0 text-right">
            <span id="experiencia-contador-descricao-listagem"></span>
          </div>
        </div>
      </div>
    </div>
    {{-- Fim da Seção DESCRIÇÃO NA LISTAGEM da experiência --}}

    {{-- Seção DESCRIÇÃO COMPLETA da experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-9">
          {!! Form::label('experiencia-descricao-cheia', 'Descrição Completa da Experiência (máx: 420 caracteres)') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-3 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Descrição completa da experiência, deve passar ao usuário tudo que ele está adquirindo, deve conter detalhadamente todo o 'produto' e também ser um texto atrativo/agradável e ao mesmo tempo não cansativo."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
            <td><a href="#"><i class='fa fa-2x fa-desktop'></i></a></td>
            <td><a href="#"><i class='fa fa-2x fa-mobile'></i></a></td>
          </table>
        </div>
        <div class="col-lg-12">
          {!! Form::textarea('descricao', null, ['id'=>'experiencia-descricao-cheia', 'rows' => 3, 'maxlength' => 420, 'title'=> 'Descrição completa da experiência', 'placeholder'=> 'Descrição', 'onkeyup' => 'contadorDescCheia(event)', 'onchange' => 'contadorDescCheia(event)', 'class' => 'form-control sem-resize sem-upper', 'required' => 'required']) !!}
          <div class="row margin-t-0-5 margin-r-0 text-right">
            <span id="experiencia-contador-descricao-cheia"></span>
          </div>
        </div>
      </div>
    </div>
    {{-- Fim da Seção DESCRIÇÃO COMPLETA da experiência --}}

    {{-- Seção DETALHES da experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-9">
          {!! Form::label('detalhes', 'Detalhes da Experiência (máx: xx caracteres)') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-3 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Detalhes da Experiência"><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
            <td><a href="#"><i class='fa fa-2x fa-desktop'></i></a></td>
            <td><a href="#"><i class='fa fa-2x fa-mobile'></i></a></td>
          </table>
        </div>
        <div class="col-lg-12">
          {!! Form::textarea('detalhes', null, ['id'=>'detalhes', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize sem-upper', 'rows' => 3, 'required' => 'required']) !!}
        </div>
      </div>
    </div>
    {{-- Fim da Seção DETALHES da experiência --}}

    {{-- Seção PREÇO da experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-9">
          {!! Form::label('experiencia-valor', 'Preço da Experiência (em R$)') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-3 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Preço/Valor da experiência que será realizada, use ponto para separar valores em centavos e vírgula para valores em reais. Exemplo: 1 mil, 368 reais e 96 centavos (1,368.96)."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
          </table>
        </div>
        <div class="col-lg-12">
          {!! Form::text('preco', null, ['id' => 'experiencia-valor', 'placeholder' => 'Ex: 24.99', 'class' => 'form-control', 'required' => 'required']) !!}
        </div>
      </div>
    </div>
    {{-- Fim da Seção PREÇO da experiência --}}

    {{-- Seção de INFORMAÇÕES EXTRAS da experiência --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
        {!! Html::decode(Form::label('', 'Informações Extras da Experiência', ['class' => 'row col-sm-12'])) !!}
        <ul id="informacoes-container">
            @if (isset($experiencia))
            @foreach ($experiencia->informacoes as $informacao)
                @include('experiencias._form_extra_item', ['informacao' => $informacao])
            @endforeach
            @endif

            {{-- Botao de adicionar novas Informacoes --}}
            <li class="col-xs-12 margin-b-1 container-campos-fontawesome">
                <div class="col-xs-11"></div>
                <div class="col-xs-1 text-center">
                        <a href="#" onclick="adicionaInfoExperiencia(event)">
                            <i class="fa fa-2x fa-plus margin-t-1" ></i>
                            <i class="fa fa-2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                        </a>
                </div>
            </li>

        </ul>
    </div>
    {{-- Fim da Seção de INFORMAÇÕES EXTRAS da experiência --}}

    {{-- Seção do TIPO da experiência --}}
    <div class="col-lg-6 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-8">
          {!! Form::label('tipo-evento-unico', 'Tipo da Experiencia') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-4 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Tipo da Experiencia baseado em sua frequência."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
          </table>
        </div>
        <div class="col-lg-12">
          <span> {!! Form::radio("tipo","evento_unico", false, ['id' => 'tipo-evento-unico', 'required' => 'required']) !!}  Evento único &nbsp;</span>
          <span> {!! Form::radio("tipo","evento_recorrente", false, ['id' => 'tipo-evento-recorrente']) !!}  Evento recorrente &nbsp;</span>
          <span> {!! Form::radio("tipo","evento_servico", false, ['id' => 'tipo-evento-servico']) !!}  Evento recorrente (Serviço) &nbsp;</span>
        </div>
      </div>
    </div>
    {{-- Fim da Seção do TIPO da experiência --}}

    {{-- Seção da FREQUÊNCIA da experiência --}}
    <div class="col-lg-6 margin-t-1 margin-b-1">
      <div class="row">
        <div class="col-lg-8">
          {!! Form::label('experiencia-frequencia', 'Frequência da experiência') !!}
          <span class="campo-obrigatorio">* Obrigatório</span>
        </div>
        <div class="col-lg-4 text-right">
          <table class="col-lg-6 col-lg-offset-6 text-right">
            <td><abbr title="Texto que aparecerá na secao Data nos detalhes da experiencia"><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
            <td><a href="#"><i class='fa fa-2x fa-desktop'></i></a></td>
            <td><a href="#"><i class='fa fa-2x fa-mobile'></i></a></td>
          </table>
        </div>
        <div class="col-lg-12">
        {!! Form::text('frequencia', null, ['id' => 'experiencia-frequencia', 'placeholder' => 'Ex: Segunda á Sexta', 'class' => 'form-control', 'required' => 'required']) !!}
        </div>
      </div>
    </div>
    {{-- Fim da Seção da FREQUÊNCIA da experiência --}}

    {{-- Secao das datas que irao ocorrer a experiencia --}}
    <div class="col-lg-12 margin-t-1 margin-b-1">
        {!! Form::label('', 'Próximas Datas', ['class' => 'row col-sm-12']) !!}
        <ul id="data-ocorrencia-container">
            @if (isset($experiencia))
            @foreach ($experiencia->ocorrencias as $dataOcorrencia)
                @include('experiencias._form_data_ocorrencia', ['dataOcorrencia' => $dataOcorrencia])
            @endforeach
            @endif

            {{-- Botao de adicionar novas datas --}}
            <li class="col-xs-12 margin-b-1 container-datas-ocorrencia">
                <div class="col-xs-11"></div>
                <div class="col-xs-1 text-center">
                        <a href="#" onclick="adicionaDataOcorrenciaExperiencia(event)">
                            <i class="fa fa-2x fa-plus margin-t-1" ></i>
                            <i class="fa fa-2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                        </a>
                </div>
            </li>

        </ul>
    </div>

    {{-- Seção das CATEGORIAS da experiência --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
        <label class="row col-xs-12">Categorias</label>
        @foreach ($Categorias as $categoria)
            <label class="col-xs-3">
                <input type="checkbox" name="categoria[]"
                    value="{{ $categoria->id }}"
                    @if (isset($experiencia) && !$experiencia->categorias->isEmpty() && $experiencia->categorias->find($categoria->id) )
                        checked="true"
                    @endif
                    ><span> {{ $categoria->nome }}</span>
            </label>
        @endforeach
    </div>
    {{-- Fim da Seção das CATEGORIAS da experiência --}}

    {{-- Seção do botão ENVIAR do FORMULÁRIO --}}
    <div class="col-lg-12 text-right margin-b-1 margin-t-1">
      {!! Form::submit($textBtnSubmit, ['class' => 'btn btn-acao']) !!}
    </div>
    {{-- Fim da Seção do botão ENVIAR do FORMULÁRIO --}}

    {{-- Inclusão de todos os MODALS do tutorial --}}
    @include('modals.tutoriais-internos.experiencias.desktop._formdescricaonalistagem')
    @include('modals.tutoriais-internos.experiencias.mobile._formdescricaonalistagem')
    {{-- Fim da Inclusão de todos os MODALS do tutorial --}}

</div>
