@extends('layout.app')

@section('title') Office Clerk Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('oc.includes.sidebar')

    <div class="main-panel">

      @include('oc.includes.navbar')

      <div class="content">
        <div class="container-fluid">


        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection