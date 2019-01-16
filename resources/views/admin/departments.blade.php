@extends('layout.app')

@section('title') College Departments Management @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> College Departments Management </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 table-responsive">
                  <p>
                    <a href="{{ route('admin.add.department') }}" class="btn btn-primary">Add College Departments</a>
                  </p>
                  @if(count($departments) > 0)
                    <table class="table">
                      <thead class="text-primary">
                        <th>Department Name</th>
                        <th>College</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($departments as $d)
                          <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->college->name }}</td>
                            <td>
                              <a href="" class="btn btn-primary">Update</a>
                              <a href="" class="btn btn-danger">Remove</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <p class="text-center">No Departments</p>
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