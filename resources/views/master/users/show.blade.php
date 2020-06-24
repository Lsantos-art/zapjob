@extends('layout.app')
@section('title', "{$user->name}")


@section('content')
    <div class="card card-profile">
        <div class="card-avatar">
            <img class="img" src="{{ $user->avatar }}">
        </div>
        <div class="card-body">
          <h6 class="card-category text-gray">
              @if ($user->master == "yes")
                  Usuário master
                  @else
                  Usuário comum
              @endif
          </h6>
          <h4 class="card-title">{{ $user->name }}</h4>
          <p class="card-description">
            <strong>Email: </strong>{{ $user->email }} <br>
            <strong>Whatsapp: </strong>{{ $user->whatsapp }} <br>
          </p>
          <a href="{{ route('master.userposts', $user->id) }}" class="btn btn-primary btn-round">Ver anúncios</a>
        </div>
    </div>

    <div class="">

        @if ($user->level == 1)
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-grey btn-sm" title="Você não pode deletar esta conta!">
            <span class="material-icons">delete</span>
        </button>
        @else
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
            <span class="material-icons">delete</span>
            Deletar usuário
        </button>
        @endif


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
                    Ao deletar esta conta, todos os anúncios vinculados a ela também serão excluidos!
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal">Cancelar</button>
                <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">Sim, tenho certeza!</a>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
