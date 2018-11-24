@extends('layout.app')

@section('title') Add Account @endsection

@section('content')

<div class="wrapper">

    @include('cc.includes.sidebar')

    <div class="main-panel">

      @include('cc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title ">Add Researcher</h4>
              <p class="card-category"> Complete the Profile </p>
            </div>
            <div class="card-body">
							@include('includes.all')

							<form action="{{ route('cc.add.account.post') }}" method="POST" autocomplete="off">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
                      <label class="bmd-label-floating">ID Number</label>
                      <input type="text" name="id_number" id="id_number" class="form-control">
                    </div>
									</div>
									<div class="col-md-6">
										{{-- <label class="bmd-label-floating">College Department</label> --}}
										<select name="department" id="department" class="form-control">
											<option value="">Select Department</option>
											@if(count($departments) > 0)
												@foreach($departments as $d)
													<option value="{{ $d->id }}">{{ $d->name }}</option>
												@endforeach
											@else
												<option value="">No Department</option>
											@endif
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="bmd-label-floating">Firstname</label>
											<input type="text" name="firstname" id="firstname" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="bmd-label-floating">Middlename</label>
											<input type="text" name="middlename" id="middlename" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="bmd-label-floating">Lastname</label>
											<input type="text" name="lastname" id="lastname" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label class="bmd-label-floating">Email</label>
											<input type="email" name="email" id="email" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="bmd-label-floating">Contact Number</label>
											<input type="text" name="contact_number" id="contact_number" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
											{{-- <label class="bmd-label-floating">User Type</label> --}}
											<select name="user_type" id="user_type" class="form-control">
												<option value="">Select User Type</option>
												<option value="8">Faculty Researcher</option>
												<option value="7">Department Research Chairperson</option>
											</select>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success">Add Account</button>
								</div>
							</form>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection