@extends('layout.app')

@section('title') College Clerk Management @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> College Clerk Management </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 table-responsive">
                  <p>
                    <a href="{{ route('admin.add.college.clerk') }}" class="btn btn-primary">Add College Clerk</a>
                  </p>
                  @if(count($clerks) > 0)
                    <table class="table">
                      <thead class="text-primary">
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>College</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($clerks as $c)
                          @if($c->collegeClerkAssignment != null)
                          <tr>
                            <td>{{ $c->lastname }}</td>
                            <td>{{ $c->firstname }}</td>
                            <td>{{ $c->collegeClerkAssignment->college->name }}</td>
                            <td>
                              <a href="{{ route('admin.remove.college.clerk', ['id' => encrypt($c->id)]) }}" class="btn btn-danger">Remove College Clerk</a>
                            </td>
                          </tr>
                          @endif
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <p class="text-center">No College Clerk</p>
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