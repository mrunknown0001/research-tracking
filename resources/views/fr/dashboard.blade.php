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

							<form action="{{ route('fr.submit.research.post') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}
								<div class="form-group">
									<label class="bmd-label-floating">Research Title</label>
                  <input type="text" name="title" id="title" class="form-control" required>
								</div>
								<div class="row">
									<div class="col-md-8">
										<label class="bmd-label-floating">Co Authors</label>
	                  <select type="text" name="co_authors" id="co_authors" class="form-control" >
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
									<button type="submit" class="btn btn-success">Submit</button>
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
              <div class="table-responsive">
                @if(count($researches) > 0 || count($co_researches) > 0)
                  <table class="table">
                    <thead class="text-success">
                      <th class="text-center">Tracking No.</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Author</th>
                      <th class="text-center">Track Document</th>
                      <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                      @if(count($researches) > 0)
                        @foreach($researches as $r)
                          <tr>
                            <td class="text-center">{{ $r->tracking_number }}</td>
                            <td class="text-center">{{ ucwords($r->title) }}</td>
                            <td class="text-center">{{ ucwords($r->author->firstname . ' ' . $r->author->lastname) }}</td>
                            <td class="text-center">
                              <a href="{{ route('fr.track.research.document', ['id' => $r->id]) }}"><i class="material-icons">visibility</i></a>
                              <a href="{{ route('fr.research.details', ['id' => $r->id]) }}"><i class="material-icons">assignment</i></a>
                            </td>
                            <td class="text-center">
                              <a href="{{ route('download.research.zip', ['id' => $r->id]) }}"><i class="material-icons">save_alt</i></a>
                              <a href="{{ route('fr.research.update', ['id' => $r->id]) }}" class="btn btn-primary">Update</a>
                              <a href="#" class="btn btn-success">Progress Report</a>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                      @if(count($co_researches) > 0)
                        @foreach($co_researches as $r)
                          <tr>
                            <td class="text-center">{{ $r->research->tracking_number }}</td>
                            <td class="text-center">{{ ucwords($r->research->title) }}</td>
                            <td class="text-center">{{ ucwords($r->researcher->firstname . ' ' . $r->researcher->lastname) }}</td>
                            <td class="text-center">
                              <a href="{{ route('fr.track.research.document', ['id' => $r->research->id]) }}"><i class="material-icons">visibility</i></a>
                              <a href="{{ route('fr.research.details', ['id' => $r->research->id]) }}"><i class="material-icons">assignment</i></a>
                            </td>
                            <td class="text-center">
                              <a href="{{ route('download.research.zip', ['id' => $r->research->id]) }}"><i class="material-icons">save_alt</i></a>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                @else
                  <p class="text-center">No Research Found!</p>
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