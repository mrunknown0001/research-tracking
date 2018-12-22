@extends('layout.app')

@section('title') Password Change @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title "> Password Change </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              @include('includes.all')
              <form action="{{ route('drc.change.password.post') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="current_password" class="bmd-label-floating">Current Password</label>
                  <input type="password" name="current_password" id="current_password" class="form-control" placeholder="" autofocus="" required>
                  @if ($errors->has('current_password'))
                    <span class="invalid-feedback text-red" role="alert">
                      <strong>{{ $errors->first('current_password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="password" class="bmd-label-floating">New Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="" required="">
                  @if ($errors->has('password'))
                    <span class="invalid-feedback text-red" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="password_confirmation" class="bmd-label-floating">Password Confirmation</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="" required="">
                  @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback text-red" role="alert">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-info">Change Password</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection