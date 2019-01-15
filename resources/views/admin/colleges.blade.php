@extends('layout.app')

@section('title') College Management @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> College Management </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 table-responsive">
                  <p>
                    <a href="{{ route('admin.add.college') }}" class="btn btn-primary">Add College</a>
                  </p>
                  @if(count($colleges) > 0)
                    <table class="table">
                      <thead class="text-primary">
                        <th>College</th>
                        <th>Code</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($colleges as $c)
                          <tr>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->code }}</td>
                            <td>
                              <a href="{{ route('admin.update.college', ['id' => $c->id]) }}" class="btn btn-primary">Update</a>
                              <a href="{{ route('admin.remove.college', ['id' => $c->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @endif
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection