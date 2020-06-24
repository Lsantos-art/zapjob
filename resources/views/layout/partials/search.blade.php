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

</div>
