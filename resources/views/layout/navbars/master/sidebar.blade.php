<div class="sidebar" data-color="purple" data-background-color="white" data-image="https://zapjob.s3.amazonaws.com/sidebar-3.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="{{ route('home') }}" class="simple-text logo-normal">
        Zap Job
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item active  ">
          <a class="nav-link" href="{{ route('master.index') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('authorization.index') }}">
              <i class="material-icons">check_circle_outline</i>
              <p>Solicitações</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('categories.index') }}">
              <i class="material-icons">input</i>
              <p>Categorias</p>
            </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('users.index') }}">
            <i class="material-icons">grading</i>
            <p>Anunciantes</p>
          </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('master.posts.index') }}">
              <i class="material-icons">store</i>
              <p>Anuncios do admin</p>
            </a>
          </li>
      </ul>
    </div>
  </div>
