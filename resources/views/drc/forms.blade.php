@extends('layout.app')

@section('title') Forms @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title "> TSU - Research Office Forms </h4>
              <p class="card-category"> List of Forms </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table">
                  <thead class="">
                    <th>From Name</th>
                    <th class="text-center">Action</th>
                  </thead>
                  <tbody>
                    @foreach($forms as $f)
                      <tr>
                        <td>{{ $f->name . ' - ' . $f->alias }}</td>
                        <td class="text-center">
                          <a href="{{ route('admin.download.form', ['filename' => $f->filename]) }}">
                            <i class="material-icons">save_alt</i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection