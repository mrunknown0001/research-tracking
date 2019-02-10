@extends('layout.app')

@section('title') Profile @endsection

@section('content')

<div class="wrapper">

    @include('oc.includes.sidebar')

    <div class="main-panel">

      @include('oc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title "> Profile </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <p>Name: <strong>{{ ucwords(Auth::user()->firstname . ' ' . Auth::user()->lastname) }}</strong></p>
              <p>ID Number: <strong>{{ Auth::user()->id_number }}</strong></p>
              <p>Contact Number: <strong>{{ Auth::user()->contact_number }}</strong></p>
              <p>Email: <strong>{{ strtolower(Auth::user()->email) }}</strong></p>
              <p>
                <a href="{{ route('oc.profile.udpate') }}" class="btn btn-warning">Update Profile</a>
                <a href="{{ route('oc.change.password') }}" class="btn btn-warning">Change Password</a>
              </p>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection