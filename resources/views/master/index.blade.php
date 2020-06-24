@extends('layout.app')
@section('title', 'Bem vindo!')


@section('content')

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                <img src="{{ asset('template/img/logozap.png') }}" alt="Zap Job" style="max-width: 100px;">
                </div>
                <p class="card-category">Nunca foi tão fácil anunciar vagas de emprego</p>
                <h3 class="card-title">Bem vindo(a) ao Zap Job</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <h6 class="text-warning">{{ $usersposts->total() }} postagens registradas no site!</h6>
                </div>
            </div>
            </div>
        </div>

        <div class="card card-stats col-lg-6 col-md-12">
            <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
                <i class="material-icons">person</i>
            </div>
            <p class="card-category">Usuários cadastrados</p>
            <h3 class="card-title">+{{ $usersregister->total() }}</h3>
            </div>
            <div class="card-footer">
            <div class="stats">
                <i class="material-icons">update</i> Atualizado agora
            </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title">Usuários recentes</h4>
            <p class="card-category">Usuários cadastrados na plataforma recentemente</p>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Postagens</th>
                </tr>
            </thead>
              <tbody>
                @foreach ($actives as $active)
                <tr>
                  <td>{{ $active->id }}</td>
                  <td>{{ $active->name }}</td>
                  <td>{{ $active->email }}</td>
                  <td>{{ $active->posts()->count() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection
