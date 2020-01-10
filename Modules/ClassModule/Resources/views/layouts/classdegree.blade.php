@extends('commonmodule::layouts.master')

@section('title')
     عرض درجات الكلاس
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            عرض درجات الكلاس ({{$degrees->first()->classe->name}})
        </h1>

    </section>
@endsection


@section('content')

<section class="content">
        <div class="row">
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">البيانات </h3>
                    </div>
                    <br>
                    {{-- Classe Name --}}
                    <div class="">
          
            
                        <label class="control-label col-sm-3" for="title">  الكلاس:   {{$degrees->first()->classe->name}}</label>
                        
                        
                        
                    </div>
                    <div class="">
                        
                        <label class="control-label col-sm-3" for="title">  الكورس:   {{$degrees->first()->classe->course->title}}</label>
                        

                        
                      
                    </div>
                    <div class="">
                      
                        <label class="control-label col-sm-3" for="title">  المستوي: {{$degrees->first()->classe->level->title}}</label>

                        
                    </div>
                   
                    <br>
                    <br>
                   
                   
                   
                       
                   
                   

                </div>
                </div>
</section>
                <hr>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">الطلاب</h3>
                       
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tableid" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> #</th>    
                                    <th> الطالب</th>
                                    <th>مجموع الدرجات  </th>
                                    <th>الحاله </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $degrees as $index=> $item)
                                <tr>
                                    <td> {{$index+1}} </td>
                                    <td> {{$item->student->name}} </td>
                                    <td>{{$item->total_class_degree}}  </td>
                                     <td>
                                        @if($item->total_class_degree >=701) +A    
                                            @elseif ( $item->total_class_degree > 600 && $item->total_class_degree <= 700) A 
                                            @elseif ( $item->total_class_degree > 400 && $item->total_class_degree <=600) +B
                                            @elseif ($item->total_class_degree > 300 && $item->total_class_degree <=400)  B
                                            @elseif ($item->total_class_degree > 280 && $item->total_class_degree <=300) +C
                                            @elseif ( $item->total_class_degree <=280) C
                                        @endif
                                     </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                 <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('/admin-panel/classes')}}" type="button" class="btn btn-danger">رجوع &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
            </div>
            <!-- /.box-footer -->
        </form>
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
            swal("{{trans('courses::course.good')}}", "تم اضافه الحصه بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::course.good')}}", "{{trans('courses::course.updated')}}", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::course.good')}}", "تم حذف الحصه بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    <!-- page script -->
    <!-- DataTables -->
    <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

 

@endsection
