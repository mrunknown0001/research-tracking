@extends('layout.app')

@section('title') Outgoing Research @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          @include('includes.all')

          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title "> Outgoing Research proceeding to Faculty Researcher </h4>
              <p class="card-category"> Step 2 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($outgoing2) > 0)
  								<table class="table">
  									<thead>
  										<th class="text-center">Date &amp; Time Posted </th>
  										<th class="text-center">Tracking Number</th>
  										<th class="text-center">Title</th>
  										<th class="text-center">Author(s)</th>
  										<th class="text-center">Action</th>
  									</thead>
                    <tbody>
                      @foreach($outgoing2 as $r)
                        <tr>
                          <td class="text-center">
                            {{ $r->time_posted }}
                          </td>
                          <td class="text-center">
                            {{ $r->tracking_number }}
                          </td>
                          <td class="text-center">
                            {{ ucwords($r->title) }}
                          </td>
                          <td class="text-center">
                            {{ ucwords($r->author->firstname . ' ' . $r->author->lastname) }}
                            @if(count($r->co_author) > 0)
                              @foreach($r->co_author as $ca)
                                , {{ ucwords($ca->researcher->firstname . ' ' . $ca->researcher->lastname) }}
                              @endforeach
                            @endif
                          </td>
                          <td class="text-center">
                            <a href="{{ route('download.research.zip', ['id' => $r->id]) }}"><i class="material-icons">save_alt</i></a>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#researchProceed-{{ $r->id }}">Proceed</button>
                          </td>
                          @include('drc.includes.modal-research-proceed')
                        </tr>
                      @endforeach
                    </tbody>
  								</table>
                @else
                  <p class="text-center">No Outgoing Research on Step 2</p>
                @endif

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title "> Outgoing Research proceeding to Faculty Researcher </h4>
              <p class="card-category"> Step 5 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($outgoing5) > 0)
                  <table class="table">
                    <thead>
                      <th class="text-center">Date &amp; Time Posted </th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author(s)</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($outgoing5 as $r)
                        <tr>
                          <td class="text-center">
                            {{ $r->time_posted }}
                          </td>
                          <td class="text-center">
                            {{ $r->tracking_number }}
                          </td>
                          <td class="text-center">
                            {{ ucwords($r->title) }}
                          </td>
                          <td class="text-center">
                            {{ ucwords($r->author->firstname . ' ' . $r->author->lastname) }}
                            @if(count($r->co_author) > 0)
                              @foreach($r->co_author as $ca)
                                , {{ ucwords($ca->researcher->firstname . ' ' . $ca->researcher->lastname) }}
                              @endforeach
                            @endif
                          </td>
                          <td class="text-center">
                            <a href="{{ route('download.research.zip', ['id' => $r->id]) }}"><i class="material-icons">save_alt</i></a>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#researchProceed-{{ $r->id }}">Proceed</button>
                          </td>
                          @include('drc.includes.modal-research-proceed-step-6')
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <p class="text-center">No Outgoing Research on Step 5</p>
                @endif
              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection