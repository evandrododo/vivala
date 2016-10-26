<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0;">
      <tbody>
        <!-- Seção DETALHES DA EXPERIÊNCIA -->
        <tr>
          <td>
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Resumo da Experiência
            </h3>
          </td>
        </tr>
        <tr>
          <td>
            <p style="float:left; margin-right:20px;">
              <img src="{{ $Inscricao->experiencia->FotoCapaUrlPublica }}" min-width="220px" width="auto" max-width="600px" min-height="220px" height="220px" max-height="220px"/>
            </p>
            <p style="margin-top:10px; margin-bottom:10px; text-align: center;">
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bold; color:#F06F37; line-height:1.2em; padding-right: 10px;">
                {{ mb_strtoupper(trim($Inscricao->experiencia->nome)) }}
              </span>
            </p>
            <p>
              <img src="{{ asset('/img/icones/png/cinza-calendario-certo.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top; padding-right:5px;" min-width="24px" width="24px" max-width="24px" min-height="224px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:200; color:#545454; line-height:1em; vertical-align:middle;">
                <strong>{{ trim($Inscricao->dataExperiencia->format('d/m/Y')) }}</strong>
              </span>
            </p>
            <p>
              <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.lbl_localization') }}" title="{{ trans('global.lbl_localization') }}" style="vertical-align:top; padding-right:6px; padding-left:3px;" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" max-height="20px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; vertical-align:middle;">
                <strong>{{ ucfirst(trim($Inscricao->experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Inscricao->experiencia->local->estado->sigla)) }}</strong>
              </span>
            </p>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
              {{ trim($Inscricao->experiencia->descricao) }}
            </p>
          </td>
        </tr>
        <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
        <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <tr>
          <td style="padding-bottom:10px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Detalhes
            </h3>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
              {{ trim($Inscricao->experiencia->detalhes) }}
            </p>
          </td>
        </tr>
        <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <!-- Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
        <tr>
          <td>
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Informações Extras
            </h3>
          </td>
        </tr>
        <tr>
          <td>
            <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
              <img src="{{ asset('img/icones/png/cinza-calendario.png') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
            </p>
            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; margin-top:5px; margin-bottom:0px;">
              {{ ucfirst(strtolower(trim($Inscricao->experiencia->frequencia))) }}
            </p>
          </td>
        </tr>
        @if(!empty($Inscricao->experiencia->informacoes))
          @foreach($Inscricao->experiencia->informacoes as $Informacao)
            <tr>
              <td>
                <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
                  <img src="{{ $Informacao->PathIconePNG }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                </p>
                <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; margin-top:5px; margin-bottom: 5px;">
                  {{ ucfirst(strtolower(trim($Informacao->descricao))) }}
                </p>
              </td>
            </tr>
          @endforeach
        @endif
        <!-- Fim da Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
      </tbody>
    </table>
  </div>
</td>
