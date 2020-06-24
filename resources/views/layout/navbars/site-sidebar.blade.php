<div class="sidebar" data-color="azure" data-background-color="white" data-image="https://zapjob.s3.amazonaws.com/sidebar-3.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="{{ route('home') }}" class="simple-text logo-normal">
        Zap Job
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">

          @if (auth()->user())
            <li class="nav-item active">
                @if (auth()->user()->master == "yes")
                    <a class="nav-link" href="{{ route('master.index') }}">
                    @else
                    <a class="nav-link" href="{{ route('admin.index') }}">
                @endif
                <i class="material-icons">dashboard</i>
                <p>Painel do usuário</p>
                </a>
            </li>
          @else
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="material-icons">person</i>
                    <p>Quero anunciar!</p>
                </a>
            </li>
          @endif
      </ul>
      <!-- Example single danger button -->
        <div class="btn-group col-md-4">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</button>
            <div class="dropdown-menu mt-5 p-3">
            @if (isset($categories))
                @foreach ($categories as $categorie)
                    <a class="dropdown-item" href="{{ route('byCateg', ['slug' => $categorie->slug, 'id' => $categorie->id]) }}">{{ $categorie->name }}</a>
                @endforeach
            @endif
            </div>
        </div>

        <div class="my-5"></div>

        {{-- @include('google-ads.sidebar') --}}

    </div>
  </div>
