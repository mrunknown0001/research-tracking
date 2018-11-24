@extends('layout.app')

@section('title') Incoming Research @endsection

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
                <h4 class="card-title "> Incoming Research from Faculty Researcher </h4>
                <p class="card-category"> Step 4 </p>
              </div>
              <div class="card-body">
            
                <div class="table-responsive">

                  @if(count($incoming4) > 0)
                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($incoming4 as $r)
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
                              <form action="{{ route('oc.receive.incoming.research.post') }}" method="POST">
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
                    <p class="text-center">No Incoming Research on Step 4</p>
                  @endif
                </div>


              </div>
            </div>
          @elseif(Auth::user()->user_type == 3)
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title "> Incoming Research from Faculty Researcher </h4>
                <p class="card-category"> Step 7 </p>
              </div>
              <div class="card-body">
            
                <div class="table-responsive">

                  @if(count($incoming7) > 0)
                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($incoming7 as $r)
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
                              <form action="{{ route('oc.receive.incoming.research.post') }}" method="POST">
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
                    <p class="text-center">No Incoming Research on Step 7</p>
                  @endif
                </div>

              </div>
            </div>
          @elseif(Auth::user()->user_type == 4)
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title "> Incoming Research from Faculty Researcher </h4>
                <p class="card-category"> Step 10 </p>
              </div>
              <div class="card-body">
            
                <div class="table-responsive">

                  @if(count($incoming10) > 0)
                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($incoming10 as $r)
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
                              <form action="{{ route('oc.receive.incoming.research.post') }}" method="POST">
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
                    <p class="text-center">No Incoming Research on Step 10</p>
                  @endif
                </div>

              </div>
            </div>
          @elseif(Auth::user()->user_type == 5)
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title "> Incoming Research from University Research Office </h4>
                <p class="card-category"> Step 13 </p>
              </div>
              <div class="card-body">
            
                <div class="table-responsive">

                  @if(count($incoming13) > 0)
                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($incoming13 as $r)
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
                              <form action="{{ route('oc.receive.incoming.research.post') }}" method="POST">
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
                    <p class="text-center">No Incoming Research on Step 13</p>
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