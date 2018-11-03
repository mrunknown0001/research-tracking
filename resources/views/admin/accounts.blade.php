@extends('layout.app')

@section('title') Accounts @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Account List </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table">
                  <thead class="text-primary">
                    <th>ID Number</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>College</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                  </thead>
                  <tbody>
                    @foreach($accounts as $a)
                      <tr>
                        <td>{{ $a->id_number }}</td>
                        <td>{{ ucwords($a->firstname) }}</td>
                        <td></td>
                        <td>{{ ucwords($a->lastname) }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="text-primary text-center">{{ $accounts->links() }}</div>
              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection