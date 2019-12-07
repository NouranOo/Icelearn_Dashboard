@extends('commonmodule::layouts.master')

@section('title')
    {{trans('courses::course.Courses')}}
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::course.Courses')}}
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
                        <h3 class="box-title">{{trans('courses::course.Courses')}}</h3>
                        <a href="{{url('admin-panel/courses/create')}}" type="button"
                           class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
                            &nbsp; {{trans('courses::course.createnew')}}</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('courses::course.id')}}</th>
                                <th>{{trans('courses::course.title')}}</th>
                                <th>عدد المستويات</th>
                                <th>مصاريف الكتب</th>
                                <th>التكاليف الشهريه</th>
                                <th>{{trans('courses::course.op')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $item)
                                <tr>
                                    <td> {{$item->id}} </td>
                                    <td> {{$item->title}} </td>
                                    <td> {{$item->levels_number}} </td>
                                    <td> {{$item->book_fees}} </td>
                                    <td> {{$item->month_fees}} </td>
                                    <td> {{-- view --}}
                                        <a title="View" href="{{url('/admin-panel/courses/' . $item->id)}}"
                                           type="button" class="btn btn-success"><i class="fa fa-eye"
                                                                                    aria-hidden="true"></i></a>
                                        {{-- Edit --}}
                                        @role('superadmin|admin')
                                        <a title="Edit" href="{{url('/admin-panel/courses/' . $item->id . '/edit')}}"
                                           type="button" class="btn btn-primary"><i class="fa fa-pencil"
                                                                                    aria-hidden="true"></i></a>
                                        @endrole
                                        {{-- Delete --}}
                                        @role('superadmin')
                                        <form class="inline" action="{{url('admin-panel/courses/delete/' . $item->id)}}"
                                              method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit"
                                                    onclick="return confirm('Are you sure, You want to delete Category?')"
                                                    type="button" class="btn btn-danger"><i class="fa fa-trash"
                                                                                            aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        @endrole
                                        <a href="{{route('viewlevels',$item->id)}}"><button class="btn btn-primary">المستويات</button></a>
                                        <a href="{{route('coursepayments',$item->id)}}"><button class="btn btn-warning">الايصالات</button></a>
                                        <a href="{{route('viewstudents',$item->id)}}"><button class="btn btn-primary">الطلاب</button></a>


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
            swal("{{trans('courses::course.good')}}", "{{trans('courses::course.saved')}}", "success", {button: "{{trans('courses::course.btn')}}",});
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
        $(document).ready(function () {
            $('#example2 tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });

            $(function () {
                var table = $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': true,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                })

                table.columns().every(function () {
                    var that = this;

                    $('input', this.footer()).on('keyup change', function () {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });


            })

        });


    </script>

@endsection
