@extends('layout.app')

@section('title') Profile @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Profile </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              @include('includes.all')
              <form action="{{ route('fr.update.profile.post') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="firstname" class="bmd-label-floating">Enter Firstname</label>
                      <input type="text" name="firstname" id="firstname" class="form-control" value="{{  Auth::user()->firstname }}" placeholder="Enter Firstname" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="middlename" class="bmd-label-floating">Enter Middlename</label>
                      <input type="text" name="middlename" id="middlename" class="form-control" value="{{ Auth::user()->middlename }}" placeholder="Enter Middlename" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="lastname" class="bmd-label-floating">Enter Lastname</label>
                      <input type="text" name="lastname" id="lastname" class="form-control" value="{{ Auth::user()->lastname }}" placeholder="Enter Lastname" required>
                    </div>
                  </div>
                </div>
 
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="id_number" class="bmd-label-floating">Enter ID Number</label>
                      <input type="text" name="id_number" id="id_number" class="form-control" value="{{ Auth::user()->id_number }}" placeholder="Enter ID Number" required>
                    </div>
                    <div class="form-group">
                      <label for="contact_number" class="bmd-label-floating">Enter Contact Number</label>
                      <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ Auth::user()->contact_number }}" placeholder="Enter Contact Number" required>
                    </div>
                    <div class="form-group">
                      <label for="email" class="bmd-label-floating">Enter Email</label>
                      <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter Email" required="">
                    </div>
                  </div>
                </div>
                <p>
                  <button type="submit" class="btn btn-success">Update Profile</button>
                </p>
              </form>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection