@extends('layout.site')
@section('title', "{$post->titulo}")

@section('meta')
    <meta property="og:image" content="{{ $post->category->avatar }}">
    <meta property="og:title" content="{{ $post->titulo }}{{ $salario }}"/>
    <meta property="og:description" content="{{ $post->descricao }}"/>
@endsection



@section('content')
    @if (strtotime($today) > strtotime($post->periodo))
    <div class="card col-md-12 text-center">
        <p class="card-header">
            <h3 class="container text-danger">Esta postagem não está mais ativa</h3>
            <p class="container card-body">Este processo seletivo se encerrou em: <b>{{ date_format(new DateTime($post->periodo), 'd/m/Y') }}</b></p>
            <hr>
            <h2 class="container text-success">Não desista! Clique abaixo para conferir novas vagas!</h2>
            <div class="d-flex justify-content-center">
                <a href="{{ route('home') }}" class="btn btn-outline-info">Ver novas vagas</a>
            </div>
        </p>
    </div>
    @else
    <div class="card card-stats">
        <div class="card-header card-header-secondary card-header-icon">
        <div class="card-icon">
            <img src="{{ $post->category->avatar }}" alt="{{ $post->category->name }}" style="max-width: 100px;">
        </div>
        <div class="my-3 p-3">
            <div class="card-avatar mb-3">
                <span href="javascript:;" class="row d-flex justify-content-end">
                    <img class="img" src="{{ $user->avatar }}" style="max-width: 40px">
                </span>
            </div>
            <span class="tim-note text-dark" style="text-align: justify">
                Inserido por <b>{{ $user->name }}</b> em: <b>{{ date_format( $post->created_at, 'd/m/yy' ) }}</b>
            </span>
        </div>
        </div>

        <div class="container">
            <hr>
        </div>
        <div class="container my-3">
            <span class="tim-note text-dark" style="text-decoration: underline">
                <h3>{{ $post->titulo }}</h3>
            </span>
            <span class="tim-note" style="text-align: justify">
                <h4>"{{ $post->descricao }}"</h4>
            </span>
        </div>

        <p class="container"><b>Requisitos:</b> {{ $post->requisitos }}</p>
        <p class="container"><b>Tipo:</b> {{ $post->tipo }}</p>

        @if ($post->salario == 'Informado na entrevista')
            <p class="container"><b>Salário:</b> {{ $post->salario }}</p>
        @else
            <p class="container"><b>Salário:</b> R${{ number_format($post->salario,2,",",".") }}</p>
        @endif

        <p class="container"><b>Local:</b> {{ $post->local }}</p>

        <div class="text-center">

        @if ($post->contato == 'whatsapp')
        <div class="container col-md-4">
            <form action="{{ route('zap') }}" method="POST">
                @csrf
                <input type="hidden" name="url" value="{{Request::url()}}">
                <input type="hidden" name="id" value="{{ $post->user_id }}">
                <button type="submit" class="btn btn-outline-success text-success">
                    <i class="fab fa-whatsapp"></i></i> Enviar currículo
                </button>
            </form>
        </div>
        @else
        <hr>
        <div class="d-flex flex-row">
            <p class="container"><b>Envie seu curriculo para o E-mail:</b> {{ $post->email }}</p>
        </div>
        @endif

        <div class="container col-md-4">
            <a class="btn btn-outline-info text-info my-3" type="button"  data-toggle="modal" data-target="#zapModal">
                <i class="fab fa-whatsapp"></i></i> Enviar vaga a um amigo(a)
            </a>
        </div>

        </div>

    </div>
    @endif

    <!-- Whatsapp Modal -->
    <div class="modal fade" id="zapModal" tabindex="-1" role="dialog" aria-labelledby="zapModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="zapModal"><i class="fab fa-whatsapp text-success"></i></i> Digite seu whatsapp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body text-center">
                <form action="{{ route('share') }}" method="POST">
                    @csrf
                    <input type="hidden" name="url" value="{{Request::url()}}">
                    <input class="form-control" type="number" name="zap" id="zap" placeholder="Ex: 61999999999" required>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>


    {{-- @include('google-ads.footer') --}}

@endsection
