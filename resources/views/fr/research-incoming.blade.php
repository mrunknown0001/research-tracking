@extends('layout.app')

@section('title') Incoming Research @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Incoming Research from Research Chairperson </h4>
              <p class="card-category"> Step 3 </p>
            </div>
            <div class="card-body">

            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Incoming Research from Research Chairperson </h4>
              <p class="card-category"> Step 6 </p>
            </div>
            <div class="card-body">

            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Incoming Research from University Research Office </h4>
              <p class="card-category"> Step 9 </p>
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