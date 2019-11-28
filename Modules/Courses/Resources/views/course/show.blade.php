@extends('commonmodule::layouts.master')

@section('title')
    {{$course->title}}
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">


    <style>
        .wordLi {
            margin: 4%;
            font-size: large;
        }
    </style>

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::course.show')}}
            <small>{{trans('courses::course.small')}}</small>
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
                        <h3 class="box-title">{{trans('courses::course.course')}}&nbsp;: <strong>{{$course->title}}
                                </strong></h3>
                        @role('admin|superadmin')
                        <a title="Edit" href="{{url('admin-panel/courses/' . $course->id . '/edit')}}" type="button"
                           class="btn btn-primary pull-right"><i class="fa fa-pencil"
                                                                 aria-hidden="true"></i> {{trans('courses::course.edit')}}
                        </a>
                        @endrole

                        <a href="{{url('admin-panel/courses')}}" style="margin-right: 5px;" type="button"
                           class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            &nbsp; {{trans('courses::course.back')}}</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- <div class="col-md-7">
                            <div class="box-body">
                                <ul>
                                    <li class="wordLi">{{trans('courses::course.mt')}}:&nbsp;
                                        <strong>{{$course->meta_title}}</strong> <br></li>
                                    <li class="wordLi">{{trans('courses::course.md')}}:&nbsp;
                                        <strong>{{$course->meta_desc}}</strong> <br></li>
                                    <li class="wordLi">{{trans('courses::course.tag')}}:&nbsp;
                                        <strong>{{$course->meta_keywords}}</strong> <br></li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="col-md-12 pull-right">
                            <ul>
                                <li class="wordLi">{{trans('courses::course.id')}}:&nbsp;
                                    <strong>{{$course->id}}</strong> <br></li>
                                <li class="wordLi">{{trans('courses::course.title')}}:&nbsp;
                                    <strong>{{$course->title}}</strong> <br></li>
                                <!-- <li class="wordLi">{{trans('courses::course.start_date')}}:&nbsp;
                                    <strong>{{$course->start_date}}</strong> <br></li> -->
                                <li class="wordLi">عدد المستويات:&nbsp;
                                    <strong>{{$course->levels_number}}</strong> <br></li>
                                <li class="wordLi">{{trans('courses::course.bookfees')}}:&nbsp;
                                    <strong>{{$course->book_fees}}</strong> <br></li>
                                <li class="wordLi">{{trans('courses::course.monthfees')}}:&nbsp;
                                    <strong>{{$course->book_fees}}</strong> <br></li>
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
    </section>
@endsection
