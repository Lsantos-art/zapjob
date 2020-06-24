@extends('layout.app')
@section('title', "{$categorie->name}")

@section('content')

    <div class="col-lg-6 col-md-12 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <img class="card-avatar" src="{{ $categorie->avatar }}" alt="{{ $categorie->name }}" style="max-width: 150px">
                </div>
            </div>
            <div class="card-footer">
            <p>Titulo: {{ $categorie->name }}</p>
            <p>Slug: {{ $categorie->slug }}</p>
            <div class="stats">

                <small>Criada por: {{ $categorie->author->name }}</small>
            </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Editar categoria</div>
                <hr>
            </div>
            <div class="col-auto">
                <span class="material-icons text-primary">create_new_folder</span>
            </div>
            </div>
            <form action="{{ route('categories.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $categorie->id }}">
                <label class="label mt-3" for="name">Nome da categoria</label>
                <input class="form-control text-primary" type="text" name="name" id="name" value="{{ $categorie->name }}" placeholder="Ex. Serviços domésticos" required>
                <label class="label mt-3" for="slug">Slug da categoria</label>
                <input class="form-control text-primary" type="text" name="slug" id="slug" value="{{ $categorie->slug }}" placeholder="Ex. domesticos" required>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Ajuda
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <p class="dropdown-item">
                          Slugs servem para serem
                          <br> apresentados nas URL's dos anúncios.
                        </p>
                    </div>
                  </div>

                <div class="file-field my-3">
                    <label for="file">Imagem da categoria</label><br>
                    <div class="btn btn-info col-sm-6 btn-sm">
                      <input id="file" name="avatar" type="file" class="form-control text-white">
                    </div>
                    <div class="text-warning" role="alert">
                        <small>
                            Para melhor enquadramento nos links do whatsapp, selecione imagens com 150X150 pixels
                            e de no máximo 300kbps.
                        </small>
                    </div>
                </div>

                <div class="my-3">
                    <button type="submit" class="btn btn-outline-info my-3">Editar</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
            <span class="material-icons">delete</span>
            Deletar categoria
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
                    Ao deletar esta categoria, todos os anúncios vinculados a ela também serão excluidos!
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal">Cancelar</button>
                <a href="{{ route('categories.destroy', $categorie->id) }}" class="btn btn-danger">Sim, tenho certeza!</a>
                </div>
            </div>
            </div>
        </div>
    </div>


@endsection
