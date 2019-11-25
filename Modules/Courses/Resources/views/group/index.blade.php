@extends('commonmodule::layouts.master')

@section('title')
    {{trans('courses::group.Groups')}}
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::group.Groups')}}
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
                        <h3 class="box-title">{{trans('courses::group.Groups')}}</h3>
                        <a href="{{url('admin-panel/groups/create')}}" type="button"
                           class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
                            &nbsp; {{trans('courses::group.createnew')}}</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('courses::group.id')}}</th>
                                <th>{{trans('courses::group.title')}}</th>
                                <th>{{trans('courses::group.course')}}</th>
                                <th>{{trans('courses::group.sessions')}}</th>
                                <th>{{trans('courses::group.sessionsPerWeek')}}</th>
                                <th>{{trans('courses::group.days')}}</th>
                                <th>{{trans('courses::group.groupStartDate')}}</th>
                                <th>{{trans('courses::group.op')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($groups as $item)

                                <tr>
                                    <td> {{$item->id}} </td>
                                    <td> {{$item->title}} </td>
                                    <td> {{$item->course->title}} </td>
                                    <td> {{$item->allSessions}} </td>
                                    <td> {{$item->sessionsPerWeek}} </td>

                                    <td>
                                        @foreach($item->days as $item1)
                                            {{$item1->day_id }}
                                            {{ $loop->last ? '' : '&' }}
                                        @endforeach

                                    </td>

                                    <td> {{$item->groupStartDate}} </td>


                                    <td> {{-- view --}}
                                        <a title="View" href="{{url('/admin-panel/groups/' . $item->id)}}"
                                           type="button" class="btn btn-success"><i class="fa fa-eye"
                                                                                    aria-hidden="true"></i></a>
                                        {{-- Edit --}}
                                        @role('superadmin|admin')
                                        <a title="Edit" href="{{url('/admin-panel/groups/' . $item->id . '/edit')}}"
                                           type="button" class="btn btn-primary"><i class="fa fa-pencil"
                                                                                    aria-hidden="true"></i></a>
                                        @endrole
                                        {{-- Delete --}}
                                        @role('superadmin')
                                        <form class="inline" action="{{url('admin-panel/groups/delete/' . $item->id)}}"
                                              method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit"
                                                    onclick="return confirm('Are you sure, You want to delete Category?')"
                                                    type="button" class="btn btn-danger"><i class="fa fa-trash"
                                                                                            aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        @endrole

                                        {{-- Attendance --}}
                                        <a title="View" href="{{url('admin-panel/sessions/'.$item->id)}}"
                                           type="button" class="btn btn-success"><i class="fa fa-clipboard"
                                                                                    aria-hidden="true"></i></a>

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
            swal("{{trans('courses::group.good')}}", "{{trans('courses::group.saved')}}", "success", {button: "{{trans('courses::group.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::group.good')}}", "{{trans('courses::group.updated')}}", "success", {button: "{{trans('courses::group.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::group.good')}}", "{{trans('courses::group.deleted')}}", "success", {button: "{{trans('courses::group.btn')}}",});
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
