@extends('layout.app')

@section('title') Progress Reports @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Progress Reports</h4>
              <p class="card-category"> {{ $research->title }} by {{ $research->author->firstname . ' ' . $research->author->lastname }} </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($research->progress_reports) > 0)
                  <table class="table">
                    <thead class="text-primary">
                      <th>Filename</th>
                      <th>Date Uploaded</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach($research->progress_reports as $p)
                      <tr>
                        <td>
                          {{ $p->original_filename }}
                        </td>
                        <td>
                          {{ $p->created_at != null ? date('F j, Y h:i a', strtotime($p->created_at)) : 'N/A' }}
                        </td>
                        <td>
                          <a href="{{ route('admin.download.progress.report', ['id' => $p->id]) }}"><i class="material-icons">save_alt</i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <p class="text-center">No Progress Reports</p>
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