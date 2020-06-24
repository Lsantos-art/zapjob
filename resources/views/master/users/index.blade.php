@extends('layout.app')
@section('title', 'Anúncios')


@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form class="navbar-form col-md-4" method="POST" action="{{ route('users.search') }}">
            <div class="input-group no-border">
            @csrf
              <input name="search" type="text" class="form-control" placeholder="Pesquisar...">
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div>
          </form>
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Selecione um usuário</h4>
            <p class="card-category"> Gerencie e fiscalize os anúncios dos usuários</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">

                <thead class="text-warning">
                  <th>Imagem</th>
                  <th>Nome</th>
                  <th>Anúncios</th>
                </thead>

                <tbody>

                    @foreach ($users as $user)

                    <tr>
                        <td>
                            <img class="card-avatar rounded-circle" src="{{ $user->avatar }}" alt="{{ $user->name }}" style="max-width: 80px">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" title="Ver detalhes desta conta">
                                <span class="material-icons text-primary">
                                    visibility
                                </span>
                            </a>
                        </td>
                    </tr>

                    @endforeach

                    @if ($users->total() == 0)
                    <tr>
                        <td>Nenhum usuário encontrado...</td>
                    </tr>
                    @endif

                </tbody>
              </table>
            </div>
          </div>
        </div>

                @if (isset($filters))
                        {!! $users->appends($filters)->links() !!}
                    @else
                        {!! $users->links() !!}
                @endif
      </div>
    </div>
  </div>

@endsection
