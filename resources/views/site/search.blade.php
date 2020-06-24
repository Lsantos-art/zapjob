@extends('layout.site')
@section('title', 'Zap Job - Empregos')


@section('content')
    @if ($posts->count() > 0)

    @foreach ($posts as $post)
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
    @endforeach
    @else
    <h3 class="text-center">Ops...nenhuma vaga foi encontrada</h3>
    <hr>
    <span class="text-center">Tente outros termos de pesquisa.</span>
    @endif

        @if (isset($filters))
        {!! $posts->appends($filters)->links() !!}
            @else
        {!! $posts->links() !!}
        @endif

@endsection
