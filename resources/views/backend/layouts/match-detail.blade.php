@extends('backend.layouts.app')
@section('content')


<style>

    .card-footer{

        margin-top: 10px;
    }
    .card-temps {
        margin: 100px 50px;

        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }

    .txt {

    }

    .dark-mode {
        background-color: white !important;
    }

    #fixed-button {
        position: fixed;
        bottom: 20px;
        font-weight: bolder;
        right: 100px;
        width: 50px;
        color: white;
    }

    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    /* The actual popup (appears on top) */
    .popup .popuptext {
        visibility: hidden;
        width: 160px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class when clicking on the popup container (hide and show the popup) */
    .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>
<div class="content-wrapper">

    <!-- Widget: user widget style 1 -->
    <div class="card card-temps card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-info">
            <h2 class="widget-user-username">{{$match['teamId']}} VS {{$match['opponent']}}</h2>

            <h4 class="widget-user-desc">Match of
                {{$match['begin_date']['day']}}/{{$match['begin_date']['month']}}/{{$match['begin_date']['year']}}</h4>
            <h5 class="widget-user-desc">Address: {{$match['match_place']}}</h5>
            <h7 class="widget-user-desc">For the {{$match['championship_day']}} day of the championship</h7>

        </div>
        <div class="widget-user-image">

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        @php
                        $sizep=0;
                        if(array_key_exists('summon',$match))
                        {
                        $sizep=sizeOf($match['summon']);
                        }
                        @endphp
                        <h5 class="description-header">{{sizeOf($match['summon'])}}</h5>
                        <span class="description-text">Summon</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        @php
                        $sizep=0;
                        if(array_key_exists('present',$match))
                        {
                        $sizep=sizeOf($match['present']);
                        }
                        @endphp
                        <h5 class="description-header">{{ $sizep }}</h5>
                        <span class="description-text">Present</span>
                    </div>
                    <!-- /.description-block -->
                </div>

                <div class="col-sm-4">
                    <div class="description-block">
                        @php
                        $sizea=0;
                        if(array_key_exists('absent',$match))
                        {
                        $sizea=sizeOf($match['absent']);
                        }
                        @endphp
                        <h5 class="description-header">{{$sizea}}</h5>
                        <span class="description-text">Absent</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>


    @if($match['end_date'] > Carbon\Carbon::now())
    <section class="ftco-section">
        <div id="fixed-button" class="container">
            <div class="row justify-content-center js-fullheight">
                <div class="col-md-6 text-center d-flex align-items-center">
                    <div class="wrap w-100">
                        <button type="button" class="btn btn-primary py-3 px-4" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            Convocate
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close d-flex align-items-center justify-content-center"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ion-ios-close"></span>
                    </button>
                </div>
                <div class="modal-body p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="ion-ios-person"></span>
                    </div>
                    <h3 class="text-center mb-4">Summon players</h3>
                    <form method="POST" action="{{ route('showDetailMatch',['id'=>$match['uuid']])}}">
                        @csrf
                        @foreach ($match['users'] as $role=>$item)

                        <fieldset id="summon_player" class="checkboxgroup">
                            <label><input name="players[]" type="checkbox" value="{{$item['uuid']}}">
                                {{$item['firstname']}}</label>


                        </fieldset>
                        @endforeach


                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Add</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    @else
    <section class="ftco-section">
        <div id="fixed-button" class="container">
            <div class="row justify-content-center js-fullheight">
                <div class="col-md-6 text-center d-flex align-items-center">
                    <div class="wrap w-100">
                        <button type="button" class="btn btn-primary py-3 px-4" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            Add stats
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close d-flex align-items-center justify-content-center"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ion-ios-close"></span>
                    </button>
                </div>
                <div class="modal-body p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="ion-ios-person"></span>
                    </div>
                    <h3 class="text-center mb-4">Statistics of the match</h3>
                    <form method="POST" action="{{ route('showDetailMatch',['id'=>$match['uuid']])}}">
                        @csrf
                        <div class="form-group">
                            <input id="scored" name="scored" type="number" class="form-control rounded-left" required
                                   placeholder="goals scored ">

                        </div>
                        <div class="form-group d-flex">
                            <input id="concede" name="concede" type="number" class="form-control rounded-left" required
                                   placeholder="goals concede">
                        </div>
                        <div class="form-group d-flex">
                            <input id="shots" name="shots" type="number" class="form-control rounded-left" required
                                   placeholder="Shots">
                        </div>
                        <div class="form-group d-flex">
                            <input id="shots_on" name="shots_on" type="number" class="form-control rounded-left"
                                   required placeholder="Shots on target">
                        </div>
                        <div class="form-group d-flex">
                            <input id="possession" name="possession" type="number" class="form-control rounded-left"
                                   required placeholder="Possesion">
                        </div>
                        <div class="form-group d-flex">
                            <input id="passes" name="passes" type="number" class="form-control rounded-left" required
                                   placeholder="Passes">
                        </div>
                        <div class="form-group d-flex">
                            <input id="fouls" name="fouls" type="number" class="form-control rounded-left" required
                                   placeholder="Fouls">
                        </div>
                        <div class="form-group d-flex">
                            <input id="yellow" name="yellow" type="number" class="form-control rounded-left" required
                                   placeholder="Yellow cards">
                        </div>
                        <div class="form-group d-flex">
                            <input id="red" name="red" type="number" class="form-control rounded-left" required
                                   placeholder="Red cards">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Add</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Match Report</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                </div>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Possession</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Other stats</strong>
                                    </p>

                                    <div class="progress-group">
                                        Red cards
                                        <span class="float-right"><b>9</b>/10</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->

                                    <div class="progress-group">
                                        Yellow cards
                                        <span class="float-right"><b>8</b>/10</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Fouls</span>
                                        <span class="float-right"><b>4</b>/10</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 60%"></div>
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        Shots
                                        <span class="float-right"><b>2</b>/10</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->

                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- MAP & BOX PANE -->

                <div class="row">
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Browser Usage</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <canvas id="pieChart" height="150"></canvas>
                                        </div>
                                        <!-- ./chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <ul class="chart-legend clearfix">
                                            <li><i class="far fa-circle text-danger"></i> Shots ontarget</li>
                                            <li><i class="far fa-circle text-success"></i> Minutes</li>
                                            <li><i class="far fa-circle text-warning"></i> Accuracy</li>
                                            <li><i class="far fa-circle text-info"></i> offsides</li>
                                            <li><i class="far fa-circle text-primary"></i> corners</li>
                                            <li><i class="far fa-circle text-secondary"></i> tts</li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <!-- USERS LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Covocated</h3>

                                <div class="card-tools">
                                    <span class="badge badge-danger">{{sizeof($match['users'])}}</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                    @foreach ($match['users'] as $role=>$item)
                                    <li>
                                        <img src="{{$item['imageUri']}}" alt="User Image">
                                        <a class="users-list-name" href="#">{{$item['firstname']}}
                                            {{$item['lastname']}}</a>
                                        <span class="users-list-date">Convocated</span>
                                    </li>
                                    @endforeach

                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->

                            <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Player stats</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>red</th>
                                    <th>yellow</th>
                                    <th>fouls</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($match['users'] as $role=>$item)
                                <tr>
                                    <td><a href="#">{{ $item['firstname'] }} {{ $item['lastname'] }}</a></td>
                                    <td>4</td>
                                    <td>0</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                            5
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- /.info-box -->


        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</div><!--/. container-fluid -->
</section>


@endif


<!-- Main content -->
<!-- /.content -->
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>


</div>


@endsection


