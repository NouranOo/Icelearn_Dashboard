@extends('commonmodule::layouts.master')

@section('title')
  {{$instructor->name}}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
               folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">

<style>
  .wordLi{
    margin: 4%;
    font-size: large;
  }
</style>

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection

@section('content-header')
<section class="content-header">
  <h1>
    {{trans('instructors::instructor.show')}}
    <small>{{trans('instructors::instructor.small')}}</small>
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
          <h3 class="box-title">{{trans('instructors::instructor.instructor')}} <strong>{{$instructor->name}}&nbsp;:</strong></h3>

          @role('admin|superadmin')
            <a title="Edit" href="{{url('/instructors/instructors/' . $instructor->id . '/edit')}}" type="button" class="btn btn-primary pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('instructors::instructor.edit')}}</a>
          @endrole

          <a href="{{url('/instructors/instructors')}}" style="margin-right: 5px;" type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; {{trans('instructors::instructor.back')}}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-7">
            <h3><strong>{{trans('instructors::instructor.photo')}}:</strong></h3><br>
            @if ($instructor->photo)
            <img style="margin: 4%; padding-left: 10px;" src="{{asset('public/images/instructor/' . $instructor->photo)}}" width="400" height="250">
            @else
                <strong><pre>No photo</pre></strong>
            @endif
            <div class="box-body">
              <h3><strong>{{trans('instructors::instructor.desc')}}</strong></h3><br> {!! $instructor->description !!}

              <h3><strong>{{trans('instructors::instructor.edu')}}</strong></h3><br> {!! $instructor->education !!}
              <h3><strong>{{trans('instructors::instructor.exp')}}</strong></h3><br> {!! $instructor->experience !!}
              <h3><strong>{{trans('instructors::instructor.others')}}</strong></h3><br> {!! $instructor->others !!}

            </div>
          </div>
          <div class="col-md-5 pull-right" >
            <ul>
              <li class="wordLi">{{trans('instructors::instructor.id')}}:&nbsp; <strong>{{$instructor->id}}</strong> <br></li>
              <li class="wordLi">{{trans('instructors::instructor.name')}}:&nbsp; <strong>{{$instructor->name}}</strong> <br></li>

              <li class="wordLi">{{trans('instructors::instructor.email')}}:&nbsp; <strong>{{$instructor->email}}</strong> <br></li>
              <li class="wordLi">{{trans('instructors::instructor.phone')}}:&nbsp; <strong>{{$instructor->phone}}</strong> <br></li>
              <li class="wordLi">{{trans('instructors::instructor.cv')}}:&nbsp;
                @if ($instructor->cv)
                    <a title="تحميل" href="{{asset('public/files/cv/' . $instructor->cv)}}" type="button" target="_blank" class="btn btn-warning"><i class="fa fa-download" aria-hidden="true"></i> &nbsp; تحميل السيرة الذاتية</a>
                @else
                    <br>
                    <pre><strong>No CV Uploaded</strong></pre>
                @endif

              </li>

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
