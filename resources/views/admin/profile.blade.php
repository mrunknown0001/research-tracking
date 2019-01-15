@extends('layout.app')

@section('title') Profile @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Profile </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <p>Name: <strong>{{ ucwords(Auth::user()->firstname . ' ' . Auth::user()->lastname) }}</strong></p>
              <p>ID Number: <strong>{{ Auth::user()->id_number }}</strong></p>
              <p>Contact Number: <strong>{{ Auth::user()->contact_number }}</strong></p>
              <p>Email: <strong>{{ strtolower(Auth::user()->email) }}</strong></p>
              <p>
                {{-- <a href="" class="btn btn-primary">Update Profile</a> --}}
                <a href="{{ route('admin.change.password') }}" class="btn btn-primary">Change Password</a>
              </p>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection