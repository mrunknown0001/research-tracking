@extends('layout.app')

@section('title') Settings @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Settings </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <p>
                    <a href="{{ route('admin.colleges') }}" class="btn btn-primary btn-block">College Management</a>
                  </p>
                  <p>
                    <a href="{{ route('admin.departments') }}" class="btn btn-primary btn-block">Department Management</a>
                  </p>
                  <p>
                    <a href="{{ route('admin.college.clerks') }}" class="btn btn-primary btn-block">College Clerk Management</a>
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection