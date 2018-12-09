@extends('layout.app')

@section('title') DRC Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title "> Research Documents </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($researches) > 0)
                  <table class="table">
                    <thead class="text-success">
                      <th class="text-center">Tracking No.</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Track Document</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @if(count($researches) > 0)
                        @foreach($researches as $r)
                          <tr>
                            <td class="text-center">{{ $r->tracking_number }}</td>
                            <td class="text-center">{{ ucwords($r->title) }}</td>
                            <td class="text-center">{{ ucwords($r->author->firstname . ' ' . $r->author->lastname) }}</td>
                            <td class="text-center">
                              <a href="{{ route('drc.track.research.document', ['id' => $r->id]) }}"><i class="material-icons">visibility</i></a>
                              <a href="#"><i class="material-icons">assignment</i></a>
                            </td>
                            <td class="text-center">
                              <a href="{{ route('download.research.zip', ['id' => $r->id]) }}"><i class="material-icons">save_alt</i></a>
                              
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                @else
                  <p class="text-center">No Research Found!</p>
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