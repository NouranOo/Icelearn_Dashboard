@extends('commonmodule::layouts.master')

@section('title')
   الايصالات
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
           الايصال
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
                        <h3 class="box-title">الايصال</h3>
                        <a href="{{route('searchpayment')}}" type="button" class="btn btn-success pull-right"><i
                                    class="fa fa-plus" aria-hidden="true"></i>
                            &nbsp; انشاء ايصال جديد</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                
                                <th>الاسم</th>
                                <th>الكود</th>
                                <th>الكورس</th>
                                <th>المستوي</th>
                                <th>المبلغ</th>
                                <th>النوع</th>
                                <th>التاريخ</th>
                                

                                <th>خصم</th>
                                <th>مسول الخصم</th>
                                <th>المستلم</th>
                                <th>امين الخزينه</th>
                            
                           
                            </tr>
                            </thead>
                            <tbody>
                        
                            
                                <tr>
                               
                                    
                                    <td> {{$payment->name}} </td>
                                    <td> {{$payment->code}} </td>
                                    <td> {{$course->first()->title}} </td>
                                    <!-- <td> {{$payment->level}} </td> -->
                                    <td> {{$level->first()->title}} </td>

                                    <td> {{$payment->money}} </td>
                                    <td> {{$payment->type_payment}} </td>
                                    <td> {{$payment->date}} </td>
                                  
                                    <td> {{$payment->discount}} </td>
                                    
                                    <td> {{$payment->discount_owner}} </td>
                                    
                                    <td> {{$payment->recipient}} </td>
                                    <td> {{$payment->secretary}} </td>
                                  
                                </tr>
                            
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
