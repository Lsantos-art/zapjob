@extends('layout.site')
@section('title', 'Zap Job - Empregos')


@section('content')
<div class="col-md-12">
    <div class="card card-chart">
      <div class="card-header card-header-info">

      </div>
      <div class="card-body">
        <h4 class="card-title">Torne seu processo seletivo mais rápido, flúido e eficaz!</h4>
        <p class="card-category">"Para mudar, basta começar!"</p>
      </div>
      <div class="container">
            <h2 class="">Nossa visão</h2>
            <p>
              Temos o anseio de tornar seu processo
              seletivo ou sua contratação bem mais simples, rápida e
              intuitiva. A maioria dos sites trazem excesso de textos e
              informações desnecessárias, e no momento de copiar o
              e-mail para entrar em contato com o anunciante, sempre se
              encontram dificuldades como bloqueios de copia e cola,
              bloqueios de links, etc... aqui não temos nada disso.
              Nosso objetivo é trazer clareza e fluidez neste processo
              que é tão importante tanto para empresas, quanto para
              quem procura por uma vaga no mercado de trabalho.
            </p>
            <h2 class="">Nossa missão</h2>
            <p>
                Fundamos este site com intuito de facilitar o
                processo de recrutamento para empresas e candidatos.
                Não lançamos planos pagos, apenas um canal de singelas
                doações, pois o objetivo da plataforma é fornecer vagas
                compartilháveis e facilmente acessíveis a todos que
                delas necessesitam.
            </p>
            <h2 class="">Nossos valores</h2>
            <p>
                Temos ciência de que lidamos com seres humanos,
                muitos em momentos de fragilidade em busca de uma oportunidade.
                Sendo assim, sempre priorizaremos o bom atendimento, a honestidade,
                a hombridade e principalmente a transparência.
            </p>
      </div>
    </div>
    <div class="text-center">
        <a href="{{ route('sobre.terms') }}" class="btn btn-outline-info">Termos de privacidade</a>
        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=GZX9PE69UEFS8&currency_code=BRL&source=url" class="btn btn-outline-success">Faça uma doação</a>
    </div>
  </div>
@endsection
