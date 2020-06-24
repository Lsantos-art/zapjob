<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
    <div class="navbar-wrapper">
        <a class="navbar-brand" href="{{ route('sobre.index') }}">Sobre nós<div class="ripple-container"></div></a>
    </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        @include('layout.partials.search')
        <ul class="navbar-nav">
            @if ($notifications != null)
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('authorization.index') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>

                  @if ($notifications->qtd > 0)
                  <span class="notification">{{ $notifications->qtd }}</span>
                  @endif

                  <p class="d-lg-none d-md-block">
                    Notificações
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('authorization.index') }}">{{ $notifications->message }}</a>
                </div>
            </li>
            @endif
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:;">
                <img class="rounded-circle" src="{{ auth()->user()->avatar }}" style="max-width: 50px">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="{{ route('master.edit') }}">Perfil</a>
              <a class="dropdown-item" href="{{ route('master.config') }}">Configurações</a>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
