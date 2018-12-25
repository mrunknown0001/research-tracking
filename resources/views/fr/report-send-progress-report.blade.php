@extends('layout.app')

@section('title') Progress Report @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title "> Progress Report </h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              <form action="{{ route('fr.send.progress.report.post') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="research_id" value="{{ $id }}">
                <div class="row">
                  <div class="col-md-4">
                    <input type="file" name="file" id="file" accept="application/msword,.doc,.docx,application/pdf" multiple="" required>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Send</button>
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