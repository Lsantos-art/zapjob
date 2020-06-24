@extends('layout.admin')

@section('title', 'Perfil do usuario')


@section('content')
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-4 mt-5">
            <div class="card card-profile">
              <div class="card-avatar">
                <a href="javascript:;">
                  <img class="img" src="{{ $user->avatar }}">
                </a>
              </div>
              <div class="card-body">
                <h6 class="card-category text-gray">Anunciante</h6>
                <h4 class="card-title">{{ $user->name }}</h4>
                <p class="card-description">
                  Você fez {{ auth()->user()->posts()->count() }} anúncios nesta plataforma.
                </p>
              </div>
            </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Editar perfil</h4>
              <p class="card-category">
                  Atenção! Informe um whatsapp válido para que seus processos seletivos
                  se tornem mais eficientes!
              </p>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Nome</label>
                      <input value="{{ $user->name }}" name="name" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Email</label>
                      <input value="{{ $user->email }}" name="email" type="email" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Whatsapp</label>
                      <input value="{{ $user->whatsapp }}" name="whatsapp" type="number" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="">
                        <label for="file">Imagem do perfil</label><br>
                        <div class="btn btn-info col-sm-8 btn-sm">
                          <input id="file" name="avatar" type="file" class="form-control text-white">
                        </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Editar perfil</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>

        </div>
      </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
            <span class="material-icons">delete</span>
            Deletar conta
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
                    Ao deletar esta conta, todos os anúncios vinculados a ela também serão excluidos!
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal">Cancelar</button>
                <a href="{{ route('admin.destroy', $user->id) }}" class="btn btn-danger">Sim, tenho certeza!</a>
                </div>
            </div>
            </div>
    </div>

    </div>

@endsection
