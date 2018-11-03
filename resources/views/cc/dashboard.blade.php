@extends('layout.app')

@section('title') College Clerk Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('cc.includes.sidebar')

    <div class="main-panel">

      @include('cc.includes.navbar')

      <div class="content">
        <div class="container-fluid">


        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection