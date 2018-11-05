@extends('layout.app')

@section('title') Outgoing Research @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title "> Outgoing Research proceeding to Faculty Researcher </h4>
              <p class="card-category"> Step 2 </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
								<table class="table">
									<thead>
										<th>Date &amp; Time Posted </th>
										<th>Tracking Number</th>
										<th>Title</th>
										<th>Author(s)</th>
										<th>Action</th>
									</thead>
								</table>

              </div>
            </div>
          </div>

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection