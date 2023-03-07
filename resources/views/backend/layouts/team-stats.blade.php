@extends('backend.layouts.app')
@section('content')
<style>


    .dark-mode{
        background-color: white !important;;
    }
    .content{
        margin: 150px 50px;
    }
</style>

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Team Report</h5>

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
                                    <span class="badge badge-danger">{{sizeof($users)}}</span>
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
                                    @foreach ($users as $role=>$item)
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
                                @foreach ($users as $role=>$item)
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
</div>
@endsection
