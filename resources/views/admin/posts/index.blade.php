@extends('layout.admin')
@section('title', 'Meus anúncios')


@section('content')
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
            <img src="{{ asset('template/img/logozap.png') }}" alt="Zap Job" style="max-width: 100px;">
            </div>
            <p class="card-category">Você tem: {{ auth()->user()->posts()->count() }} posts cadastrados</p>
            <h4 class="card-title">Bem vindo(a) ao Zap Job</h4>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">person</i> {{ auth()->user()->name }}
            </div>
        </div>
        </div>
    </div>


    @foreach ($posts as $post)
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
                <img src="{{ $post->category->avatar }}" alt="{{ $post->category->name }}" style="max-width: 100px;">
            </div>
                <h3 class="card-category text-dark">
                    {{ $post->titulo }}
                </h3>
            </div>
            <hr>
            @if ($post->role == 'edit')
            <div class="col-md-1">
                <button class="container btn btn-outline-success btn-sm" type="button"  data-toggle="modal" data-target="#editModal">
                    <span class="material-icons" title="Aguardando edição...">autorenew</span>
                </button>
            </div>
            @endif

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


            <div class="container my-3">
                <!-- Button trigger modal -->
                <button title="Deletar anúncio" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <span class="material-icons">delete</span>
                </button>

                <a title="Editar anúncio" href="{{ route('posts.edit', $post->id) }}" class="btn btn-info  btn-sm">
                    <span class="material-icons">edit</span>
                </a>

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
                            Ficamos felizes em termos feito parte do seu processo seletivo!
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-gray" data-dismiss="modal">Cancelar</button>
                        <a href="{{ route('postsDestroy.store',  $post->id) }}" class="btn btn-danger">Sim, tenho certeza!</a>
                        </div>
                    </div>
                    </div>
                </div>


                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="editModal">Anúncio em processo de edição</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Normalmente edições de anúncios demoram até 24 horas para serem aprovadas, até lá seu anúncio continuará
                            ativo com as informações originais.
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
