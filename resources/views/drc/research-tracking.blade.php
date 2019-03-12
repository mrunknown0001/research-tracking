@extends('layout.app')

@section('title') Research Tracking @endsection

@section('content')

<div class="wrapper">

    @include('drc.includes.sidebar')

    <div class="main-panel">

      @include('drc.includes.navbar')

      <div class="content">
        <div class="container-fluid">
          <a href="{{ route('drc.dashboard') }}" class="btn btn-primary">Go Back</a>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">  Research Tracking: {{ ucwords($research->title) }}</h4>
              <p class="card-category">  </p>
            </div>
            <div class="card-body">
              

              <div id="accordion">
                <div class="card">
                  <div class="card-header card-header-primary" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link">
                        <h5 class="card-title">1. Faculty Researcher</h5>
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse {{ $research->step_number == 1 ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Released</th>
                          <td></td>
                        </thead>
                        <tbody>
                          <td>{{ $research->created_at }}</td>
                          <td></td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header card-header-primary" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h5 class="card-title">2. department research coordinator</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse {{ $research->step_number == 2 ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                        </tbody>
                      </table>


                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header card-header-primary" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h5 class="card-title">3. Faculty Researcher</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse {{ $research->step_number == 3 ? 'show' : '' }}" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingFour">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <h5 class="card-title">4. College research Evaluation Committee</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseFour" class="collapse {{ $research->step_number == 4 ? 'show' : '' }}" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Status</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td></td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_4_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingFive">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <h5 class="card-title">5. department research coordinator</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseFive" class="collapse {{ $research->step_number == 5 ? 'show' : '' }}" aria-labelledby="headingFive" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_5_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingSix">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                        <h5 class="card-title">6. Faculty Researcher</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseSix" class="collapse  {{ $research->step_number == 6 ? 'show' : '' }}" aria-labelledby="headingSix" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingSeven">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                        <h5 class="card-title">7. UREC</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseSeven" class="collapse {{ $research->step_number == 7 ? 'show' : '' }}" aria-labelledby="headingSeven" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_7_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingEight">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                        <h5 class="card-title">8. University Research Office</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseEight" class="collapse {{ $research->step_number == 8 ? 'show' : '' }}" aria-labelledby="headingEight" data-parent="#accordion">
                    <div class="card-body">

                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                          <th>Grade in UREC</th>
                          <th>University Research Agenda</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                          <td>{{ $research->urec_grade }}</td>
                          <td>{{ $research->agenda_id != null ? $research->agenda->title : '' }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_8_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingNine">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                        <h5 class="card-title">9. Faculty Researcher</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseNine" class="collapse {{ $research->step_number == 9 ? 'show' : '' }}" aria-labelledby="headingNine" data-parent="#accordion">
                    <div class="card-body">

                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                          <th>Grade in UREC</th>
                          <th>University Research Agenda</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                          <td>{{ $research->urec_grade }}</td>
                          <td>{{ $research->agenda_id != null ? $research->agenda->title : '' }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_10_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingTen">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                        <h5 class="card-title">10. Research Ethics and Review Committee</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTen" class="collapse {{ $research->step_number == 10 ? 'show' : '' }}" aria-labelledby="headingTen" data-parent="#accordion">
                    <div class="card-body">


                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                          <th>Grade in UREC</th>
                          <th>University Research Agenda</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                          <td>{{ $research->urec_grade }}</td>
                          <td>{{ $research->agenda_id != null ? $research->agenda->title : '' }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_10_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingEleven">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                        <h5 class="card-title">11. Faculty Researcher</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseEleven" class="collapse {{ $research->step_number == 11 ? 'show' : '' }}" aria-labelledby="headingEleven" data-parent="#accordion">
                    <div class="card-body">

                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                          <th>Grade in UREC</th>
                          <th>University Research Agenda</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                          <td>{{ $research->urec_grade }}</td>
                          <td>{{ $research->agenda_id != null ? $research->agenda->title : '' }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_11_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingTwelve">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                        <h5 class="card-title">12. University Research Office</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwelve" class="collapse {{ $research->step_number == 12 ? 'show' : '' }}" aria-labelledby="headingTwelve" data-parent="#accordion">
                    <div class="card-body">

                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                          <th>Grade in UREC</th>
                          <th>University Research Agenda</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                          <td>{{ $research->urec_grade }}</td>
                          <td>{{ $research->agenda_id != null ? $research->agenda->title : '' }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_12_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingThirteen">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">
                        <h5 class="card-title">13. Office of the University President</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThirteen" class="collapse {{ $research->step_number == 13 ? 'show' : '' }}" aria-labelledby="headingThirteen" data-parent="#accordion">
                    <div class="card-body">

                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                          <th>Grade in UREC</th>
                          <th>University Research Agenda</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                          <td>{{ $research->urec_grade }}</td>
                          <td>{{ $research->agenda_id != null ? $research->agenda->title : '' }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_13_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingFourteen">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="true" aria-controls="collapseFourteen">
                        <h5 class="card-title">14. University Research Office</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseFourteen" class="collapse {{ $research->step_number == 14 ? 'show' : '' }}" aria-labelledby="headingFourteen" data-parent="#accordion">
                    <div class="card-body">

                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                          <th>Grade in UREC</th>
                          <th>University Research Agenda</th>
                          <th>Funding</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                          <td>{{ $research->urec_grade }}</td>
                          <td>{{ $research->agenda_id != null ? $research->agenda->title : '' }}</td>
                          <td>{{ $research->funding_type }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_14_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary" id="headingFifteen">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="true" aria-controls="collapseFifteen">
                        <h5 class="card-title">15. Faculty Researcher</h5>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseFifteen" class="collapse {{ $research->step_number == 15 ? 'show' : '' }}" aria-labelledby="headingFifteen" data-parent="#accordion">
                    <div class="card-body">

                      <table class="table">
                        <thead class="text-warning">
                          <th>Time Posted</th>
                          <th>Time Released</th>
                          <th>Grade in Colloquium</th>
                          <th>Grade in UREC</th>
                          <th>University Research Agenda</th>
                          <th>Funding</th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_2_date_proceeded }}</td>
                          <td>{{ $research->created_at }}</td>
                          <td>{{ $research->colloquium_grade }}</td>
                          <td>{{ $research->urec_grade }}</td>
                          <td>{{ $research->agenda_id != null ? $research->agenda->title : '' }}</td>
                          <td>{{ $research->funding_type }}</td>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead class="text-warning">
                          <th>Comments</h>
                          <th></th>
                        </thead>
                        <tbody>
                          <td>{{ $research->step_15_comment }}</td>
                          <td></td>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>


        </div>
      </div>
      
      @include('includes.footer')

    </div>
</div>

@endsection