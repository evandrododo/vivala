<!DOCTYPE html>
<html>
  <head>
    <title>{{ trans('global.title_vivala') }} - {{ isset($emailCabecalho) ? $emailCabecalho : '[ERRO] Cabeçalho não encontrado'  }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
      @import url('https://vivala.com.br/fonts/avenir/avenir.css');
      @import url('https://vivala.com.br/fonts/futura/futura.css');
      @font-face {
        font-family: 'Avenir Light';
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.eot');
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.woff') format('woff'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.svg#Avenir-Light') format('svg');
      }
      @font-face{
        font-family: 'Avenir Medium';
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.eot');
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.woff') format('woff'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.svg#Avenir-Medium') format('svg');
      }
      @font-face{
        font-family: 'Avenir Roman';
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.eot');
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.woff') format('woff'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.svg#Avenir-Roman') format('svg');
      }
      @font-face{
        font-family: 'Avenir Black';
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.eot');
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.woff') format('woff'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.svg#Avenir-Black') format('svg');
      }
      @font-face{
        font-family: 'FuturaBT Bold';
        src: url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/Futura-BTBold.eot');
        src: url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/Futura-BTBold?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.woff') format('woff'),
        url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.svg#FuturaBT-Bold') format('svg');
      }
    </style>
    <link href='https://vivala.com.br/fonts/avenir/avenir.css' rel='stylesheet' type='text/css'>
    <link href='https://vivala.com.br/fonts/futura/futura.css' rel='stylesheet' type='text/css'>
  </head>
  
  <!-- Início do BODY -->
  <body bgcolor="#ECEBEB" style="font-size: 100%; line-height: 1.6em; margin:0; padding:0; -webkit-font-smoothing:antialiased; height: 100%; -webkit-text-size-adjust:none; width: 100%!important;">
    
    <!-- CORPO TOTAL do Email -->
    <table bgcolor="#ECEBEB" style="padding:20px 20px 0 20px; width:100%;">
      <tbody>
        <tr>

          <!-- Cabeçalho da Vivalá -->
          <td bgcolor="#F06F37" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:25px 30px 30px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;">
                <tbody>
                  <!-- Logo da VIVALÁ -->
                  <tr align="center">
                    <td align="center" style="text-align:center;">
                      <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank">
                        <img src="{{ asset('logo-branco.png') }}" alt="{{ trans('global.alt_vivala') }}" title="{{ trans('global.title_vivala') }}" border="0" min-width="107px" width="auto" max-width="600px" min-height="59px" height="59px" max-height="59px" style="display:block; margin:auto;">
                      </a>
                    </td>
                  </tr>
                  <!-- Fim do Logo da VIVALÁ -->
                  <!-- Separador -->
                  <tr align="center">
                    <td align="center" style="text-align:center;">
                      <p style="border-bottom:1px solid #FFFFFF; width:250px; margin:10px auto;"></p>
                    </td>
                  </tr>
                  <!-- Fim do Separador -->
                  <!-- Título do EMAIL -->
                  @if($emailTitulo)
                  <tr align="center">
                    <td align="center" style="text-align:center;">
                      <h1 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:23px; font-weight:normal; color:#FFFFFF; margin:40px 0 10px; margin-top:0; line-height:40px;">
                        {!! isset($emailTitulo) ? $emailTitulo : '[ERRO] TÍTULO do email não encontrado!' !!}
                      </h1>
                    </td>
                  </tr>
                  @endif
                  <!-- Fim do Título do EMAIL -->
                </tbody>
              </table>
            </div>
          </td>
          <!-- Fim do Cabeçalho da Vivalá -->

          <!-- Divisor -->
          <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:0px 30px;">
            <tr></tr>
          </td>
          <!-- Fim do Divisor -->

          <!-- CORPO TÍTULO do Email -->
            @yield('email-experiencia-cabecalho')
          <!-- Fim do CORPO TÍTULO do Email -->


          <!-- CORPO MIOLO do Email -->
            @yield('email-experiencia-conteudo')
          <!-- Fim do CORPO MIOLO do Email -->

          <!-- Seção ENVIE SUA DÚVIDA  -->
          <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%; padding-bottom:0; margin-top:20px;">
                <tbody>
                  <tr align="center">
                    <td align="center" style="text-align:center;">
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; margin-top:10px;">
                        Caso tenha ficado alguma dúvida, fale com a gente pelo
                        <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="text-decoration:none; color:#F06F37;">contato@vivala.com.br</a>
                      <p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
          <!-- Fim da Seção ENVIE SUA DÚVIDA  -->

          <!-- ASSINATURA do Email -->
          <td bgcolor="#ECEBEB" style="clear:both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:15px 30px 15px 30px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;">
                <tbody>
                  <tr align="center" style="text-align:center;">
                    <td width="35%" style="width=35%;"></td>
                    <td align="center" width="6%" style="text-align:center;width:6%;">
                      <div style="width:30px; height:30px;">
                        <a href="{{ env('VIVALA_LINK_FACEBOOK') }}" target="_blank" alt="{{ trans('global.social_network_facebook_img_alt') }}" title="{{ trans('global.social_network_facebook_img_title') }}" style="color:transparent; width:100%; height:100%;">
                          <img src="{{ asset('img/icones/png/colorido-fb-circulo.png') }}" min-width="29px" width="29px" max-width="29px" min-height="29px" height="29px" max-height="29px"/>
                        </a>
                      </div>
                    </td>
                    <td align="center" width="6%" style="text-align:center;width:6%;">
                      <div style="width:30px; height:30px;">
                        <a href="{{ env('VIVALA_LINK_INSTAGRAM') }}" target="_blank" alt="{{ trans('global.social_network_instagram_img_alt') }}" title="{{ trans('global.social_network_instagram_img_title') }}" style="color:transparent; width:100%; height:100%;">
                          <img src="{{ asset('img/icones/png/colorido-ig-circulo.png') }}" min-width="29px" width="29px" max-width="29px" min-height="29px" height="29px" max-height="29px"/>
                        </a>
                      </div>
                    </td>
                    <td align="center" width="6%" style="text-align:center;width:6%;">
                      <div style="width:30px; height:30px;">
                        <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank" alt="{{ trans('global.alt_vivala') }} {{ trans('global.lbl_site') }}" title="{{ trans('global.title_vivala') }} {{ trans('global.lbl_site') }}" style="color:transparent; width:100%; height:100%;">
                          <img src="{{ asset('img/icones/png/colorido-vivala-circulo.png') }}" min-width="29px" width="29px" max-width="29px" min-height="29px" height="29px" max-height="29px"/>
                        </a>
                      </div>
                    </td>
                    <td align="center" width="6%" style="text-align:center;width:6%;">
                      <div style="width:30px; height:30px;">
                        <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" alt="{{ trans('global.alt_vivala') }} {{ trans('global.lbl_email') }}" title="{{ trans('global.title_vivala') }} {{ trans('global.lbl_email') }}" style="color:transparent; width:100%; height:100%;">
                          <img src="{{ asset('img/icones/png/colorido-email-circulo.png') }}" min-width="29px" width="29px" max-width="29px" min-height="29px" height="29px" max-height="29px"/>
                        </a>
                      </div>
                    </td>
                    <td align="center" width="6%" style="text-align:center;width:6%;">
                      <div style="width:30px; height:30px;">
                        <a href="{{ env('VIVALA_LINK_LINKEDIN') }}" target="_blank" alt="{{ trans('global.social_network_linkedin_img_alt') }}" title="{{ trans('global.social_network_linkedin_img_title') }}" style="color:transparent; width:100%; height:100%;">
                          <img src="{{ asset('img/icones/png/colorido-in-circulo.png') }}" min-width="29px" width="29px" max-width="29px" min-height="29px" height="29px" max-height="29px"/>
                        </a>
                      </div>
                    </td>
                    <td width="35%" style="width=35%;"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
          <!-- Fim da ASSINATURA do Email -->

        </tr>
      </tbody>
    </table>
    <!-- Fim do CORPO TOTAL -->

    <!-- RODAPÉ -->
    <table style="clear:both!important; padding:0px 20px 0 20px; width: 100%;">
      <tbody>
        <tr>
          <td style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:0 30px 20px 30px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;" width="100%">
                <tbody>
                  <tr align="center">
                    <td align="center" style="text-align:center;">
                      <h4 style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:10px; font-weight:200; line-height:1.2em; margin-top:0;">
                        Feito com carinho pela Vivalá - Conheça o mundo à sua maneira
                      </h4>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- Fim do RODAPÉ -->

  </body>
  <!-- Fim do BODY -->
</html>
