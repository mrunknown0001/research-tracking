@extends('layout.app')

@section('title') Outgoing Research @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Outgoing Research Proceeding to College Research Evaluation Committee </h4>
              <p class="card-category"> Step 3 </p>
            </div>
            <div class="card-body">

            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Outgoing Research Proceeding to UREC </h4>
              <p class="card-category"> Step 6 </p>
            </div>
            <div class="card-body">

            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Outgoing Research Proceeding to RERC </h4>
              <p class="card-category"> Step 9 </p>
            </div>
            <div class="card-body">

            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Outgoing Research Proceeding to University Research Office </h4>
              <p class="card-category"> Step 11 </p>
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