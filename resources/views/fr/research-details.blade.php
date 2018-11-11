@extends('layout.app')

@section('title') Research Details @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Research Details </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-4">
                  <label class="text-warning">Traking No.</label>
                  <p>{{ $research->tracking_number }}</p>
                </div>
                <div class="col-md-4">
                  <label class="text-warning">Research Title</label>
                  <p>{{ ucwords($research->title) }}</p>
                </div>
                <div class="col-md-4">
                  <label class="text-warning">Authors</label>
                  <p>
                    {{ ucwords($research->author->firstname . ' ' . $research->author->lastname) }}
                    @if(count($research->co_author) > 0)
                      @foreach($research->co_author as $ca)
                        , {{ ucwords($ca->researcher->firstname . ' ' . $ca->researcher->lastname) }}
                      @endforeach
                    @endif
                  </p>
                </div>
                <hr>
                <div class="col-md-3">
                  <label class="text-warning">Grade in Colloquium</label>
                  <p>{{ $research->colloquium_grade }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Grade in UREC</label>
                  <p>{{ $research->urec_grade }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">University Research Agenda</label>
                  <p>{{ ucwords($research->agenda->title) }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Funding Type</label>
                  <p>{{ $research->funding_type }}</p>
                </div>

                <hr>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Publication</label>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Presentation</label>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Citation</label>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Competition</label>
                </div>

                <hr>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Completed Research</label>
                </div>
              </div>
              
              <a href="{{ route('fr.dashboard') }}" class="btn btn-danger">Go Back</a>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection