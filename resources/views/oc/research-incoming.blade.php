@extends('layout.app')

@section('title') Incoming Research @endsection

@section('content')

<div class="wrapper">

    @include('oc.includes.sidebar')

    <div class="main-panel">

      @include('oc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

					@include('includes.all')

          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title "> Incoming Research from Faculty Researcher </h4>
              <p class="card-category"> Step 4 </p>
            </div>
            <div class="card-body">
          


            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title "> Incoming Research from Faculty Researcher </h4>
              <p class="card-category"> Step 7 </p>
            </div>
            <div class="card-body">
          


            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title "> Incoming Research from Faculty Researcher </h4>
              <p class="card-category"> Step 10 </p>
            </div>
            <div class="card-body">
          


            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title "> Incoming Research from University Research Office </h4>
              <p class="card-category"> Step 13 </p>
            </div>
            <div class="card-body">
          


            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection