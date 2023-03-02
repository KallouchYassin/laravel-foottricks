@extends('backend.layouts.app')
@section('content')
<style>



    .row{
        margin: 250px 50px;
    }
    .dark-mode{
        background-color: white !important;;
    }

</style>

<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Players of team</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Player</th>

                            <th>Present</th>
                            <th>Absent</th>
                            <th>Convocated</th>
                            <th>Pending</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $role=>$item)
                        <tr >
                            <td>{{ $item['firstname'] }} {{ $item['lastname'] }}</td>
                            <td> 1</td>
                            <td> 0 </td>
                            <td>0</td>
                            <td>1</td>
                        </tr>

                        </a>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
