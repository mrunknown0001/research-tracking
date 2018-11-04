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
								
									@if(count($d->assigned_fr) > 0  || (count($d->assigned_drc) > 0 && $d->assigned_drc->drc->active == 1))
										<table class="table">
											<thead>
												<th class="text-center">ID Number</th>
												<th class="text-center">Name</th>
												<th class="text-center">Email</th>
												<th class="text-center">Contact Number</th>
												<th class="text-center">Action</th>
											</thead>
											<tbody>
												@if(count($d->assigned_drc) > 0 && $d->assigned_drc->drc->active == 1)
													<tr>
														<td class="text-center">
															{{ $d->assigned_drc->drc->id_number }}
														</td>
														<td class="text-center">
															{{ ucwords($d->assigned_drc->drc->firstname . ' ' . $d->assigned_drc->drc->lastname) }}
														</td>
														<td class="text-center">
															{{ strtolower($d->assigned_drc->drc->email) }}
														</td>
														<td class="text-center">
															{{ strtolower($d->assigned_drc->drc->contact_number) }}
														</td>
														<td class="text-center">
															<a href="{{ route('cc.update.account', ['id' => $d->assigned_drc->drc->id]) }}" class="text-primary"><i class="material-icons">edit</i></a>
															<a href="javascript:void(0)" class="text-danger" data-toggle="modal" data-target="#accountDeleteDrc-{{ $d->assigned_drc->drc->id }}"><i class="material-icons">delete</i></a>
														</td>
														@include('cc.includes.modal-account-delete-drc')
													</tr>
												@endif
												
												@foreach($d->assigned_fr as $f)
													@if($f->researcher->active == 1)
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
																<a href="{{ route('cc.update.account', ['id' => $f->researcher->id]) }}" class="text-primary"><i class="material-icons">edit</i></a>
																<a href="javascript:void(0)" class="text-danger" data-toggle="modal" data-target="#deleteAccountFr-{{ $f->researcher->id }}"><i class="material-icons">delete</i></a></a>
															</td>
															@include('cc.includes.modal-account-delete-fr')
														</tr>
													@endif
												@endforeach

											</tbody>
										</table>
									@else
										<p class="text-center">No Researchers</p>
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
<script>

</script>
@endsection