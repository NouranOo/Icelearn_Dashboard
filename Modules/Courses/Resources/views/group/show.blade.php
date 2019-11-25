@extends('commonmodule::layouts.master')

@section('title')
    {{$group->title}}
@endsection

@section('css')
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


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
            {{trans('courses::group.show')}}
            <small>{{trans('courses::group.small')}}</small>
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
                        <h3 class="box-title">{{trans('courses::group.group')}} <strong>{{$group->title}}
                                &nbsp;:</strong></h3>
                        @role('admin|superadmin')
                        <a title="Edit" href="{{url('admin-panel/groups/' . $group->id . '/edit')}}" type="button"
                           class="btn btn-primary pull-right"><i class="fa fa-pencil"
                                                                 aria-hidden="true"></i> {{trans('courses::group.edit')}}
                        </a>
                        @endrole

                        <a href="{{url('admin-panel/groups')}}" style="margin-right: 5px;" type="button"
                           class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            &nbsp; {{trans('courses::group.back')}}</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-md-12 pull-left">
                            <ul >
                                <li class="wordLi">{{trans('courses::group.id')}}:&nbsp;
                                    <strong>{{$group->id}}</strong> </li>
                                <li class="wordLi">{{trans('courses::group.title')}}:&nbsp;
                                    <strong>{{$group->title}}</strong> </li>
                                <li class="wordLi">{{trans('courses::group.start_date')}}:&nbsp;
                                    <strong>{{$group->groupStartDate}}</strong> </li>
                                <li class="wordLi">{{trans('courses::group.classnumbers')}}:&nbsp;
                                    <strong>{{$group->allSessions}}</strong></li>

                            </ul>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{trans('courses::group.Groups')}}</h3>
                        <a href="{{url('admin-panel/groups/create')}}" type="button"
                           class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
                            &nbsp; {{trans('courses::group.createnew')}}</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('courses::group.id')}}</th>
                                <th>{{trans('courses::group.student')}}</th>

                            </tr>
                            </thead>
                            <tbody>


                                @foreach($group->students as $item)
                                <tr>
                                    <td> {{$item->id}} </td>
                                    <td> {{$item->name}}</td>




                                </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
@endsection

@section('js')
    <script src="https:// cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
