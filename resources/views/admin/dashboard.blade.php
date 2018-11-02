@extends('layout.app')

@section('title') Admin Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Audit Trail</h4>
              <p class="card-category"> Audit Trail </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      User
                    </th>
                    <th>
                      User Type
                    </th>
                    <th>
                      Transaction
                    </th>
                    <th>
                      Date &amp; Time
                    </th>
                  </thead>
                  <tbody>
                    @foreach($logs as $l)
                      <tr>
                        <td>{{ $l->user->firstname . ' ' . $l->user->lastname }}</td>
                        <td>{{ $l->user->user_type }}</td>
                        <td>{{ $l->transaction }}</td>
                        <td>{{ $l->created_at }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="text-primary text-center">{{ $logs->links() }}</div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Incomming Research</h4>
              <p class="card-category"> Incomming </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">


              </div>
            </div>
          </div>
        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection