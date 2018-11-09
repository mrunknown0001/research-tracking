@extends('layout.app')

@section('title') Research Tracking @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Faculty Research Tracking: {{ ucwords($research->title) }}</h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <p>
                <a href="{{ route('fr.dashboard') }}" class="btn btn-danger">Go Back</a>
              </p>
            </div>
          </div>


        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection