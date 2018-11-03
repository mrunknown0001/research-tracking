@extends('layout.app')

@section('title') Incoming Research @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Proceed to Faculty Researcher </h4>
              <p class="card-category"> Step 8 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">


              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Proceed to Office of the University President </h4>
              <p class="card-category"> Step 12 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">


              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Proceed to Faculty Researcher  </h4>
              <p class="card-category"> Step 14 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">


              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection