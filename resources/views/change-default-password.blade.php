@extends('layout.app')

@section('title') Change Default Password @endsection

@section('content')

<div class="wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="mb-md-2"></div>
          <div class="row">
            <div class="col-md-4 offset-4">
              <div class="card">
                {{-- <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">Login</h4>
                </div> --}}
                <div class="card-body">
                  <div class="text-center">
                    <img src="{{ asset('logo/tsu_logo.png') }}" class="img" width="80px">
                    <h3>TSU - Research Office</h3>
                    <p>Faculty Research Management and Training</p>
                  </div>
                  
                  @include('includes.all')
                  <p>User: <b>{{ ucwords(Auth::user()->firstname . ' '  . Auth::user()->lastname) }}</b></p>
                  <form action="{{ route('change.default.password.post') }}" method="POST" class="form" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label class="bmd-label-floating">Retype Password</label>
                          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Change Default Password</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection