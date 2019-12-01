@extends('commonmodule::layouts.master')

@section('title')
    {{trans('student::student.students')}}
@endsection

@section('css')
    
    <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
               folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/skins/_all-skins.min.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('student::student.datatables')}}
            <small>{{trans('student::student.advanced')}}</small>
        </h1>
    </section>
@endsection


@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('student::student.hover')}}</h3>
                    <a href="{{url('admin-panel/student/create')}}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{trans('student::student.createnew')}}</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{trans('student::student.id')}}</th>
                                <th>{{trans('student::student.name')}}</th>
                                <th>{{trans('student::student.gender')}}</th>
                                <!-- <th>{{trans('student::student.nationality')}}</th> -->
                                <!-- <th>{{trans('student::student.type')}}</th> -->
                                <th>{{trans('student::student.phone')}}</th>
                                <th>{{trans('student::student.birth_date')}}</th>
                                <th>{{trans('student::student.age')}}</th>
                                <!-- <th>{{trans('student::student.parent')}}</th> -->
                                <th>{{trans('student::student.op')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $index=>$item)
                                <tr>
                                    <td> {{$index+1}} </td>
                                  
                                    <td> {{$item->name}} </td>
                                    <td> {{$item->gender}} </td>
                                    <!-- <td> {{$item->nationality}} </td> -->
                                    <!-- <td> {{$item->type}} </td> -->
                                    <td> {{$item->phone}} </td>
                                    <td> {{$item->birthDate}} </td>
                                    <td> {{$item->age}} </td>  
                                    <!-- <td>

                                         

                                    </td> -->

                                    <td> {{-- view --}}
                                        <a title="View" href="{{url('/admin-panel/student/' . $item->id)}}" type="button" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                       
                                        {{-- Edit --}}
                                        @role('admin|superadmin')
                                        <a title="Edit" href="{{url('/admin-panel/student/' . $item->id . '/edit')}}" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a title="Addcourse" href="{{url('/admin-panel/student/addcourse/' . $item->id )}}" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true">AddCourse</i></a>
                                        @endrole

                                        {{-- Delete --}}
                                        @role('superadmin')
                                        <form class="inline" action="{{url('/admin-panel/deletess/' . $item->id)}}" method="POST">
                                            {{ method_field('delete') }} {!! csrf_field() !!}
                                            
                                            <button title="Delete" type="submit" onclick="return confirm('Are you sure, You want to delete student ?')" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                        @endrole
                                    </td>
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
    <!-- /.row -->
</section>
@endsection


@section('javascript')

{{-- Sweet Alert --}}
@include('commonmodule::includes.swal')

<!-- page script -->
<!-- DataTables -->
<script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    $(function () {
      $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection
