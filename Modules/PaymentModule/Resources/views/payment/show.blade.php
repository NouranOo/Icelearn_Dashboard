@extends('commonmodule::layouts.master')

@section('title')
    {{$level->title}}
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::level.show')}}
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
                        <h3 class="box-title">{{trans('courses::level.show')}}&nbsp;: <strong>{{$level->title}}</strong>
                        </h3>

                        <a href="{{url('/admin-panel/levels')}}" style="margin-right: 5px;" type="button"
                           class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            &nbsp; {{trans('courses::level.back')}}</a>
                        &nbsp; &nbsp; &nbsp;
                        @role('superadmin|admin')
                        <a title="Edit" href="{{url('/admin-panel/levels/' . $level->id . '/edit')}}" type="button"
                           class="btn btn-primary pull-right"><i class="fa fa-pencil"
                                                                 aria-hidden="true"></i> {{trans('courses::level.edit')}}
                        </a>
                        @endrole
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-7">
                            <div class="box-body">
                                <h3><strong>{{trans('courses::level.desc')}}</strong></h3>
                                <br> {!! $level->description !!}
                            </div>
                        </div>
                        <div class="col-md-5 pull-right">
                            <ul>
                                <li class="wordLi">{{trans('courses::level.id')}}:&nbsp; <strong>{{$level->id}}</strong>
                                    <br></li>
                                <li class="wordLi">{{trans('courses::level.title')}}:&nbsp;
                                    <strong>{{$level->title}}</strong> <br></li>

                                    <li class="wordLi">الكورس:&nbsp;
                                    <strong>{{$level->course->title}}</strong> <br></li>
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
