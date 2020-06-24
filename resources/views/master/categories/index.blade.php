@extends('layout.app')
@section('title', 'Categorias cadastradas')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <a class="btn btn-outline-info" href="{{ route('categories.create') }}">
        <span class="material-icons">add_box</span>
             Nova categoria
        </a>
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Categorias criadas</h4>
            <p class="card-category"> Categorias servem classificar vagas</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">

                <thead class=" text-primary">
                  <th>Imagem</th>
                  <th>Nome</th>
                  <th>Gerenciar</th>
                </thead>

                <tbody>

                    @foreach ($categoriesview as $categorie)

                    <tr>
                        <td>
                            <img class="card-avatar" src="{{ $categorie->avatar }}" alt="{{ $categorie->name }}" style="max-width: 100px">
                        </td>
                        <td>
                            <a class="text-gray" href="{{ route('categories.edit', $categorie->id) }}">
                                {{ $categorie->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $categorie->id) }}">
                                <span class="material-icons">
                                    settings
                                </span>
                            </a>
                        </td>
                    </tr>

                    @endforeach

                    @if ($categoriesview->total() == 0)
                    <tr>
                        <td>Nenhuma categoria foi criada...</td>
                    </tr>
                    @endif

                </tbody>
              </table>
            </div>
          </div>
        </div>

                @if (isset($filters))
                        {!! $categoriesview->appends($filters)->links() !!}
                    @else
                        {!! $categoriesview->links() !!}
                @endif
      </div>
    </div>
  </div>

@endsection
