@extends('layout.app')
@section('title', 'Configurações gerais')


@section('content')
<div class="card card-stats p-2">
    <div class="card-header card-header-secondary card-header-icon">
      <div class="card-icon">
        <i class="material-icons">settings</i>
      </div>
      <p class="card-category">Destaques da página inicial</p>
    <div class="p-3 col-md-4 mt-5">
        <div class="alert alert-warning">
            <span>As imagens do slide devem ter 1740 por 900 pixels, e tamanho de no máximo 300kbps</span>
        </div>
    </div>
    </div>
    <div class="card-footer">
      <div class="stats">
        <i class="material-icons">build</i> Ajustes gerais
      </div>
    </div>


    <div class="row p-3 d-flex justify-content-around">
        <div class="card p-2 col-md-3">
            <form action="{{ route('master.config.star') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <h6>Destaque 01</h6>
            <img class="img-thumbnail my-2" src="{{ $stars->star1 }}" alt="Destaque 01" style="max-width: 150px">
            <label for="star1">Alterar imagem</label>
            <input type="hidden" name="type" value="star1">
            <input class="form-control" type="file" name="file" id="star1">
            <button type="submit" class="btn btn-outline-secondary">Alterar</button>
            </form>
        </div>

        <div class="card p-2 col-md-3">
            <form action="{{ route('master.config.star') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <h6>Destaque 02</h6>
            <img class="img-thumbnail my-2" src="{{ $stars->star2 }}" alt="Destaque 02" style="max-width: 150px">
            <label for="star2">Alterar imagem</label>
            <input type="hidden" name="type" value="star2">
            <input class="form-control" type="file" name="file" id="star2">
            <button type="submit" class="btn btn-outline-secondary">Alterar</button>
            </form>
        </div>

        <div class="card p-2 col-md-3">
            <form action="{{ route('master.config.star') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <h6>Destaque 03</h6>
            <img class="img-thumbnail my-3" src="{{ $stars->star3 }}" alt="Destaque 03" style="max-width: 150px">
            <label for="star3">Alterar imagem</label>
            <input type="hidden" name="type" value="star3">
            <input class="form-control" type="file" name="file" id="star3">
            <button type="submit" class="btn btn-outline-secondary">Alterar</button>
            </form>
        </div>
    </div>


</div>
@endsection
