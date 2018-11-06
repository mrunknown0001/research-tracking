@extends('layout.app')

@section('title') Research Update @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Update Reserach </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
          
              @include('includes.all')

							<form action="#" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
								<div class="form-group">
									<label class="bmd-label-floating">Research Title</label>
                  <input type="text" name="title" id="title" value="{{ ucwords($research->title) }}" class="form-control" required>
								</div>
								<div class="row">
									<div class="col-md-12">
                    <div class="form-group">
  										<label class="bmd-label-floating">Co Authors</label>
  	                  <select type="text" name="co_authors" id="co_authors" class="form-control" required>
                        <option value="">Select Co-Author</option>
                        @foreach($researchers as $r)
                          <option value="{{ $r->id }}">{{ $r->firstname . ' ' . $r->lastname }}</option>
                        @endforeach
                      </select>
                    </div>
									</div>
								</div>
                @foreach($research->files as $file)
                  <div class="row">
                    <div class="col-md-3">
                      <p>{{ $file->original_filename }}</p>
                    </div>
                    <hr>
                    <div class="col-md-6">
                      <input type="file" name="{{ $file->id }}" id="files" accept="application/msword,.doc,.docx,application/pdf">
                    </div>
                  </div>
                @endforeach
								<div class="form-group">
									<button type="submit" class="btn btn-success">Update Research</button>
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