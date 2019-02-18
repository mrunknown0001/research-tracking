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
                    <th class="text-center">ID Number</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Middle Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">College</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Contact Number</th>
                  </thead>
                  <tbody>
                    @foreach($accounts as $a)
                      <tr>
                        <td class="text-center">{{ $a->id_number }}</td>
                        <td class="text-center">{{ ucwords($a->firstname) }}</td>
                        <td class="text-center">{{ ucwords($a->middlename) }}</td>
                        <td class="text-center">{{ ucwords($a->lastname) }}</td>
                        <td class="text-center">
                          @if($a->user_type == 8)
                            {{ ucwords($a->frAssignment->college->name) }}
                          @elseif($a->user_type == 7)
                            {{ ucwords($a->drcAssignment->college->name) }}
                          @elseif($a->user_type == 6)
                            {{ !empty($a->collegeClerkAssignment) ? ucwords($a->collegeClerkAssignment->college->name) : 'N/A' }}
                          @else
                            N/A
                          @endif
                        </td>
                        <td class="text-center">{{ strtolower($a->email) }}</td>
                        <td class="text-center">{{ $a->contact_number }}</td>
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