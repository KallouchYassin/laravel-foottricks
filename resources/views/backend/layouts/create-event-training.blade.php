@extends('backend.layouts.app')
@section('content')
<style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    #btn_create{
        margin-top: 15px;
        border: 0px;
    }
    .hidden{
        display: none;
    }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif
    }

    body {
        background: linear-gradient(45deg, #1de099, #1dc8cd);
    }

    .container {
        background-color: rgba(24, 23, 23, 0)
    }

    .card {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        background: linear-gradient(45deg, #1de099, #1dc8cd);
        color: white;
        border-radius: 10px
    }

    .card .h-1 {
        font-size: 24px;
        font-weight: 600
    }

    .card .bar {
        border-top: 1px solid white
    }

    .card .bar2 {
        border-top: 1px dashed white
    }

    .card .form-control {
        background-color: #252525;
        border: none;
        box-shadow: none;
        color: white;
        height: 40px;
        padding: 3px;
        padding-left: 10px
    }

    .box {
        position: relative
    }

    .btn {
        position: absolute;
        top: 50%;
        right: 4px;
        transform: translateY(-50%);
        height: 32px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        background-color: #2e2e2e;
        color: #fff
    }

    .fas.fa-plus {
        font-size: 12px
    }

    .add.btn {
        position: absolute;
        top: 50%;
        right: 0px;
        height: 100%;
        transform: translateY(-50%);
        border-radius: 5px
    }

    span.fas.fa-stopwatch,
    span.fas.fa-calendar-alt,
    .arrow {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        color: #8f8d8d
    }

    .fas.fa-check-circle {
        color: green
    }

    .dis {
        font-size: 12px
    }

    .pic {
        position: relative;
        margin-right: 8px
    }

    img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover
    }

    .pic .fas.fa-times {
        position: absolute;
        top: 0px;
        right: 3px;
        font-size: 10px;
        height: 18px;
        width: 18px;
        border: 2px solid black;
        background-color: #8f8d8d;
        color: black;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%
    }

    .rounded-circle {
        height: 30px;
        width: 30px;
        background-color: #252525;
        color: #8f8d8d;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .rounded-circle .fas {
        font-size: 10px
    }

    .rounded-circle .number {
        font-size: 14px;
        font-weight: 800
    }

    .Radio.form-control {
        padding: 3px;
        width: 140px
    }

    label.radio {
        cursor: pointer
    }

    label.radio input {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        visibility: hidden;
        pointer-events: none
    }

    label.radio span {
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 34px;
        color: #fff;
        font-size: 14px;
        border-radius: 3px;
        text-transform: uppercase
    }

    label.radio input:checked + span {
        background-color: #f80000
    }

    ::placeholder {
        font-size: 14px
    }</style>
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
                        <li class="breadcrumb-item active">Create Event Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <form method="POST" action="{{ route('create-event-training') }}">
        @csrf

        <div class="card"><p class="h-1">Create Training</p>
            <div class="bar mb-3"></div>
            <div class="row">
                <div class="col-12"><p class="mb-2">Training name</p>
                    <div class=" box mb-3"><input type="text" id="training_name" name="training_name" class="form-control" placeholder="Opponent*">
                        @error('training_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12"><p class="mb-2">Training description</p>
                    <div class=" box mb-3"><input id="training_description" name="training_description" type="text" class="form-control" placeholder="Championship day*">
                        @error('training_description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <input type="checkbox" id="horns" name="horns">
                    <label for="horns">Reccurent</label>
                </div>
                <div id="hide" class="col-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div><p class="mb-2">Begin date</p>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="datetime-local" id="begin_date"
                                           class="form-control datetimepicker-input"
                                           placeholder="Jul 14, 2021" name="begin_date">


                                </div>
                                @error('begin_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mt-md-0 mt-3">
                            <div><p class="mb-2">End date</p>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="datetime-local" id="end_date" class="form-control datetimepicker-input"
                                           placeholder="Jul 14, 2021" name="end_date">


                                </div>
                                @error('end_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mt-md-0 mt-3">
                            <div><p class="mb-2">Appoint. Time</p>
                                <div class="box"><input id="app_time" name="app_time" class="form-control" type="time" placeholder="1h 45m">

                                    <!-- <div class="d-flex flex-column arrow"> <span class="fas fa-caret-up"></span> <span class="fas fa-caret-down"></span> </div> -->
                                </div>
                                @error('app_time')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <p class="dis mt-3"><span class="fas fa-check-circle pe-1"></span>This event will take place on the
                        july
                        14, 2021 form 02:00 PM untill 03:45 PM</p></div>
                <div id="hide2" class="col-12 hidden">
                    <div class="row">
                        <div class="col-md-4">
                            <div><p class="mb-2">Day of reccurency</p>
                                <fieldset id="day_recc" class="checkboxgroup">
                                    <label><input name="days[]" type="checkbox" value="1"> Monday</label>
                                    <label><input name="days[]" type="checkbox" value="2"> Tuesday </label>
                                    <label><input name="days[]" type="checkbox" value="3"> Wednesday </label>
                                    <label><input name="days[]"type="checkbox" value="4"> Thursday </label>
                                    <label><input name="days[]" type="checkbox" value="5"> Friday </label>
                                    <label><input name="days[]" type="checkbox" value="6"> Saturday</label>
                                    <label><input name="days[]" type="checkbox" value="7"> Sunday</label>

                                </fieldset>
                                @error('day_recc')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mt-md-0 mt-3">
                            <div><p class="mb-2">Begin Time</p>
                                <div class="box"><input id="recc_begin_time" name="recc_begin_time" class="form-control" type="time" placeholder="1h 45m">

                                    <!-- <div class="d-flex flex-column arrow"> <span class="fas fa-caret-up"></span> <span class="fas fa-caret-down"></span> </div> -->
                                </div>
                                @error('recc_begin_time')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mt-md-0 mt-3">
                            <div><p class="mb-2">End Time</p>
                                <div class="box"><input id="recc_end_time" name="recc_end_time" class="form-control" type="time" placeholder="1h 45m">

                                    <!-- <div class="d-flex flex-column arrow"> <span class="fas fa-caret-up"></span> <span class="fas fa-caret-down"></span> </div> -->
                                </div>
                                @error('recc_end_time')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12"><p class="mb-2">Location</p>
                    <div class=" box mb-3"><input id="location" name="location" class="form-control" type="text" placeholder="Location"></div>
                    @error('location')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

            </div>
            <button id="btn_create" type="submit" > {{ __('create') }}</button>

        </div>

</div>
</form>

</div>
<script>
    const checkbox = document.getElementById("horns");
    const div = document.getElementById("hide");
    const div2 = document.getElementById("hide2");

    checkbox.addEventListener("change", function() {
        if (checkbox.checked) {
            div.classList.add("hidden");
            div2.classList.remove("hidden");

        } else {
            div.classList.remove("hidden");
            div2.classList.add("hidden");

        }
    });
</script>
@endsection

