@extends('layout.app')

@section('title') Outgoing Research @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          @include('includes.all')

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Outgoing Research Proceeding to College Research Evaluation Committee </h4>
              <p class="card-category"> Step 3 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($outgoing3) > 0)
                  <div class="table-responsive">

                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($outgoing3 as $r)
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
                              <form action="{{ route('fr.procced.outgoing.research.post') }}" method="POST">
                                <a href="{{ route('download.research.zip', ['id' => $r->id]) }}"><i class="material-icons">save_alt</i></a>
                                {{ csrf_field() }}
                                <input type="hidden" name="research_id" value="{{ $r->id }}">
                                <button type="submit" class="btn btn-success btn-sm">Proceed</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                @else
                  <p class="text-center">No Outgoing Research on Step 3</p>
                @endif
              </div>
            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Outgoing Research Proceeding to UREC </h4>
              <p class="card-category"> Step 6 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($outgoing6) > 0)
                  <div class="table-responsive">

                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($outgoing6 as $r)
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
                              <form action="{{ route('fr.procced.outgoing.research.post') }}" method="POST">
                                <a href="{{ route('download.research.zip', ['id' => $r->id]) }}"><i class="material-icons">save_alt</i></a>
                                {{ csrf_field() }}
                                <input type="hidden" name="research_id" value="{{ $r->id }}">
                                <button type="submit" class="btn btn-success btn-sm">Proceed</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                @else
                  <p class="text-center">No Outgoing Research on Step 6</p>
                @endif
              </div>
            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Outgoing Research Proceeding to RERC </h4>
              <p class="card-category"> Step 9 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($outgoing9) > 0)
                  <div class="table-responsive">

                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($outgoing9 as $r)
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
                              <form action="{{ route('fr.procced.outgoing.research.post') }}" method="POST">
                                <a href="{{ route('download.research.zip', ['id' => $r->id]) }}"><i class="material-icons">save_alt</i></a>
                                {{ csrf_field() }}
                                <input type="hidden" name="research_id" value="{{ $r->id }}">
                                <button type="submit" class="btn btn-success btn-sm">Proceed</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                @else
                  <p class="text-center">No Outgoing Research on Step 9</p>
                @endif
              </div>
            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Outgoing Research Proceeding to University Research Office </h4>
              <p class="card-category"> Step 11 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($outgoing11) > 0)
                  <div class="table-responsive">

                    <table class="table">
                      <thead class="text-warning">
                        <th class="text-center">Date &amp; Time Posted</th>
                        <th class="text-center">Tracking Number</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($outgoing11 as $r)
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
                              <form action="{{ route('fr.procced.outgoing.research.post') }}" method="POST">
                                <a href="{{ route('download.research.zip', ['id' => $r->id]) }}"><i class="material-icons">save_alt</i></a>
                                {{ csrf_field() }}
                                <input type="hidden" name="research_id" value="{{ $r->id }}">
                                <button type="submit" class="btn btn-success btn-sm">Proceed</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                @else
                  <p class="text-center">No Outgoing Research on Step 11</p>
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