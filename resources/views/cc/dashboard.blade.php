@extends('layout.app')

@section('title') College Clerk Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('cc.includes.sidebar')

    <div class="main-panel">

      @include('cc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

				@if(count($departments) > 0)
					
					@foreach($departments as $d)
						<div class="card">
	            <div class="card-header card-header-warning">
	              <h4 class="card-title ">{{ ucwords($d->name) }} Department</h4>
	              <p class="card-category">  </p>
	            </div>
	            <div class="card-body">
	              <div class="table-responsive">
								
									@if(count($d->assigned_fr) > 0)
										<table class="table">
											<thead>
												<th>ID Number</th>
												<th>Name</th>
												<th>Email</th>
												<th>Contact Number</th>
												<th>Action</th>
											</thead>
											<tbody>
												@foreach($d->assigned_fr as $f)
													<tr>
														<td>
															{{ $f->researcher->id_number }}
														</td>
														<td>
															{{ ucwords($f->researcher->firstname . ' ' . $f->researcher->lastname) }}
														</td>
														<td>
															{{ strtolower($f->researcher->email) }}
														</td>
														<td>
															{{ strtolower($f->researcher->contact_number) }}
														</td>
														<td>
															update|remove
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									@else
										<p class="text-center">No Research</p>
									@endif

	              </div>
	            </div>
	          </div>
					@endforeach

				@else
					<p class="text-center">No Departments</p>
				@endif

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection