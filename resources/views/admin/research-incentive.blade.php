@extends('layout.app')

@section('title') Research Incentive @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Research Incentive</h4>
              <p class="card-category"> {{ $research->title }} by {{ $research->author->firstname . ' ' . $research->author->lastname }} </p>
            </div>
            <div class="card-body">
              @include('includes.success')
              @include('includes.error')
              <form action="{{ route('admin.research.incentive.post') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <input type="hidden" name="research_id" value="{{ $research->id }}">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="publication_incentive" class="bmd-label-floating">Publication Incentive</label>
                    <input type="number" name="publication_incentive" id="publication_incentive" class="form-control" value="{{ $research->incentive->publication_incentive }}" min="0">
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="presentation_incentive" class="bmd-label-floating">Presentation Incentive</label>
                    <input type="number" name="presentation_incentive" id="presentation_incentive" class="form-control" value="{{ $research->incentive->presentation_incentive }}" min="0">
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="citation_incentive" class="bmd-label-floating">Citation Incentive</label>
                    <input type="number" name="citation_incentive" id="citation_incentive" class="form-control" value="{{ $research->incentive->citation_incentive }}" min="0">
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="competition_incentive" class="bmd-label-floating">Competition Incentive</label>
                    <input type="number" name="competition_incentive" id="competition_incentive" class="form-control" value="{{ $research->incentive->competition_incentive }}" min="0">
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="completed_research_incentive" class="bmd-label-floating">Completed Research Incentive</label>
                    <input type="number" name="completed_research_incentive" id="completed_research_incentive" class="form-control" value="{{ $research->incentive->completed_research_incentive }}" min="0">
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-6 form-group">
                    <button type="submit" class="btn btn-primary">Add Incentives</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection