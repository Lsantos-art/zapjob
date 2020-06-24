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
        <li class="nav-item active  ">
            <a class="nav-link" href="{{ route('admin.index') }}">
              <i class="material-icons">home</i>
              <p>Inicio</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('posts.index') }}">
              <i class="material-icons">input</i>
              <p>Meus anúncios</p>
            </a>
          </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('posts.create') }}">
            <i class="material-icons">store</i>
            <p>Anunciar</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
