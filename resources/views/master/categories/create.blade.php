@extends('layout.app')
@section('title', 'Cadastrar categorias')

@section('content')

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registrar nova categoria</div>
                <hr>
            </div>
            <div class="col-auto">
                <span class="material-icons text-primary">create_new_folder</span>
            </div>
            </div>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="label mt-3" for="name">Nome da categoria</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex. Serviços domésticos" required>
                <label class="label mt-3" for="slug">Slug da categoria</label>
                <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Ex. domesticos" required>
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
                    <button type="submit" class="btn btn-outline-info my-3">Cadastrar</button>
                </div>
            </form>
        </div>
        </div>
    </div>

@endsection
