<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0; margin-top:0;">
      <tbody>

        <!-- Seção RESUMO DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table style="width:100%; padding-bottom:0; margin-top:0;">
              <tbody>
                <tr>
                  <td style="padding:0px; margin:0px;">
                    <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin:0px; padding:0px; margin-bottom:10px;">
                      Resumo da Experiência
                    </h3>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table style="width:100%" width="100%">
                      <tbody>
                        <tr valign="top" style="vertical-align:top;">
                          <td>
                            <table style="width:35%" width="35%">
                              <tbody>
                                <tr>
                                  <td>
                                    <table style="width:100%" width="100%">
                                      <tbody>
                                        <!-- FOTO DA EXPERIÊNCIA -->
                                        <tr valign="bottom" style="vertical-align:bottom;">
                                          <td style="padding:0px;">
                                            <img src="{{ $Experiencia->FotoCapaUrlPublica }}" min-width="240px" width="auto" max-width="240px" min-height="240px" height="240px" max-height="240px" style="padding:0px; margin:0px; vertical-align:bottom;"/>
                                          </td>
                                        </tr>
                                        <!-- Fim da FOTO DA EXPERIÊNCIA -->
                                        <!-- ID DA EXPERIÊNCIA -->
                                        <tr>
                                          <td style="padding:0px;">
                                            <p style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:19px; font-weight:bold; color:#FFFFFF; background-color:#F06F37; padding: 4px 15px; margin:0px; text-align:center;" title="ID da Experiência">
                                                ID {{ str_pad(trim($Experiencia->id), 3, '0', STR_PAD_LEFT) }}
                                            </p>
                                          </td>
                                        </tr>
                                        <!-- Fim do ID DA EXPERIÊNCIA -->
                                      </tbody>                
                                    </table>
                                  </td>  
                                </tr>
                              </tbody>
                            </table>
                          </td>
                          <td>
                            <table style="width:100%" width="100%">
                              <tbody>
                                <tr>
                                  <td width="100%" style="width:100%;">
                                    <table style="width:100%" width="100%">
                                      <tbody>
                                        <!-- NOME DA EXPERIÊNCIA -->
                                        <tr>
                                          <td>
                                            <p style="margin-top:0px; margin-bottom:10px; text-align:left; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bold; color:#F06F37; line-height:1em;">
                                                {{ mb_strtoupper(trim($Experiencia->nome), 'utf-8') }}
                                            </p>
                                          </td>
                                        </tr>
                                        <!-- Fim do NOME DA EXPERIÊNCIA -->
                                        <!-- TIPO -->
                                        <tr style="line-height:0.8em;">
                                          <td>
                                            <table style="width:100%; table-layout:fixed;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:10%; text-align:left;" width="10%">
                                                    <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                                                  </td>
                                                  <td style="width:85%; text-align: left;" width="85%">
                                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1em; padding:0px; margin:0px;">
                                                      TIPO
                                                    </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <table style="width:100%; table-layout:fixed; margin-bottom:5px;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:100%" width="100%">
                                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1em; margin:0px; padding:0px;">
                                                      @if($Experiencia->isEventoUnico)
                                                        Evento Único
                                                      @elseif ($Experiencia->isEventoRecorrente)
                                                        Evento Recorrente
                                                      @elseif ($Experiencia->isEventoServico)
                                                        Evento Serviço
                                                      @endif
                                                    </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                        <!-- Fim do TIPO -->
                                        <!-- LOCAL -->
                                        <tr style="line-height:0.8em;">
                                          <td>
                                            <table style="width:100%; table-layout:fixed;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:10%; text-align:left;" width="10%">
                                                    <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                                                  </td>
                                                  <td style="width:85%; text-align: left;" width="85%">
                                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1em; padding:0px; margin:0px;">
                                                      LOCAL
                                                    </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <table style="width:100%; table-layout:fixed; margin-bottom:5px;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:100%" width="100%">
                                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1em; margin:0px; padding:0px;">
                                                      {{ ucwords(mb_strtolower(trim($Experiencia->local->nome), 'utf-8')) }} - {{ mb_strtoupper(trim($Experiencia->local->estado->sigla), 'utf-8') }}
                                                    </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                        <!-- Fim do LOCAL -->
                                        <!-- ENDEREÇO -->
                                        <tr style="line-height:0.8em">
                                          <td>
                                            <table style="width:100%; table-layout:fixed;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:10%; text-align:left;" width="10%">
                                                    <img src="{{ asset('/img/icones/png/cinza-streetview.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                                                  </td>
                                                  <td style="width:85%; text-align:left;" width="85%">
                                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1em; padding:0px; margin:0px;">
                                                      ENDEREÇO
                                                    </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <table style="width:100%; table-layout:fixed; margin-bottom:5px;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:100%; text-align: left;" width="100%">
                                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1em; margin:0px; padding:0px;">
                                                      {{ ucwords(mb_strtolower(trim($Experiencia->endereco_completo), 'utf-8')) }}
                                                    </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                        <!-- Fim do ENDEREÇO -->
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção RESUMO DA EXPERIÊNCIA -->
        
        <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table>
              <tbody>
                <tr style="padding-bottom:10px;">
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
                              Descrição
                            </h3>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
                              {{ trim($Experiencia->descricao) }}
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->

        <!-- Seção DETALHES DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table>
              <tbody>
                <tr style="padding-bottom:10px;">
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
                              Detalhes
                            </h3>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
                              {{ trim($Experiencia->detalhes) }}
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->

        <!-- Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table>
              <tbody>
                <tr style="padding-bottom:0px;">
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
                              Informações Extras
                            </h3>
                          </td>
                        </tr>                        
                        <tr style="line-height:1em;">
                          <td>
                            <table>
                              <tbody>
                                @if($Experiencia->frequencia)
                                  <tr valign="middle" style="vertical-align:middle;">
                                    <td style="padding:0px;">
                                      <img src="{{ asset('img/icones/png/cinza-calendario.png') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px" style="margin-top:0px; margin-bottom:5px; margin-right:20px;"/>
                                    </td>
                                    <td style="padding:0px;">
                                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; padding-bottom:5px; margin-top:0px; margin-bottom:0px;">
                                        {{ ucfirst(mb_strtolower(trim($Experiencia->frequencia), 'utf-8')) }}
                                      </p>
                                    </td>
                                  </tr>
                                @endif
                                @if($Experiencia->informacoes)
                                  @foreach($Experiencia->informacoes as $Informacao)
                                  <tr valign="middle" style="vertical-align:middle;">
                                    <td>
                                      <img src="{{ $Informacao->PathIconePNG }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px" style="margin-top:0px; margin-bottom:5px; margin-right:20px;"/>
                                    </td>
                                    <td>
                                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; padding-bottom:5px; margin-top:0px; margin-bottom:0px;">
                                        {{ ucfirst(mb_strtolower(trim($Informacao->descricao), 'utf-8')) }}
                                      </p>
                                    </td>
                                  </tr>
                                  @endforeach
                                @endif
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>   
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA -->

      </tbody>
    </table>
  </div>
</td>
