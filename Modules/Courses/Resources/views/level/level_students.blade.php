@extends('commonmodule::layouts.master')

@section('title')
   المستويات
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
           المستويات
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
                        <h3 class="box-title">الطلاب</h3>
{{--                        <a href="{{url('admin-panel/levels/create')}}" type="button" class="btn btn-success pull-right"><i--}}
{{--                                class="fa fa-plus" aria-hidden="true"></i>--}}
{{--                            &nbsp; {{trans('courses::level.createnew')}}</a>--}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('student::student.id')}}</th>
                                <th>{{trans('student::student.name')}}</th>
                                <th>{{trans('student::student.gender')}}</th>
                                <th>{{trans('student::student.phone')}}</th>
                                <th>{{trans('student::student.birth_date')}}</th>
                                <th>{{trans('student::student.age')}}</th>
                                <th>الباركود</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($level->students as $index=>$item)
                                <tr>

                                    <td> {{$index+1}} </td>

                                    <td> {{$item->name}} </td>
                                    <td> {{$item->gender}} </td>

                                    <td> {{$item->phone}} </td>
                                    <td> {{$item->birthDate}} </td>
                                    <td> {{$item->age}} </td>
                                    <td> {{$item->barCode}} </td>

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

    {{-- sweet alert --}}
    <script src="{{asset('assets/admin/plugins/sweetalert/sweetalert.min.js')}}"></script>

    @if (session('success'))
        <script>
            swal("{{__('commonmodule::swal.good')}}", "{{__('commonmodule::swal.saved')}}", "success", {button: "{{__('commonmodule::swal.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::course.good')}}", "{{trans('courses::course.updated')}}", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::course.good')}}", "{{trans('courses::course.deleted')}}", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    <!-- page script -->
    <!-- DataTables -->
    <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

    </script>

@endsection
