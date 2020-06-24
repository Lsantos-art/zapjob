@extends('layout.mail')
@section('title', 'Email Master')

@section('content')

    @component('mail::message')
    <div class="card">
        <div class="container">
            <img src="https://zapjob.s3.amazonaws.com/logo-zapJob.png" alt="Zap Job" style="max-width: 80px">
            <h1>Você tem tarefas pendentes no site</h1>
            <hr>
            <p>Anunciante: {{ $user }}</p>
            <p>Titulo: {{ $post['titulo'] }}</p>
            <p>"{{ $post['descricao'] }}"</p>
        </div>
    </div>
    @endcomponent

@endsection
