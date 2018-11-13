@extends('layout.app')

@section('title') Send Requests / Forms @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

					<div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Send Requests / Forms </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">

							@include('includes.all')

							<form action="{{ route('fr.form.request.post') }}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="bmd-label-floating">Comment</label>
                  <input type="text" name="comment" id="comment" class="form-control" required>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
		                  <select name="form" id="form" class="form-control" required>
		                  	<option value="">Form Type</option>
		                  	@foreach($forms as $f)
													<option value="{{ $f->id }}">{{ $f->name }}</option>
		                  	@endforeach
		                  </select>
										</div>
									</div>
									<div class="col-md-4">
										<input type="file" name="file" id="file" accept="application/pdf" required>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success">Send</button>
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