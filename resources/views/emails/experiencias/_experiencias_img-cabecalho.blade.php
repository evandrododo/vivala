<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px; border: 2px solid @if($expCorTextos) {{ $expCorTextos }} @else '#FFF' @endif;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0;">
      <tbody>
        <!-- Título da Primeira Estrutura -->
        @if(!empty($expTextoCima))
        <tr align="center">
          <td>
            <h1 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-weight:bold; font-size:31px; color:@if($expCorTextos) {{ $expCorTextos }} @else '#FFF' @endif; margin-top:40px; margin-bottom:40px;">
              {!! $expTextoCima !!}
            </h1>
          </td>
        </tr>
        @endif
        <!-- Fim do Título da Primeira Estrutura -->
        <!-- Imagem da Primeira Estrutura -->
        <tr align="center">
          <td>
            <img src="{{ asset($expLinkImagem) }}" alt="{{ $expAltImagem }}" title="{{ $expTitleImagem }}" min-width="99px" width="auto" max-width="600px" min-height="150px" height="150px" max-height="150px"/>
          </td>
        </tr>
        <!-- Fim da Imagem da Primeira Estrutura -->
        <!-- Seção de INFOS BANCÁRIAS -->
        <!-- Sub-título da Primeira Estrutura -->
        <tr align="center">
          <td>
            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:22px; color:@if($expCorTextos) {{ $expCorTextos }} @else '#FFF' @endif; margin-top:40px; margin-bottom:40px;">
              {!! $expTextoBaixo !!}
            </p>
          </td>
        </tr>
        <!-- Fim do Sub-título da Primeira Estrutura -->
      </tbody>
    </table>
  </div>
</td>
