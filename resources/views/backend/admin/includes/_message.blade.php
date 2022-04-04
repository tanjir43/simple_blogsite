@if (Session::has('error_message'))
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>{{Session::get('error_message')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  @if (Session::has('logout_message'))
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('logout_message')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    
  @if (Session::has('success_message'))
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('success_message')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

       
  @if (Session::has('info_message'))
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('info_message')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif