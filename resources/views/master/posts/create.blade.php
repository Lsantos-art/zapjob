@extends('layout.app')
@section('title', 'Nova vaga')


@section('content')
    <div class="col-lg-12 col-md-12 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
            <img src="{{ asset('template/img/logozap.png') }}" alt="Zap Job" style="max-width: 100px;">
            </div>
            <p class="card-category">Nunca foi tão fácil anunciar vagas de emprego</p>
            <h4 class="card-title">Bem vindo(a) ao Zap Job</h4>
        </div>
        <div class="container">
            <div class="card p-3">
                <form method="POST" action="{{ route('master.postsStore') }}">
                    @csrf
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Empresa</label>
                          <input name="empresa" type="text" class="form-control" value="{{ old('empresa') }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <select name="tipo" class="form-control" required>
                              <option class="form-control disabled" value="">Tipo de contratação</option>
                              <option class="form-control" value="Estagio">Estágio</option>
                              <option class="form-control" value="Efetivo">Efetivo</option>
                              <option class="form-control" value="Temporário">Temporário</option>
                              <option class="form-control" value="Freelancer">Freelancer</option>
                              <option class="form-control" value="Mei">Mei/Prestador de serviços</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Quantidade de vagas</label>
                          <input name="qtd" type="number" class="form-control" required value="{{ old('qtd') }}">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                            <select name="local" class="form-control" required>
                                <option class="disabled" value="">Local</option>
                                <option class="" value="Brasilia-DF">Brasilia-DF</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <label for="salario" class="bmd-label-floating">Salário</label>
                                <input id="salario" name="salario" type="number" class="form-control" value="{{ old('salario') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Ajuda
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <p class="dropdown-item">
                                          Deixe o salário em branco
                                          <br> caso queira informa-lo somente na entrevista.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <label for="beneficios" class="bmd-label-floating">Benefícios</label>
                                <input id="beneficios" name="beneficios" type="text" class="form-control" required value="{{ old('beneficios') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <label for="requisitos" class="bmd-label-floating">Requisitos</label>
                                <input id="requisitos" name="requisitos" type="text" class="form-control" required value="{{ old('requisitos') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <label for="periodo">Receber curriculo até...</label>
                                <input id="periodo" name="periodo" type="date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label for="descricao">Descrição</label>
                                <textarea id="descricao" name="descricao" type="text" class="form-control mt-3" rows="5" cols="33" placeholder="Informe a carga horária, endereço e demais detalhes da vaga." required value="{{ old('descricao') }}"></textarea></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label for="titulo" class="bmd-label-floating">Título do anúncio</label>
                                <input id="titulo" name="titulo" type="text" class="form-control mt-3" required value="{{ old('titulo') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label for="contato" class="bmd-label-floating">Email</label>
                                <input id="contato" name="email" type="email" class="form-control mt-3" required value="{{ old('contato') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group-prepend">
                                <label for="contato" class="input-group-text">Selecione a categoria</label>
                              </div>
                            <select class="form-control" name="categorie" id="inputGroupSelect01">
                                <option class="form-control disabled" value="">Categoria</option>
                                @if (isset($categories))
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary">Anunciar</button>
                    </div>
                    <div class="clearfix"></div>
                  </form>
            </div>
        </div>
        </div>
    </div>



@endsection
