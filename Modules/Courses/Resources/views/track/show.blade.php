@extends('commonmodule::layouts.master')

@section('title')
  {{$track->title}}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content-header')
<section class="content-header">
  <h1>
  {{trans('courses::track.show')}}
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
          <h3 class="box-title">{{trans('courses::track.track')}} <strong>{{$track->title}}&nbsp;:</strong></h3>

          @role('superadmin|admin')
          <a title="Edit" href="{{url('/admin-panel/tracks/' . $track->id . '/edit')}}" type="button" class="btn btn-primary pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('courses::track.edit')}}</a>
          @endrole

          <a href="{{url('/admin-panel/tracks')}}" style="margin-right: 5px;" type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; {{trans('courses::track.back')}}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-7">
            <div class="box-body">
              <h3><strong>{{trans('courses::track.desc')}}</strong></h3><br> {!! $track->description !!}
            </div>
          </div>
          <div class="col-md-5 pull-left" >
            <ul>
              <li class="wordLi">{{trans('courses::track.id')}}:&nbsp; <strong>{{$track->id}}</strong> <br></li>
              <li class="wordLi">{{trans('courses::track.title')}}:&nbsp; <strong>{{$track->title}}</strong> <br></li>
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
