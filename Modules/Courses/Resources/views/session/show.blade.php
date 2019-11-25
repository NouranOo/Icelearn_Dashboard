@extends('commonmodule::layouts.master')

@section('title')
    {{trans('courses::session.Sessions')}}
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::session.Sessions')}} of {{trans('courses::session.group')}}: {{$group->id}}
        </h1>

    </section>
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    {{--<div class="box-header with-border" style="align-content: center">--}}
                        {{--<h3 class="box-title" ><b></b></h3>--}}
                    {{--</div>--}}
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th><b>#</b></th>
                                <th>{{trans('courses::session.day')}}</th>
                                <th>{{trans('courses::session.sessionDate')}}</th>
                                <th>{{trans('courses::session.op')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($group->sessions as $key =>  $item)

                                <tr>
                                    <td> {{$key +1}} </td>
                                    <td>{{ date('D', strtotime($item->sessionDate)) }}</td>
                                    <td> {{$item->sessionDate}} </td>



                                    <td>

                                        {{-- Edit --}}
                                        @role('superadmin|admin')
                                        <a title="Edit" href="{{url('/admin-panel/sessions/' . $item->id . '/edit')}}"
                                           type="button" class="btn btn-primary"><i class="fa fa-pencil"
                                                                                    aria-hidden="true"></i></a>
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

    {{-- sweet alert --}}
    <script src="{{asset('assets/admin/plugins/sweetalert/sweetalert.min.js')}}"></script>

    @if (session('success'))
        <script>
            swal("{{trans('courses::session.good')}}", "{{trans('courses::session.saved')}}", "success", {button: "{{trans('courses::session.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::session.good')}}", "{{trans('courses::session.updated')}}", "success", {button: "{{trans('courses::session.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::session.good')}}", "{{trans('courses::session.deleted')}}", "success", {button: "{{trans('courses::session.btn')}}",});
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
