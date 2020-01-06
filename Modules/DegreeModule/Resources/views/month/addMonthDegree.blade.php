@extends('commonmodule::layouts.master')

@section('title')
     اضافه درجات المشروع
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            اضافه درجات المشروع ({{$month->name}})
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
            <form class="" action="{{route('storedegree')}}" method="POST">
            {{ csrf_field() }}    
                        <label class="control-label col-sm-3" for="title">  الكلاس:   {{$classe->name}}</label>
                        <input type="hidden" value="{{$classe->id}}" name="class_id">
                        
                        
                    </div>
                    <div class="">
                        
                        <label class="control-label col-sm-3" for="title">  الكورس:   {{$classe->course->title}}</label>
                        <input type="hidden" value="{{$classe->course->id}}" name="course_id">

                        
                      
                    </div>
                    <div class="">
                      
                        <label class="control-label col-sm-3" for="title">  المستوي: {{$classe->level->title}}</label>

                        
                    </div>
                    {{-- Classe Name --}}
                    <div class="">
                        <label class="control-label col-sm-2" for="title">  رقم الشهر :{{$month->number}}</label>
                        <input type="hidden" value="{{$month->id}}" name="month_id">

                        
                       
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                   
                   
                       
                   
                    <div class="">
                        
                        <label class="control-label col-sm-3" for="title">  اسم الشهر:  {{$month->name}}</label>

                        
                    </div>
                    <div class="">
                        
                        <!-- <label class="control-label col-sm-3" for="title">  التاريخ:  {{$month->date}}</label> -->

                       
                    </div>

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
                        <!-- <a href="" type="button"
                           class="btn btn-warning pull-right"><i class="fa fa-angle-left" aria-hidden="true"></i>
                            &nbsp;   رجوع</a> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tableid" class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th> #</th>    
                                <th> الطالب</th>
                                <th>مجموع درجات الحصصص </th>
                                <th> درجه المشروع</th>
                                <th>المجموع </th>
                                <th>الحاله </th>
                               
            
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $totSubDegs as $index=> $item)
                                <tr>
                                    <td> {{$index+1}} </td>
                                    <td> {{$item->student->name}} </td>
           
                                    <input type="hidden" value="{{$item->id}}" name="item[{{ $index }}][student_id]">

                                    <td class="combat">{{$item->total_degree}} </td>
                                    <td class="combat"><input type="number" value="0" min="0" step="any" class="form-control" name="item[{{ $index }}][projectdegree]">   </td>
                                    <td class="combat"> </td>
                                     <input type="hidden" value="0" class="total-anas" name="item[{{ $index }}][total]">  
                                     <td class="combat"> </td>

                                   


                                  
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                 <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('/admin-panel/classes')}}" type="button" class="btn btn-danger">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                <button type="submit" class="btn btn-primary pull-right">{{__('formIndex.submit')}} &nbsp; <i class="fa fa-save"></i></button>
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

    <script>
       
       $(document).ready( function() {
            var now = new Date();
            var month = (now.getMonth() + 1);               
            var day = now.getDate();
            if (month < 10) 
                month = "0" + month;
            if (day < 10) 
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            $('#date').val(today);
        });




    $("table tr").on('blur input', function () {
 
    // $('tr').each(function () {
       
        var sum = 0
        //find the combat elements in the current row and sum it 
        $(this).find('.combat').each(function () {
            var combat = $(this).find("input").val();
           
            if (!isNaN(combat) && combat.length !== 0) {
                sum += parseFloat(combat);
            }
            $(this).parent('tr').find('.total-combat').html(sum);
            $(this).parent('tr').find('.total-anas').val(sum);

            
        
    });
});


    </script>

@endsection
