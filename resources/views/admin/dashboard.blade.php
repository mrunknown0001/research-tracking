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
              <p class="card-category"> Logs </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th class="text-center">
                      User
                    </th>
                    <th class="text-center">
                      User Type
                    </th>
                    <th class="text-center">
                      Transaction
                    </th>
                    <th class="text-center">
                      Date &amp; Time
                    </th>
                  </thead>
                  <tbody>
                    @foreach($logs as $l)
                      <tr>
                        <td class="text-center">{{ ucwords($l->user->firstname . ' ' . $l->user->lastname) }}</td>
                        <td class="text-center">
                          @if($l->user->user_type == 1)
                            Admin
                          @elseif($l->user->user_type == 8)
                            Researcher
                          @elseif($l->user->user_type == 7)
                            DRC
                          @elseif($l->user->user_type == 6)
                            College Clerk
                          @elseif($l->user->user_type == 2)
                            Office Clerk
                          @else
                            Unknown
                          @endif
                        </td>
                        <td class="text-center">{{ $l->transaction }}</td>
                        <td class="text-center">{{ date('l, F j, Y g:i:s a', strtotime($l->created_at)) }}</td>
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
              <h4 class="card-title ">Ingoing Request Forms/Forms From Researchers</h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if(count($form_requests) > 0)
                  <table class="table">
                    <thead>
                      <th class="text-center">Form Name</th>
                      <th class="text-center">Researcher/DRC</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @foreach($form_requests as $f)
                        <tr>
                          <td class="text-center">{{ $f->form->name }}</td>
                          <td class="text-center">
                            @if($f->researcher_id != null)
                              {{ ucwords($f->researcher->firstname . ' ' . $f->researcher->lastname) }}
                            @else
                              {{ ucwords($f->drc->firstname . ' ' . $f->drc->lastname) }}
                            @endif
                          </td>
                          <td class="text-center">
                            <a href="{{ route('download.form.request', ['id' => $f->id]) }}"><i class="material-icons">save_alt</i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <p class="text-center">No Form Requests</p>
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