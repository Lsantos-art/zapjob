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
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" action="{{ route('search') }}" method="POST">
                @csrf
              <div class="input-group no-border">
                <input type="text" value="{{ $search ?? '' }}" name="search" class="form-control" placeholder="Pesquisar...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
              </li>
            </ul>
          </div>
      </div>
    </div>
  </nav>
<!-- End Navbar -->
