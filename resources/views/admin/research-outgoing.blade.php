@extends('layout.app')

@section('title') Outgoing Research @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          @include('includes.all')

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Proceed to Faculty Researcher </h4>
              <p class="card-category"> Step 8 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                @if(count($outgoing8) > 0)
                  <table class="table">
                    <thead class="text-primary">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($outgoing8 as $r)
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
                          @include('admin.includes.modal-research-proceed-step-9')
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <p class="text-center">No Outgoing Research for Step 8</p>
                @endif

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Proceed to Office of the University President </h4>
              <p class="card-category"> Step 12 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if(count($outgoing12) > 0)
                  <table class="table">
                    <thead class="text-primary">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($outgoing12 as $r)
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
                          @include('admin.includes.modal-research-proceed-step-13')
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <p class="text-center">No Outgoing Research for Step 12</p>
                @endif

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Proceed to Faculty Researcher  </h4>
              <p class="card-category"> Step 14 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if(count($outgoing14) > 0)
                  <table class="table">
                    <thead class="text-primary">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($outgoing14 as $r)
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
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#">Proceed</button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <p class="text-center">No Outgoing Research for Step 14</p>
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