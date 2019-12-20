@extends('commonmodule::layouts.master')

@section('title')
    المصروفات
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            المصروفات
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
                        <h3 class="box-title">المصروفات</h3>
                        <a href="{{route('outgoing.create')}}" type="button"
                           class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
                            &nbsp; اضافه مصروف جديد</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اليوم</th>
                                <th>التاريخ </th>
                                <th> المبلغ</th>
                                <th> السبب</th>
                                <th> العمليات</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($outgoings as $index=> $item)
                                <tr>
                                    <td> {{$index+1}} </td>
                                    <td> {{$item->day}} </td>
                                    <td> {{$item->date}} </td>
                                    <td> {{$item->money}} </td>
                                    <td> {{$item->reason}} </td>
                                    <td>
                                        {{-- Edit --}}
                                       
                                        <a title="Edit" href="{{route('outgoing.edit',$item->id)}}"
                                           type="button" class="btn btn-primary"><i class="fa fa-pencil"
                                                                                    aria-hidden="true"></i></a>
                                      
                                        {{-- Delete --}}
                                       
                                        <form class="inline" action="{{url('admin-panel/outgoing/delete/' . $item->id)}}"
                                              method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit"
                                                    onclick="return confirm('هل انت متاكد من حذف هذا المصروف')"
                                                    type="button" class="btn btn-danger"><i class="fa fa-trash"
                                                                                            aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        
                                       

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
            swal("{{trans('courses::course.good')}}", "تم اضافه المصروف بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::course.good')}}", "تم تحديث المصروف بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::course.good')}}", "تم حذف المصروف بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
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
