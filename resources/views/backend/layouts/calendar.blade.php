@extends('backend.layouts.app')
@section('content')
<style>
    .titles {
        color: #1de099;
        font-style: italic;
        font-weight: bold;
    }

    #fixed-button {
        position: fixed;
        bottom: 20px;
        font-weight: bolder;
        right: 20px;
        width: 50px;
        text-align: center;
        font-size: 30px;
        padding: 10px;
        border: 0px;
        background: linear-gradient(45deg, #1de099, #1dc8cd);
        color: white;
        border-radius: 30px;
        box-shadow: 2px 2px 4px rgba(0, 253, 116, 0.3);
    }

    body {
        background: #F4F7FD;
        margin-top: 20px;
    }

    .card-margin {
        margin-bottom: 1.875rem;
    }

    .card-light {
        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #ffffff;
        background-clip: border-box;
        border: 1px solid #e6e4e9;
        border-radius: 8px;
    }

    .card .card-header.no-border {
        border: 0;
    }

    .card .card-header {
        background: none;
        padding: 0 0.9375rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        min-height: 50px;
    }

    .card-header:first-child {
        border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
    }

    .widget-49 .widget-49-title-wrapper {
        display: flex;
        align-items: center;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #edf1fc;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-day {
        color: #4e73e5;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-month {
        color: #4e73e5;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fcfcfd;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {
        color: #dde1e9;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {
        color: #dde1e9;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #e8faf8;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {
        color: #17d1bd;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {
        color: #17d1bd;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebf7ff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {
        color: #36afff;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {
        color: #36afff;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: floralwhite;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {
        color: #FFC868;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {
        color: #FFC868;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #feeeef;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {
        color: #F95062;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {
        color: #F95062;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fefeff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {
        color: #f7f9fa;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {
        color: #f7f9fa;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebedee;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {
        color: #394856;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {
        color: #394856;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #f0fafb;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
        color: #68CBD7;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
        color: #68CBD7;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
        display: flex;
        flex-direction: column;
        margin-left: 1rem;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
        color: #3c4142;
        font-size: 14px;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
        color: #B1BAC5;
        font-size: 13px;
    }

    .widget-49 .widget-49-meeting-points {
        font-weight: 400;
        font-size: 13px;
        margin-top: .5rem;
    }

    .widget-49 .widget-49-meeting-points .widget-49-meeting-item {
        display: list-item;
        color: #727686;
    }

    .widget-49 .widget-49-meeting-points .widget-49-meeting-item span {
        margin-left: .5rem;
    }

    .widget-49 .widget-49-meeting-action {
        text-align: right;
    }

    .widget-49 .widget-49-meeting-action a {
        text-transform: uppercase;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Calendar Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <h1 class="titles">Trainings</h1>


                    @foreach ($trainingsList as $role=>$item)

                    <div class="card-light card-margin">

                        <div class="card-body pt-0">
                            <div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    <div class="widget-49-date-primary">
                                        @php
                                        if(array_key_exists('date', $item["begin_date"])){
                                        $tiemp=$item['begin_date']['date'];

                                        }
                                        else{
                                        $tiemp= $item['begin_date']['day'];
                                        }

                                        @endphp


                                        <span class="widget-49-date-day">{{$tiemp}}</span>
                                        @php

                                        if (array_key_exists('time', $item["begin_date"])) {
                                        $month = date('M', mktime(0, 0, 0, $item["begin_date"]["month"], 1));
                                        $end_date = date('H:i', $item["begin_date"]["time"]);
                                        $begin_date = date('H:i', $item["begin_date"]["time"]);
                                        }else if(array_key_exists('recurr_time_begin_hour', $item))
                                        {
                                        $month = date('M', mktime(0, 0, 0, $item["begin_date"]["month"], 1));
                                        $end_date = $item["recurr_time_begin_hour"].":".
                                        $item["recurr_time_begin_minute"];
                                        $begin_date =$item["recurr_time_end_hour"].":".
                                        $item["recurr_time_end_minute"];;
                                        }
                                        else {
                                        $month = date('M', mktime(0, 0, 0, $item["begin_date"]["month"], 1));
                                        $end_date = $item["end_date"]["hour"].":". $item["end_date"]["minute"];
                                        $begin_date = $item["begin_date"]["hour"].":". $item["begin_date"]["minute"];
                                        }

                                        @endphp
                                        <span class="widget-49-date-month">{{$month}}</span>
                                    </div>
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title">Training of {{$item['begin_date']['day']}} {{$month}} {{$item['begin_date']['year']}}  </span>
                                        <span
                                            class="widget-49-meeting-time">{{ $begin_date }} to {{ $end_date }} Hrs</span>
                                    </div>
                                </div>
                                <ul class="widget-49-meeting-points">
                                    @if(array_key_exists('recurr_time_begin_hour', $item))
                                    <li class="widget-49-meeting-item"><span>Appointment time can change and will be disscused </span>
                                    </li>

                                    @else
                                    <li class="widget-49-meeting-item">
                                        <span>Appointment Time at {{$item['appointment_time_hour']}}:{{$item['appointment_time_minute']}} </span>
                                    </li>

                                    @endif
                                    <li class="widget-49-meeting-item">
                                        <span>Match place: {{$item['match_place']}} </span></li>
                                    <li class="widget-49-meeting-item">
                                        <span>Description: {{$item['training_description']}} </span></li>

                                </ul>
                                <div class="widget-49-meeting-action">
                                    <a href="{{route('showDetailTraining',['id'=>$item['uuid']])}}"
                                       class="btn btn-sm btn-flash-border-primary">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>
                <!-- /.col-md-6 -->

                <div class="col-lg-6">
                    <h1 class="titles">Matches</h1>
                    @foreach ($matchesList as $role=>$item)
                    <div class="card-light card-margin">

                        <div class="card-body pt-0">
                            <div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    <div class="widget-49-date-primary">
                                        @php
                                        if(array_key_exists('date', $item["begin_date"])){
                                        $tiemp=$item['begin_date']['date'];

                                        }
                                        else{
                                        $tiemp= $item['begin_date']['day'];
                                        }

                                        @endphp
                                        <span class="widget-49-date-day">{{$tiemp}}</span>
                                        @php
                                        if(array_key_exists('date', $item["begin_date"])){
                                        $month = date('M', mktime(0, 0, 0, $item["begin_date"]["month"], 1));
                                        $end_date = date('H:i', $item["begin_date"]["time"]);
                                        $begin_date = date('H:i', $item["begin_date"]["time"]);
                                        }else{
                                        $month = date('M', mktime(0, 0, 0, $item["begin_date"]["month"], 1));
                                        $end_date = date('H:i', $item["begin_date"]["timestamp"]);
                                        $begin_date = date('H:i', $item["begin_date"]["timestamp"]);
                                        }

                                        @endphp
                                        <span class="widget-49-date-month">{{$month}}</span>
                                    </div>
                                    <div class="widget-49-meeting-info">
                                        <span
                                            class="widget-49-pro-title">{{ $item['team_name']}} vs {{$item['opponent'] }}</span>
                                        <span
                                            class="widget-49-meeting-time">{{ $begin_date }} to {{ $end_date }} Hrs</span>
                                    </div>
                                </div>
                                <ol class="widget-49-meeting-points">
                                    <li class="widget-49-meeting-item">
                                        <span>Appointment Time at {{$item['appointment_time_hour']}}:{{$item['appointment_time_minute']}}</span>
                                    </li>
                                    <li class="widget-49-meeting-item">
                                        <span>Match place: {{$item['match_place']}}</span></li>
                                    <li class="widget-49-meeting-item"><span><&lt;j[{{$item['championship_day']}}]>> : {{$item['match_side']}} </span>
                                    </li>
                                </ol>
                                <div class="widget-49-meeting-action">
                                    <a href="{{route('showDetailMatch',['id'=>$item['uuid']])}}"
                                       class="btn btn-sm btn-flash-border-primary">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <button type="button" id="fixed-button" data-toggle="popover" data-placement="left" data-html="true" data-content='
   <a href="{{ route("create-event-training") }}">Training</a><br>
   <a href="{{ route("create-event-matches") }}">Matches</a>
'>+
    </button>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>
