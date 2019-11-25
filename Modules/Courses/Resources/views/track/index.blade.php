@extends('commonmodule::layouts.master')

@section('title')
    {{trans('courses::track.tracks')}}
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::track.datatables')}}
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
                        <h3 class="box-title">{{trans('courses::track.hover')}}</h3>
                        <a href="{{url('admin-panel/tracks/create')}}" type="button" class="btn btn-success pull-right"><i
                                    class="fa fa-plus" aria-hidden="true"></i>
                            &nbsp; {{trans('courses::track.createnew')}}</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('courses::track.id')}}</th>
                                <th>{{trans('courses::track.title')}}</th>
                                <th>{{trans('courses::track.op')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tracks as $item)
                                <tr>
                                    <td> {{$item->id}} </td>
                                    <td> {{$item->title}} </td>
                                    <td> {{-- view --}}
                                        <a title="View" href="{{url('/admin-panel/tracks/' . $item->id)}}" type="button"
                                           class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                        {{-- Edit --}}
                                        @role('superadmin|admin')
                                        <a title="Edit" href="{{url('/admin-panel/tracks/' . $item->id . '/edit')}}"
                                           type="button" class="btn btn-primary"><i class="fa fa-pencil"
                                                                                    aria-hidden="true"></i></a>
                                        @endrole

                                        {{-- Delete --}}
                                        @role('superadmin')
                                        <form class="inline" action="{{url('admin-panel/tracks/delete/' . $item->id)}}"
                                              method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit"
                                                    onclick="return confirm('Are you sure, You want to delete Category?')"
                                                    type="button" class="btn btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
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

    {{-- sweet alert --}}
    <script src="{{asset('assets/admin/plugins/sweetalert/sweetalert.min.js')}}"></script>

    @if (session('success'))
        <script>
            swal("{{trans('courses::track.good')}}", "{{trans('courses::track.saved')}}", "success", {button: "{{trans('courses::track.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::track.good')}}", "{{trans('courses::course.updated')}}", "success", {button: "{{trans('courses::track.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::track.good')}}", "{{trans('courses::course.deleted')}}", "success", {button: "{{trans('courses::track.btn')}}",});
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
