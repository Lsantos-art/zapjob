@extends('layout.site')
@section('title', 'Zap Job - Empregos')


@section('content')

    <div class="container-fluid col-md-8">
        <h3 class="text-center">Fique atento às novidades da plataforma</h3>
        <hr>
        <div class="card">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ $stars->star1 }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ $stars->star2 }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ $stars->star3 }}" class="d-block w-100" alt="...">
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    {{-- @include('google-ads.top') --}}

    @foreach ($posts as $post)

    {{-- Verifica se a vaga ainda está ativa --}}
    @if (strtotime($today) <= strtotime($post->periodo))

    <div class="card card-stats">
        <div class="card-header card-header-secondary card-header-icon">
        <div class="card-icon">
            <img src="{{ $post->category->avatar }}" alt="{{ $post->category->name }}" style="max-width: 100px;">
        </div>
        <div class="text-dark my-2">
            @if ($post->contato == 'whatsapp')
            <span class="tim-note text-success" style="text-align: justify">
                <i class="fab fa-whatsapp"></i>
            </span><br>
            @endif
            <span class="tim-note" style="text-align: justify">
                Inserido em: <b>{{ date_format( $post->created_at, 'd/m/yy' ) }}</b>
            </span>
        </div>
        </div>
        <div class="container">
            <hr>
        </div>
        <div class="container my-3">
            <span class="tim-note" style="text-decoration: underline">
                <a href="{{ route('show', ['slug' => $post->category->slug, 'id' => $post->id]) }}" class="text-dark">
                    <h3>{{ $post->titulo }}</h3>
                </a>
            </span>
            <span class="tim-note" style="text-align: justify">
                <h4>"{{ mb_strimwidth($post->descricao, 0, 150, "...") }}"</h4>
            </span>
        </div>

        @if ($post->salario == 'Informado na entrevista')
            <p class="container"><b>Salário:</b> {{ $post->salario }}</p>
            @else
            <p class="container"><b>Salário:</b> R${{ number_format($post->salario,2,",",".") }}</p>
        @endif
        <p class="container"><b>Local:</b> {{ $post->local }}</p>

        <div class="container my-2">
            <a href="{{ route('show', ['slug' => $post->category->slug, 'id' => $post->id]) }}" class="btn btn-outline-success btn-sm">
                <i class="fas fa-eye"></i></i> Detalhes da vaga
            </a>
        </div>
    </div>

    @endif

    @endforeach

        {{-- @include('google-ads.footer') --}}

        @if (isset($filters))
        {!! $posts->appends($filters)->links() !!}
            @else
        {!! $posts->links() !!}
        @endif

@endsection
