@extends('layout.admin')
@section('title', 'Bem vindo!')


@section('content')
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
            <img src="{{ asset('template/img/logozap.png') }}" alt="Zap Job" style="max-width: 100px;">
            </div>
            <p class="card-category">Nunca foi tão fácil anunciar vagas de emprego</p>
            <h4 class="card-title">Bem vindo(a) ao Zap Job</h4>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons text-success">store</i> <b>Você tem {{ $limit }} anúncios disponíveis.</b>
            </div>
        </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <span class="material-icons">mood</span>
            </div>
            <p class="card-category">
                Você tem {{ auth()->user()->posts()->count() }} vagas ativas na plataforma.
            </p>
            <h4 class="card-title">Anúncios com whatsapp são 80% mais rápidos</h4>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">date_range</i> Atualizado agora
            </div>
        </div>
        </div>
    </div>
@endsection
