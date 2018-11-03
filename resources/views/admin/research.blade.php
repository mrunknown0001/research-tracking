@extends('layout.app')

@section('title') Research @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">

          @foreach($colleges as $c)
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ ucwords($c->name) }}</h4>
                <p class="card-category">  </p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  @if(count($c->departments) > 0)
                    <table class="table">
                      <thead class=" text-primary">
                        <th class="">
                          Department
                        </th>
                        <th class="text-center">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($c->departments as $d)
                          <tr>
                            <td class="">
                              {{ ucwords($d->name) }}
                            </td>
                            <td class="text-center">
                              <a href="#">
                                <i class="material-icons">remove_red_eye</i>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <p class="text-center">No Department Available</p>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
      
        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection