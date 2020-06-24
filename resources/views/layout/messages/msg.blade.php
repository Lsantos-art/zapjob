@if ($errors->any())

        <div class="alert alert-danger alert-with-icon" data-notify="container">
            <i class="material-icons" data-notify="icon">add_alert</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            @foreach ($errors->all() as $error)
                <span data-notify="message">{{ $error }}</span>
            @endforeach
        </div>

@endif

@if (session('success'))
    <div class="alert alert-success alert-with-icon" data-notify="container">
        <i class="material-icons" data-notify="icon">add_alert</i>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span data-notify="message">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-with-icon" data-notify="container">
        <i class="material-icons" data-notify="icon">add_alert</i>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span data-notify="message">{{ session('error') }}</span>
    </div>
@endif
