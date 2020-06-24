@extends('layout.app')
@section('title', 'Posts do usuário: '."{$user->name}")


@section('content')
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
            <img src="{{ $user->avatar }}" alt="Zap Job" style="max-width: 100px;">
            </div>
            <p class="card-category">Este usuário tem: {{ $user->posts()->count() }} posts cadastrados</p>
            <h3 class="card-title">Bem vindo(a) ao Zap Job</h3>
        </div>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <img src="{{ $post->category->avatar }}" alt="{{ $post->category->name }}" style="max-width: 100px;">
            </div>
                <h3 class="card-category text-dark">
                    {{ $post->titulo }}
                </h3>
            </div>
            <div class="container my-3">
                <h6 style="text-align: justify">
                    "{{ $post->descricao }}"
                </h6>
            </div>
            <p class="container"><b>Tipo:</b> {{ $post->tipo }}</p>
                @if ($post->salario == 'Informado na entrevista')
            <p class="container"><b>Salário:</b> {{ $post->salario }}</p>
                @else
            <p class="container"><b>Salário:</b> R${{ number_format($post->salario,2,",",".") }}</p>
                @endif
            <p class="container"><b>Categoria:</b> {{ $post->category->name }}</p>
            <p class="container"><b>Benefícios:</b> {{ $post->beneficios }}</p>
            <p class="container"><b>Receber curriculos até: </b>{{ date_format(new DateTime($post->periodo), 'd/m/Y') }}</p>
            @if ($post->contato == 'whatsapp')
            <p class="container text-info">Deseja contato por whatsapp</p>
            @else
            <p class="container text-info">Deseja contato por email</p>
            @endif
            <hr>

            @if (strtotime($today) > strtotime($post->periodo))
                <p class="container text-danger">Esta postagem não está mais ativa</p>
            @endif

            <div class="card-footer">
                <p>
                    Anunciante: {{ $user->name }}
                </p>
            </div>

            <div class="container my-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <span class="material-icons">delete</span>
                    Deletar postagem
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja fazer isso?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Esta postagem está ferindo as regras da plataforma?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-gray" data-dismiss="modal">Cancelar</button>
                        <a href="{{ route('posts.destroy',  $post->id) }}" class="btn btn-danger">Sim, está!</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
