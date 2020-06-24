@extends('layout.mail')
@section('title', 'Email Master')

@section('content')

    @component('mail::message')
    <div class="card">
        <div class="container">
            <img src="https://zapjob.s3.amazonaws.com/logo-zapJob.png" alt="Zap Job" style="max-width: 80px">
            <h1>Olá {{ $user->name }}, seu anúncio foi aprovado na Zap Job!</h1>
            <hr>
            <p>Empresa: {{ $post['empresa'] }}</p>
            <p>Titulo: {{ $post['titulo'] }}</p>
            <p>Quantidade de vagas: {{ $post['qtd'] }}</p>
            <p>Local: {{ $post['local'] }}</p>
            <p>Salário: {{ $post['salario'] }}</p>
            <p>Benefícios: {{ $post['beneficios'] }}</p>
            <p>Requisitos: {{ $post['requisitos'] }}</p>
            <p>Dejeso receber curriculos até: {{ $post['periodo'] }}</p>
            <p>Meio de contato: {{ $post['contato'] }}</p>
            <p>
                <h3>Descrição do anúncio</h3>
                <hr>
                "{{ $post['descricao'] }}"
            </p>
        </div>
    </div>
    @endcomponent

@endsection
