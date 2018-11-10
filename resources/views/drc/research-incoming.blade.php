@extends('layout.app')

@section('title') Incoming Research @endsection

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
              <h4 class="card-title "> Incoming Research From Faculty Researcher </h4>
              <p class="card-category"> Step 2 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                @if(count($incoming2) > 0)  
  								<table class="table">
  									<thead>
  										<th class="text-center">Date &amp; Time Posted </th>
  										<th class="text-center">Tracking Number</th>
  										<th class="text-center">Title</th>
  										<th class="text-center">Author(s)</th>
  										<th class="text-center">Action</th>
  									</thead>
                    <tbody>
                      @foreach($incoming2 as $r)
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
                            <form action="{{ route('drc.receive.incoming.research.post') }}" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="research_id" value="{{ $r->id }}">
                              <button type="submit" class="btn btn-success btn-sm">Receive</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
  								</table>
                @else
                  <p class="text-center">No Research Found</p>
                @endif

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title "> Incoming Research From Faculty Researcher </h4>
              <p class="card-category"> Step 5 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                @if(count($incoming5) > 0)
                  <table class="table">
                    <thead>
                      <th class="text-center">Date &amp; Time Posted </th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author(s)</th>
                      <th class="text-center">Action</th>
                    </thead>
                  </table>
                @else
                  <p class="text-center">No Research Found</p>
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