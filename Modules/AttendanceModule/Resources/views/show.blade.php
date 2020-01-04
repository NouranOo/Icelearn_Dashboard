@extends('commonmodule::layouts.master')

@section('title')
    عرض غياب الحصه 
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            عرض غياب الحصه ({{$subclasse->day}})
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
                
                        <label class="control-label col-sm-3" for="title">  الكلاس:   {{$subclasse->classe->name}}</label>
                        <input type="hidden" value="{{$subclasse->classe->id}}" name="class_id">
                        
                        
                    </div>
                    <div class="">
                        
                        <label class="control-label col-sm-3" for="title">  الكورس:   {{$subclasse->classe->course->title}}</label>
                        <input type="hidden" value="{{$subclasse->classe->course->id}}" name="course_id">

                        
                      
                    </div>
                    <div class="">
                      
                        <label class="control-label col-sm-3" for="title">  المستوي: {{$subclasse->classe->level->title}}</label>

                        
                    </div>
                    {{-- Classe Name --}}
                    <div class="">
                        <label class="control-label col-sm-2" for="title">  رقم الحصه :{{$subclasse->number}}</label>
                        <input type="hidden" value="{{$subclasse->id}}" name="subclasse_id">

                        
                       
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    {{-- Classe Name --}}
                    <!-- <div class="">
                        <label class="control-label col-sm-3" for="title">  رقم الحصه :{{$subclasse->number}}</label>
                       
                    </div> -->
                    <div class="">
                        
                        <label class="control-label col-sm-3" for="title">  اليوم:  {{$subclasse->day}}</label>

                        
                    </div>
                    <div class="">
                        
                        <label class="control-label col-sm-3" for="title">  التاريخ:  {{$subclasse->date}}</label>

                       
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
                       
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="tableid" class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th> #</th>    
                                <th> الطالب</th>
                                <th>الكود </th>
                                <th> الغياب</th>
                                <th> تعديل</th>

                                
            
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $subclasse->classe->students as $index=> $item)
                                <tr>
                                    <td> {{$index+1}} </td>
                                    <td> {{$item->name}} </td>
                                    <td> {{$item->barCode}} </td>
                             
                                @foreach($arr as $ar)
                                   @if($ar == $item->id)
                                 
                                      {{$flag = 1}}
                                      @break
                                    @else
                                    {{$flag = 0}}

                                   @endif
                                   
                                @endforeach
           
                                   @if($flag == 1)
                                    <td class="contact_name"> 
                                      <button id='btn' class="btn btn-success"> <i class="fa fa-check"></i></button> 
                                      <input type="hidden" class="attendance" name="attendance[]" value="null">
                                      <input type="hidden" class="student_id" name="id[]" value="{{$item->id}}">
                                      <input type="hidden" class="subclasse_id" name="subclasse_id[]" value="{{$subclasse->id}}">
                                      <input type="hidden" class="classe_id" name="classe_id[]" value="{{$subclasse->classe->id}}">


                                    </td>
                                    
                                    <td><button class=" updatedata btn btn-warning">تحديث</button>  </td>

                                   @else
                                   <td class="contact_name">
                                    <button id="btn" class="btn btn-danger"> <i class="fa fa-times"></i></button>
                                      <input type="hidden" class="attendance" name="attendance[]" value="true">
                                      <input type="hidden" class="student_id" name="id[]" value="{{$item->id}}">
                                      <input type="hidden" class="subclasse_id" name="subclasse_id[]" value="{{$subclasse->id}}">
                                      <input type="hidden" class="classe_id" name="classe_id[]" value="{{$subclasse->classe->id}}">


                                     </td>
                                  

                                   <td><button class=" updatedata btn btn-warning">تحديث</button>  </td>

                                   @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                 <!-- /.box-body -->
            <div class="box-footer">
               
                <!-- <button type="submit" class="btn btn-primary pull-right">{{__('formIndex.submit')}} &nbsp; <i class="fa fa-save"></i></button> -->
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
            swal("{{trans('courses::course.good')}}", "تم اضافه الغياب بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::course.good')}}", "{{trans('courses::course.updated')}}", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::course.good')}}", "تم حذف الغياب بنجاح", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    <!-- page script -->
    <!-- DataTables -->
    <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

     <script>
       
   




   $(".updatedata").click(updateCart);

function updateCart(){
  
    var attendance = $(this).closest('tr').find('.contact_name').find('.attendance').val();
    var student_id = $(this).closest('tr').find('.contact_name').find('.student_id').val();
    var subclasse_id = $(this).closest('tr').find('.contact_name').find('.subclasse_id').val();
    var classe_id = $(this).closest('tr').find('.contact_name').find('.classe_id').val();
    var btn = $(this).closest('tr').find('.contact_name').find('#btn');
    var fa = btn.find('.fa');


  

    $.ajax({
    url:"{{route('attendance.updateAttendance')}}",  
    method:"POST",  
    data:{
        'attendance' : attendance,
        'student_id' : student_id,
        'subclasse_id' : subclasse_id,
        'classe_id' : classe_id,


        '_token':"{{csrf_token() }}"
    },                              
    success: function( data ) {
        //toastr.success("تم التحديث بنجاح!");
        alert(data.success);
        jQuery('.alert').show();
        jQuery('.alert').html(data.success);

        if(btn.hasClass( "btn-danger" )){
            btn.removeClass("btn-danger").addClass('btn-success');
            fa.removeClass("fa-times").addClass('fa-check');
        }else{
            btn.removeClass("btn-success").addClass('btn-danger');
            fa.removeClass("fa-check").addClass('fa-times');

        }


     
    }
  });
}


    </script> 

@endsection
