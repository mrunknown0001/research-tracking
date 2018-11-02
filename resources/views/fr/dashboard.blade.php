@extends('layout.app')

@section('title') Faculty Researchers Dashboard @endsection

@section('content')

<div class="wrapper">

    @include('fr.includes.sidebar')

    <div class="main-panel">

      @include('fr.includes.navbar')

      <div class="content">
        <div class="container-fluid">


        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection