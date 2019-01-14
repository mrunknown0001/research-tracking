@extends('layout.app')

@section('title') Login @endsection

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
                    <p>Faculty Research Management and Tracking System</p>
                  </div>
                  
                  @include('includes.all')

                  <form action="{{ route('login.post') }}" method="POST" class="form" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="id_number" class="bmd-label-floating">ID Number</label>
                          <input type="text" name="id_number" id="id_number" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="password" class="bmd-label-floating">Password</label>
                          <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Login</button>
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