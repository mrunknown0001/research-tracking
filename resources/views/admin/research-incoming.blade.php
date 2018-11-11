@extends('layout.app')

@section('title') Incoming Research @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Incoming Research From UREC </h4>
              <p class="card-category"> Step 8 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if(count($incoming8) > 0)
                  <table class="table">
                    <thead class="text-primary">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($incoming8 as $r)
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
                            <form action="{{ route('admin.receive.incoming.research.post') }}" method="POST">
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
                  <p class="text-center">No Incoming Research on Step 8</p>
                @endif

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Incoming Research From Faculty Researcher </h4>
              <p class="card-category"> Step 12 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if(count($incoming12) > 0)
                  <table class="table">
                    <thead class="text-primary">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($incoming12 as $r)
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
                            <form action="{{ route('admin.receive.incoming.research.post') }}" method="POST">
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
                  <p class="text-center">No Incoming Research on Step 12</p>
                @endif

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Incoming Research From Office of the University President </h4>
              <p class="card-category"> Step 14 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if(count($incoming14) > 0)
                  <table class="table">
                    <thead class="text-primary">
                      <th class="text-center">Date &amp; Time Posted</th>
                      <th class="text-center">Tracking Number</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($incoming14 as $r)
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
                            <form action="{{ route('admin.receive.incoming.research.post') }}" method="POST">
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
                  <p class="text-center">No Incoming Research on Step 14</p>
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