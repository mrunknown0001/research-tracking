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
												<th class="text-center">ID Number</th>
												<th class="text-center">Name</th>
												<th class="text-center">Email</th>
												<th class="text-center">Contact Number</th>
												<th class="text-center">Action</th>
											</thead>
											<tbody>
												@foreach($d->assigned_fr as $f)
													<tr>
														<td class="text-center">
															{{ $f->researcher->id_number }}
														</td>
														<td class="text-center">
															{{ ucwords($f->researcher->firstname . ' ' . $f->researcher->lastname) }}
														</td>
														<td class="text-center">
															{{ strtolower($f->researcher->email) }}
														</td>
														<td class="text-center">
															{{ strtolower($f->researcher->contact_number) }}
														</td>
														<td class="text-center">
															<a href="#" alt="Edit"><i class="material-icons">edit</i></a>
															<a href="#" alt="Delete"><i class="material-icons">delete</i></a>
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