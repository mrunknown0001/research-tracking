@extends('layout.app')

@section('title') Outgoing Research @endsection

@section('content')

<div class="wrapper">

    @include('oc.includes.sidebar')

    <div class="main-panel">

      @include('oc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

					@include('includes.all')

          @if(Auth::user()->user_type == 2)
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title "> Outgoing Research proceeding to Department Research Coordinator </h4>
                <p class="card-category"> Step 4 </p>
              </div>
              <div class="card-body">
              
                <div class="table-responsive">
                  @if(count($outgoing4) > 0)
                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($outgoing4 as $r)
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
                              <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#researchProceed-{{ $r->id }}">Proceed</button>
                            </td>
                            @include('oc.includes.modal-research-proceed-step-5')
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <p class="text-center">No Outgoing Research on Step 4</p>
                  @endif
                </div>

              </div>
            </div>

          @elseif(Auth::user()->user_type == 3)

            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title "> Outgoing Research proceeding to University Research Office </h4>
                <p class="card-category"> Step 7 </p>
              </div>
              <div class="card-body">
            
                <div class="table-responsive">
                  @if(count($outgoing7) > 0)
                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($outgoing7 as $r)
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
                              <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#researchProceed-{{ $r->id }}">Proceed</button>
                            </td>
                            @include('oc.includes.modal-research-proceed-step-8')
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <p class="text-center">No Outgoing Research on Step 7</p>
                  @endif
                </div>

              </div>
            </div>

          @elseif(Auth::user()->user_type == 4)

            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title "> Outgoing Research proceeding to Faculty Researcher </h4>
                <p class="card-category"> Step 10 </p>
              </div>
              <div class="card-body">
            
                <div class="table-responsive">
                  @if(count($outgoing10) > 0)
                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($outgoing10 as $r)
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
                              <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#researchProceed-{{ $r->id }}">Proceed</button>
                            </td>
                            @include('oc.includes.modal-research-proceed-step-11')
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <p class="text-center">No Outgoing Research on Step 10</p>
                  @endif
                </div>

              </div>
            </div>

          @elseif(Auth::user()->user_type == 5)

            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title "> Outgoing Research proceeding to URO </h4>
                <p class="card-category"> Step 13 </p>
              </div>
              <div class="card-body">
            
                <div class="table-responsive">
                  @if(count($outgoing13) > 0)
                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($outgoing13 as $r)
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
                              <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#researchProceed-{{ $r->id }}">Proceed</button>
                            </td>
                            @include('oc.includes.modal-research-proceed-step-13')
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <p class="text-center">No Outgoing Research on Step 13</p>
                  @endif
                </div>

              </div>
            </div>

          @else
            <p class="text-center">Error Occured Please Reload this Page.</p>
          @endif

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection