@extends('layout.app')

@section('title') Admin Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection