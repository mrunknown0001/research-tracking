@extends('layout.app')

@section('title') College Departments Management @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> {{ $department != null ? 'Update' : 'Add' }} College Department </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <p>
                    <a href="{{ route('admin.departments') }}" class="btn btn-primary">Back to College Departments</a>
                  </p>
                  @include('includes.all')
                  <div class="row">
                    <div class="col-md-6">
                      <form action="{{ route('admin.store.department') }}" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="department_id" value="{{ $department != null ? $department->id : '' }}">
                        <div class="form-group">
                          <label for="college" class="bmd-label-floating">Select College</label>
                          <select name="college" id="college" class="form-control" required>
                            <option value="">Select College</option>
                            @if(count($colleges) > 0)
                              @foreach($colleges as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="name" class="bmd-label-floating">Department Name</label>
                          <input type="text" name="name" id="name" value="" class="form-control"  required>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{ $department != null ? 'Update Department' : 'Add Department' }}</button>
                        </div>
                      </form>
                    </div>
                  </div>
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