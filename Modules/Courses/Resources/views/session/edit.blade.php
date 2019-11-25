{{--@dd($attendances->count())--}}

@extends('commonmodule::layouts.master')

@section('title')
    {{$session->id}}
@endsection

@section('css')



    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


    <style>
        .wordLi {
            margin: 5%;
            font-size: large;
            display: inline;
        }
    </style>

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::session.show')}}
        </h1>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('courses::session.group')}}: <strong>{{$session->id}}</strong></h3>
                        <h3 class="box-title">{{trans('courses::session.sessionDate')}}:&nbsp;<strong>{{$session->sessionDate}}</strong></h3>

                        <a href="{{url('admin-panel/sessions')}}" style="margin-right: 5px;" type="button"
                           class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            &nbsp; {{trans('courses::session.back')}}</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

        <!-- /.row -->

        <form class="form-horizontal" action="{{url('admin-panel/sessions/'.$session->id)}}" method="POST">
            {{ csrf_field() }}

            <input type="hidden" id="group_id" name="group_id" value="{{$group->id}}">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                            <button type="submit" class="btn btn-primary pull-right">Submit <i class="fa fa-save"></i></button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{trans('courses::session.id')}}</th>
                                    <th>{{trans('courses::session.student')}}</th>
                                    <th>{{trans('courses::session.attendance')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($group->students as $index =>$item)

                                    <tr>
                                        <td> {{$item->id}} </td>
                                        <td> {{$item->name}}</td>

                                        <td>
                                            <div class="checkbox">

                                            <input id="checkbox" type="hidden" name="attendance[{{$item->id}}]" value="0"  >
                                            <input id="checkbox" type="checkbox" name="attendance[{{$item->id}}]" value="1"
                                                  {{ $attendances->count() ==0 ? 'checked' : ''  }}
                                                   @if($attendances->count() ==$group->students->count())
                                                   {{$attendances[$index]-> attendance == 1 ? 'checked' : ''}}
                                                  @endif
                                                  multiple>
                                            {{--data-toggle="toggle"--}}

                                            @if($attendances->count() ==$group->students->count())
                                            <label style=" text-align: center; width: 70px;
                                            background-color:{{$attendances[$index]-> attendance == 1 ? 'lightgreen' : 'red'}}">
                                                <b>{{$attendances[$index]-> attendance == 1 ? 'Present' : 'Absent'}}</b></label>
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                        </div>

                    </div>

                    <!-- /.box-body -->
                </div>
            </div>

            <!-- /.box -->
        </form>

        <!-- /.col -->

    </section>


@endsection




@section('js')



    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <script src="https:// cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    <script>
        $(document).ready( function () {

            // alert($('#checkbox').is(":checked"));
            $('#myTable').DataTable();
        } );
    </script>

    <script>


        // $('#checkbox').is(':checked')?1:0;
        // //     $('#checkbox').attr('value','1');
        // // }else
        // //     {$('#checkbox').attr('value','0');}

    </script>




@endsection


