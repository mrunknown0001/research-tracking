@extends('layout.app')

@section('title') DRC Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title "> Research Documents </h4>
              <p class="card-category">  </p>
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