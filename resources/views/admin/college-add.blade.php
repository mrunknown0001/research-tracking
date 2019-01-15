@extends('layout.app')

@section('title') College Management @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> {{ $college != null ? 'Update College' : 'Add College' }} </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <p>
                <a href="{{ route('admin.colleges') }}" class="btn btn-primary">Back to Colleges</a>
              </p>
              @include('includes.all')
              <div class="row">
                <div class="col-md-6">
                  <form action="{{ route('admin.store.college') }}" method="POST" autocomplete="off">
                    {{ csrf_field() }}
                    <input type="hidden" name="college_id" value="{{ $college != null ? $college->id : '' }}">
                    <div class="form-group">
                      <label for="name" class="bmd-label-floating">College Name</label>
                      <input type="text" name="name" id="name" value="{{ $college != null ? $college->name : '' }}" class="form-control"  required>
                    </div>
                    <div class="form-group">
                      <label for="code" class="bmd-label-floating">College Code</label>
                      <input type="text" name="code" id="code" value="{{ $college != null ? $college->code : '' }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">{{ $college != null ? 'Update College' : 'Add College' }}</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection