@extends('layout.app')

@section('title') College Clerk Management @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Add College Clerk </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 table-responsive">
                  <p>
                    <a href="{{ route('admin.college.clerks') }}" class="btn btn-primary">Back to College Clerks</a>
                  </p>
                  @include('includes.all')
                  <div class="row">
                    <div class="col-md-6">
                      <form action="{{ route('admin.store.college.clerk') }}" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="clerk_id" value="{{ $clerk != null ? $clerk->id : '' }}">
                        <div class="form-group">
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
                          <label for="id_number" class="bmd-label-floating">Enter ID Number</label>
                          <input type="text" name="id_number" id="id_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="firstname" class="bmd-label-floating">Enter Firstname</label>
                          <input type="text" name="firstname" id="firstname" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="middlename" class="bmd-label-floating">Enter Middlename</label>
                          <input type="text" name="middlename" id="middlename" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="lastname" class="bmd-label-floating">Enter Lastname</label>
                          <input type="text" name="lastname" id="lastname" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Clerk</button>
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