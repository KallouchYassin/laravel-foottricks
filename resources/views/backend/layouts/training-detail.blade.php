@extends('backend.layouts.app')
@section('content')

<style>

    .card{
        margin: 170px 50px;

        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }
    .txt{

    }
    .dark-mode{
        background-color: white!important;
    }
</style>
<div class="content-wrapper">

    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">{{$training['training_name']}}</h3>
            <h5 class="widget-user-desc">{{$training['training_description']}}</h5>
        </div>
        <div class="widget-user-image">
            @if(array_key_exists('recurr_time_begin_hour', $training))

            @php
            $array = [];
            if (array_key_exists('1', $training['listOfDays']))
            {
            array_push($array, 'Monday');
            }

            if (array_key_exists('2', $training['listOfDays']))
            {array_push($array, 'Tuesday');}
            if (array_key_exists('3', $training['listOfDays'])){array_push($array, 'Wednesday');}
            if (array_key_exists('4', $training['listOfDays'])){array_push($array, 'Thursday');}
            if (array_key_exists('5', $training['listOfDays'])){array_push($array, 'Friday');}
            if (array_key_exists('6', $training['listOfDays'])){array_push($array, 'Saturday');}
            if (array_key_exists('7', $training['listOfDays'])){array_push($array, 'Sunday');}



            @endphp
            <p class="txt">Training each {{implode(",", $array)}} from {{$training['recurr_time_begin_hour']}}:{{$training['recurr_time_begin_minute']}} to {{$training['recurr_time_end_hour']}}:{{$training['recurr_time_end_minute']}} at {{$training['match_place']}}  </p>
            @else
            <p class="txt">Training of {{$training['begin_date']['day']}}/{{$training['begin_date']['month']}}/{{$training['begin_date']['year']}} at {{$training['match_place']}}  </p>

            @endif

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{{sizeOf($training['pending'])}}</h5>
                        <span class="description-text">Pending</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        @php
                        $sizep=0;
                        if(array_key_exists('present',$training))
                        {
                        $sizep=sizeOf($training['present']);
                        }
                        @endphp
                        <h5 class="description-header">{{ $sizep }}</h5>
                        <span class="description-text">Present</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        @php
                        $sizea=0;
                        if(array_key_exists('absent',$training))
                        {
                        $sizea=sizeOf($training['absent']);
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
    <!-- /.widget-user -->
</div>


@endsection
