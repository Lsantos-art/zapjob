@extends('layout.app')
@section('title', "")

@section('content')

    <div class="col-lg-6 col-md-12 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <img class="card-avatar" src="{{ asset('template/img/logozap.png') }}" alt="Zap Job" style="max-width: 150px">
                </div>
            </div>
            <div class="card-footer">
            <h3>Você tem <b class="text-warning">{{ $authorizations->count() }}</b> solicitações de anúncios</h3>
            <div class="stats">

            </div>
            </div>
        </div>
    </div>

    @if ($authorizations)
    @foreach ($authorizations as $authorization)
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <img src="{{ $authorization->category->avatar }}" alt="{{ $authorization->category->name }}" style="max-width: 100px;">
            </div>
                <h3 class="card-category text-dark">
                    {{ $authorization->titulo }}
                </h3>
            </div>
            <div class="container my-3">
                <h6 style="text-align: justify">
                    "{{ $authorization->descricao }}"
                </h6>
            </div>
            <p class="container"><b>Tipo:</b> {{ $authorization->tipo }}</p>

            @if ($authorization->salario == 'Informado na entrevista')
            <p class="container"><b>Salário:</b> {{ $authorization->salario }}</p>
                @else
            <p class="container"><b>Salário:</b> R${{ number_format($authorization->salario,2,",",".") }}</p>
            @endif

            <p class="container"><b>Categoria:</b> {{ $authorization->category->name }}</p>
            <p class="container"><b>Benefícios:</b> {{ $authorization->beneficios }}</p>

            @if ($authorization->contato == 'whatsapp')
            <p class="container text-info">Deseja contato por whatsapp</p>
                @else
            <p class="container text-info">Deseja contato por email</p>
            @endif

            <hr>

            @if ($authorization->role == 'edit')
            <p class="container text-success">Edição de anúncio</p>
            @endif

            <div class="card-footer">
                <p>
                    Anunciante: {{ $authorization->user->name }}
                </p>
            </div>
            <div class="card-footer">
                <a href="{{ route('posts.authorize', $authorization->id) }}" class="btn btn-success btn-sm">
                    <span class="material-icons">check_circle</span>
                    Permitir
                </a>
                <a href="{{ route('authorization.destroy', $authorization->id) }}" class="btn btn-danger btn-sm">
                    <span class="material-icons">highlight_off</span>
                    Remover
                </a>
            </div>
        </div>
    @endforeach
        @if (isset($filters))
        {!! $authorizations->appends($filters)->links() !!}
            @else
        {!! $authorizations->links() !!}
        @endif
    @endif


@endsection
