<?php
  $emailTitulo = 'A experiência do(a) <strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong><br>tem uma nova inscrição';
?>
@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Nova Inscrição na Experiência',
  'emailTitulo' => $emailTitulo
])

  @section('email-experiencia-conteudo')
    {{-- SEÇÃO de DADOS do USUÁRIO INSCRITO --}}
    @include('emails.experiencias._info-inscricao-plataforma-dados-candidato', [
      'Inscricao' => $Inscricao
    ])

    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-plataforma', [
      'Experiencia' => $Inscricao->experiencia
    ])
  @stop
