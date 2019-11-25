@extends('commonmodule::layouts.master')

@section('title')
  {{$parent->name}}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
    {{trans('student::parent.show')}}
    <small>{{trans('student::parent.small')}}</small>
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
          <h3 class="box-title">{{trans('student::parent.parent')}} <strong>{{$parent->name}}&nbsp;:</strong></h3>
          <a href="{{url('/admin-panel/parent')}}" style="margin-right: 5px;" type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; {{trans('student::parent.back')}}</a>

            @role('admin|superadmin')
            <a title="Edit" href="{{url('/admin-panel/parent/' . $parent->id . '/edit')}}" type="button" class="btn btn-primary pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('student::parent.edit')}}</a>
            @endrole
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-5" >
            <ul>
              <li class="wordLi">{{trans('student::parent.id')}}:&nbsp; <strong>{{$parent->id}}</strong> <br></li>
              <li class="wordLi">{{trans('student::parent.name')}}:&nbsp; <strong>{{$parent->name}}</strong> <br></li>
              <li class="wordLi">{{trans('student::parent.degree')}}:&nbsp; <strong>{{$parent->degree}}</strong> <br></li>
              <li class="wordLi">{{trans('student::parent.address')}}:&nbsp; <strong>{{$parent->address}}</strong> <br></li>
              <li class="wordLi">{{trans('student::parent.phone')}}:&nbsp; <strong>{{$parent->phone}}</strong> <br></li>
              <li class="wordLi">{{trans('student::parent.phone2')}}:&nbsp; <strong>{{$parent->phone2}}</strong> <br></li>
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
