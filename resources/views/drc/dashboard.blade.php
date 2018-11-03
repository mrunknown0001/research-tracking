@extends('layout.app')

@section('title') DRC Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">


        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection