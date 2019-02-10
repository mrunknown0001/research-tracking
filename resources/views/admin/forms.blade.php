@extends('layout.app')

@section('title') Forms @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          @include('includes.all')

          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> Replace Form </h4>
                  <p class="card-category">  </p>
                </div>
                <div class="card-body">
                  <form action="{{ route('admin.form.update.post') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <select name="form" id="form" class="form-control" placeholder="Form to be replaced *">
                        <option value="">Select Form to Replace</option>
                        @foreach($forms as $f)
                          <option value="{{ $f->id }}">{{ $f->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">

                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-rose btn-file">
                          <span onclick="triggerClick()" class="fileinput-new" id="filename">Upload Form</span>
                          <input type="file" oninput="showfilename()" name="file" id="file" accept="application/pdf" />
                        </span>
                      </div>

                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Replace</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
    

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> TSU - Research Office Forms </h4>
              <p class="card-category"> List of Forms </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table">
                  <thead class="text-primary">
                    <th>Form Name</th>
                    <th class="text-center">Action</th>
                  </thead>
                  <tbody>
                    @foreach($forms as $f)
                      <tr>
                        <td>{{ $f->name . ' - ' . $f->alias }}</td>
                        <td class="text-center">
                          <a href="{{ route('admin.download.form', ['filename' => $f->filename]) }}">
                            <i class="material-icons">save_alt</i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>
<script>
  function triggerClick() {
    $('#file').trigger( "click" );
  }

  function showfilename() {
    var fullPath = document.getElementById('file').value;
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
        
        document.getElementById("filename").innerHTML = filename;
    }
  }
</script>
@endsection