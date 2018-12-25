@extends('layout.app')

@section('title') Department Research @endsection

@section('content')

<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

      @include('admin.includes.navbar')

      <div class="content">
        <div class="container-fluid">
          
            <a href="{{ route('admin.research') }}" class="btn btn-primary">Back to Research</a>
          
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ ucwords($department->name) }} ({{ ucwords($department->college->name) }})</h4>
                <p class="card-category">  </p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  @if(count($department->researches) > 0)
                    <table class="table">
                      <thead class=" text-primary">
                        <th class="">
                          Title
                        </th>
                        <th>
                          Researcher
                        </th>
                        <th class="text-center">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($department->researches as $r)
                          <tr>
                            <td>
                              {{ ucwords($r->title) }}
                            </td>
                            <td>
                              {{ ucwords($r->author->firstname . ' ' . $r->author->lastname) }}
                            </td>
                            <td class="text-center">
                              <a href="{{ route('admin.research.tracking', ['id' => encrypt($r->id)]) }}"><i class="material-icons">visibility</i></a>
                              <a href="{{ route('admin.research.incentive', ['id' => encrypt($r->id)]) }}" alt="Add Incentive">&#8369;</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <p class="text-center">No Research on This Department</p>
                  @endif
                </div>
              </div>
            </div>
        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection