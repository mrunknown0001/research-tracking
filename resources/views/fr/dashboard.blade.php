@extends('layout.app')

@section('title') Faculty Researchers Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Upload Research </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
          
              @include('includes.all')

							<form action="{{ route('fr.submit.research.post') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
								<div class="form-group">
									<label class="bmd-label-floating">Research Title</label>
                  <input type="text" name="title" id="title" class="form-control" required>
								</div>
								<div class="row">
									<div class="col-md-8">
										<label class="bmd-label-floating">Co Authors</label>
	                  <select type="text" name="co_authors" id="co_authors" class="form-control" required>
                      <option value="">Select Co-Author</option>
                      @foreach($researchers as $r)
                        <option value="{{ $r->id }}">{{ $r->firstname . ' ' . $r->lastname }}</option>
                      @endforeach
                    </select>
									</div>
									<div class="col-md-4">
										<input type="file" name="files[]" id="files" multiple accept="application/msword,.doc,.docx,application/pdf">
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success">Update</button>
								</div>
							</form>

            </div>
          </div>

          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Research Documents </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">

            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection