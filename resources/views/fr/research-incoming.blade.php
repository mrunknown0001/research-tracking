@extends('layout.app')

@section('title') Incoming Research @endsection

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
              <h4 class="card-title "> Incoming Research from Research Chairperson </h4>
              <p class="card-category"> Step 3 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if(count($incoming3) > 0)
                  <table class="table">
                    <thead class="text-warning">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($incoming3 as $r)
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
                            <form action="{{ route('fr.receive.incoming.research.post') }}" method="POST">
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
                  <p class="text-center">No Incoming Research on Step 3</p>
                @endif

              </div>
            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Incoming Research from Research Chairperson </h4>
              <p class="card-category"> Step 6 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($incoming6) > 0)
                  <table class="table">
                    <thead class="text-warning">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($incoming6 as $r)
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
                            <form action="{{ route('fr.receive.incoming.research.post') }}" method="POST">
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
                  <p class="text-center">No Incoming Research in Step 6</p>
                @endif
              </div>
            </div>
          </div>

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Incoming Research from University Research Office </h4>
              <p class="card-category"> Step 9 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($incoming9) > 0)
                  <table class="table">
                    <thead class="text-warning">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($incoming9 as $r)
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
                            <form action="{{ route('fr.receive.incoming.research.post') }}" method="POST">
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
                  <p class="text-center">No Incoming Research on Step 9</p>
                @endif
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Incoming Research from Research Ethics and Review Committee </h4>
              <p class="card-category"> Step 11 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($incoming11) > 0)
                  <table class="table">
                    <thead class="text-warning">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($incoming11 as $r)
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
                            <form action="{{ route('fr.receive.incoming.research.post') }}" method="POST">
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
                  <p class="text-center">No Incoming Research on Step 11</p>
                @endif
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Incoming Research from University Research Office </h4>
              <p class="card-category"> Step 15 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($incoming15) > 0)
                  <table class="table">
                    <thead class="text-warning">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($incoming15 as $r)
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
                            <form action="{{ route('fr.receive.incoming.research.post') }}" method="POST">
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
                  <p class="text-center">No Incoming Research on Step 15</p>
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