@extends('layout.app')

@section('title') Research Details @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-info">
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
                  <p>{{ $research->colloquium_grade != null ? $research->colloquium_grade : 'N/A' }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Grade in UREC</label>
                  <p>{{ $research->urec_grade != null ? $research->urec_grade : 'N/A' }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">University Research Agenda</label>
                  <p>{{ $research->agenda != null ? ucwords($research->agenda->title) : 'N/A' }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Funding Type</label>
                  <p>{{ $research->funding_type != null ? $research->funding_type : 'N/A' }}</p>
                </div>

                <hr>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Publication</label>
                  <p>{{ $research->incentive != null ? $research->incentive->publication_incentive : 'N/A' }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Presentation</label>
                  <p>{{ $research->incentive != null ? $research->incentive->presentation_incentive : 'N/A' }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Citation</label>
                  <p>{{ $research->incentive != null ? $research->incentive->citation_incentive : 'N/A' }}</p>
                </div>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Competition</label>
                  <p>{{ $research->incentive != null ? $research->incentive->competition_incentive : 'N/A' }}</p>
                </div>

                <hr>
                <div class="col-md-3">
                  <label class="text-warning">Incentive in Completed Research</label>
                  <p>{{ $research->incentive != null ? $research->incentive->completed_research_incentive : 'N/A' }}</p>
                </div>
              </div>
              
              <a href="{{ route('drc.dashboard') }}" class="btn btn-danger">Go Back</a>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection