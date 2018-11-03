@extends('layout.app')

@section('title') Incoming Research @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> Replace Form </h4>
                  <p class="card-category">  </p>
                </div>
                <div class="card-body">
                  <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <select name="form" id="form" class="form-control" placeholder="Form to be replaced *">
                        <option>Select Form</option>
                      </select>
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


              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection