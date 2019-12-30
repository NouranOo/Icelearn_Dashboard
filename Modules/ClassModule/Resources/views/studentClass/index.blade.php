@extends('commonmodule::layouts.master')

@section('title')
    طلاب الكلاس
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            طلاب الكلاس
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
                        <!-- <a href="{{route('createclass')}}" type="button"
                           class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
                            &nbsp; اضافه طالب جديد</a> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>النوع </th>
                                <th> التلفون</th>
                                <th>الباركود </th>
                                <th>العمليات </th>
                                <!-- <th> الايام</th>
                                <th>من </th>
                                <th>الي </th> -->

                                <!-- <th>طلاب الكلاس </th> -->

                                

                                
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($classe->students as $index=> $item)
                                <tr>
                                    <td> {{$index+1}} </td>
                                    <td> {{$item->name}} </td>
                                    <td> {{$item->gender}} </td>
                                    <td> {{$item->phone}} </td>
                                
                                    <td> {{$item->barCode}}  </td>
                                    <!-- <td> {{$item->day}} </td>
                                    <td> {{$item->from}} </td>
                                    <td> {{$item->to}} </td> -->
                                    <td>     <form class="inline" action="{{route('deletestudentclass',$item->pivot->id)}}"
                                              method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit"
                                                    onclick="return confirm('هل انت متاكد من حذف هذا الطالب من هذا الكلاس !?')"
                                                    type="button" class="btn btn-danger"><i class="fa fa-trash"
                                                                                            aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <!-- <a href="{{route('viewlevels',$item->id)}}"><button class="btn btn-success">الدرجات</button></a>
                                        <a href="{{route('viewlevels',$item->id)}}"><button class="btn btn-info">الغياب</button></a>
                                         -->
                                        </td>



                                  
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                <a href="{{url('/admin-panel/classes')}}" type="button" class="btn btn-default">رجوع &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                <!-- <button type="submit" class="btn btn-primary pull-right">{{__('formIndex.submit')}} &nbsp; <i class="fa fa-save"></i></button> -->
            </div>
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
            swal("{{trans('courses::course.good')}}", "تم اضافه الطالب بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::course.good')}}", "{{trans('courses::course.updated')}}", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::course.good')}}", "تم حذف الطالب بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
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
