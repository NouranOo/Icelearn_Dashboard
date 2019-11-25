@extends('commonmodule::layouts.master')

@section('title')
  {{$student->name}}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
               folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('assets/admin/dist/css/skins/_all-skins.min.css') }}">

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
    {{trans('student::student.show')}}
    <small>{{trans('student::student.small')}}</small>
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
          <h3 class="box-title">{{trans('student::student.student')}} <strong>{{$student->name}}&nbsp;:</strong></h3>
          @role('admin|superadmin')
          <a title="Edit" href="{{url('/admin-panel/student/' . $student->id . '/edit')}}" type="button" class="btn btn-primary pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('student::student.edit')}}</a>
          @endrole

          <a href="{{url('/admin-panel/student')}}" style="margin-right: 5px;" type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; {{trans('student::student.back')}}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-5" >
            <ul>
              <li class="wordLi">{{trans('student::student.id')}}:&nbsp; <strong>{{$student->id}}</strong> <br></li>
              <li class="wordLi">{{trans('student::student.name')}}:&nbsp; <strong>{{$student->name}}</strong> <br></li>
              <li class="wordLi">{{trans('student::student.gender')}}:&nbsp; <strong>{{$student->gender}}</strong> <br></li>
              <li class="wordLi">{{"الرقم القومى"}}:&nbsp; <strong>{{$student->NID}}</strong> <br></li>
              <li class="wordLi">{{"تاريخ الميلاد"}}:&nbsp; <strong>{{$student->birthDate}}</strong> <br></li>
              <li class="wordLi">{{"السن فى الوقت الحالى"}}:&nbsp; <strong>{{$student->age}}</strong> <br></li>
              <li class="wordLi">{{"رقم المحمول(طالب)"}}:&nbsp; <strong>{{$student->phone}}</strong> <br></li>
              <li class="wordLi">{{"الوظيفة الحالية"}}:&nbsp; <strong>{{$student->currentJob}}</strong> <br></li>
              <li class="wordLi">{{"البريد الإلكترونى"}}:&nbsp; <strong>{{$student->mail}}</strong> <br></li>
              <li class="wordLi">{{"محل الإقامة"}}:&nbsp; <strong>{{$student->address}}</strong> <br></li>
              <li class="wordLi">{{"رقم الهاتف الإرضى"}}:&nbsp; <strong>{{$student->telephoneFix}}</strong> <br></li>
              <li class="wordLi">{{"الرمز الشريطي"}}:&nbsp; <strong>{{$student->barCode}}</strong> <br></li>
              <!-- <li class="wordLi">{{trans('student::student.groups')}}:
                @foreach($student->groups as $item)
                <strong>
                  <li>{{$item->title}}</li>

                @endforeach
                </strong>
              </li> -->
            </ul>
          </div>
          <!-- @if($student->guardian)
              <div class="col-md-5 pull-right">
                <h3><strong>{{trans('student::student.parent')}}</strong></h3>
                <ul>
                  <li class="wordLi">{{trans('student::parent.name')}}:&nbsp; <strong>{{$student->guardian->guardianName == null ? 'No Guardian':$student->guardian->guardianName}}</strong> <br></li>
                  <li class="wordLi">{{trans('student::parent.degree')}}:&nbsp; <strong>{{$student->guardian->degree == null ? 'No Guardian':$student->guardian->degree}}</strong> <br></li>
                  <li class="wordLi">{{trans('student::parent.address')}}:&nbsp; <strong>{{$student->guardian->guardianAddress == null ? 'No Guardian':$student->guardian->guardianAddress}}</strong> <br></li>
                  <li class="wordLi">{{trans('student::parent.phone')}}:&nbsp; <strong>{{$student->guardian->guardianPhone == null ? 'No Guardian':$student->guardianPhone->guardianName}}</strong> <br></li>
                </ul>
              </div>
          @endif -->
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
