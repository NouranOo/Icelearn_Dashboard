@extends('commonmodule::layouts.master')

@section('title')
    عرض درجات الحصه 
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            عرض درجات الحصه ({{$subclasse->day}})
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
                                <th>الغياب </th>
                                <th> الواجبات</th>
                                <th>التفاعل </th>
                                <th>المجموع </th>
                                <th>تعديل </th>

            
                            </tr>
                            </thead>
                            <tbody>
                         

                            <!-- @foreach ( $degree as $index=> $item)
                                <tr>
                                    <td> {{$index+1}} </td>
                                    <td> {{$item->student->name}} </td>
           
                                    <input type="hidden" value="{{$item->id}}" name="item[{{ $index }}][student_id]">
                                    <td class="combat"> {{$item->attendance}}  </td>
                                    <td class="combat">  {{$item->homework}}   </td>
                                    <td class="combat"> {{$item->action}}     </td>
                                    <td  class="total-combat">   {{$item->total}} </td>
                                      

                                   


                                  
                                </tr>
                            @endforeach -->


                            @foreach ( $subclasse->classe->students as $index=> $item)
                                <tr>
                                    <td> {{$index+1}} </td>
                                    <td> {{$item->name}} </td>
                                 
                                 
                             
                                @foreach($arr as $ar)
                                   @if($ar == $item->id)
                                 
                                      {{$flag = 1}}
                                      @break
                                    @else
                                    {{$flag = 0}}

                                   @endif
                                   
                                @endforeach
           
                                   @if($flag == 1)
                                 
                                    

                                    <input type="hidden" value="{{$item->id}}" name="item[{{ $index }}][student_id]">
                                    <td class="combat attendance"><input type="number"  min="0" step="any" class="form-control attendance1" name="item[{{ $index }}][attendance]" value="{{$degreedetail[$index]->attendance}}"> </td>
                                    <td class="combat homework"><input type="number"  min="0" step="any" class="form-control  homework1" name="item[{{ $index }}][homework]" value="{{$degreedetail[$index]->homework}}">   </td>
                                    <td class="combat action itm"> 
                                     <input type="number"  min="0" step="any" class="form-control  action1" name="item[{{ $index }}][action]" value="{{$degreedetail[$index]->action}}">
                                      <input type="hidden" class="student_id" name="id[]" value="{{$item->id}}">
                                      <input type="hidden" class="subclasse_id" name="subclasse_id[]" value="{{$subclasse->id}}">
                                      <input type="hidden" class="classe_id" name="classe_id[]" value="{{$subclasse->classe->id}}">
                                      <input type="hidden" class="month_id" name="month_id[]" value="{{$monthid}}">

                                       </td>
                                    <td  class="total-combat "> {{$degreedetail[$index]->total}}
                                    </td>
                                    <td> 
                                      <input type="hidden" class="total-anas" name="item[{{ $index }}][total]" value="{{$degreedetail[$index]->total}}">
                                       <button class=" updatedata btn btn-warning">تحديث</button> 
                                    </td>

                                   @else

                                   <input type="hidden" value="{{$item->id}}" name="item[{{ $index }}][student_id]">
                                    <td class="combat attendance"><input type="number" value="0" min="0" step="any" class="form-control attendance1" name="item[{{ $index }}][attendance]">  </td>
                                    <td class="combat homework"><input type="number" value="0" min="0" step="any" class="form-control homework1" name="item[{{ $index }}][homework]">   </td>
                                    <td class="combat action itm">
                                     <input type="number" value="0" min="0" step="any" class="form-control action1" name="item[{{ $index }}][action]">

                                      <input type="hidden" class="student_id" name="id[]" value="{{$item->id}}">
                                      <input type="hidden" class="subclasse_id" name="subclasse_id[]" value="{{$subclasse->id}}">
                                      <input type="hidden" class="classe_id" name="classe_id[]" value="{{$subclasse->classe->id}}">
                                      <input type="hidden" class="month_id" name="month_id[]" value="{{$monthid}}">

                                        </td>
                                    <td  class="total-combat "> 
                                    </td>
                                     <td> 
                                     <input type="hidden" value="0" class="total-anas" name="item[{{ $index }}][total]">  
                                       <button class=" updatedata btn btn-warning">تحديث</button>   
                                      </td>
                

                                   @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                 <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('/admin-panel/classes')}}" type="button" class="btn btn-danger">رجوع &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
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


$(".updatedata").click(updateCart);

function updateCart(){
    
    var total = $(this).parent('td').find('.total-anas').val();
    var attendance = $(this).parent('td').parent('tr').find('.attendance').find('.attendance1').val();
    var homework = $(this).parent('td').parent('tr').find('.homework').find('.homework1').val();
    var action = $(this).parent('td').parent('tr').find('.action').find('.action1').val();

  

    var student_id =$(this).parent('td').parent('tr').find('.itm').find('.student_id').val();
    var subclasse_id = $(this).parent('td').parent('tr').find('.itm').find('.subclasse_id').val();
    var classe_id = $(this).parent('td').parent('tr').find('.itm').find('.classe_id').val();
    var month_id = $(this).parent('td').parent('tr').find('.itm').find('.month_id').val();

    
   
    console.log(total);
    console.log(attendance);
    console.log(homework);
    console.log(action);

    console.log(student_id);
    console.log(subclasse_id);
    console.log(classe_id);
    console.log(month_id);
    

  

    $.ajax({
    url:"{{route('update.subdegree')}}",  
    method:"POST",  
    data:{
        'total' : total,
        'attendance' : attendance,
        'homework' : homework,
        'action' : action,
        'student_id' : student_id,
        'subclasse_id' : subclasse_id,
        'classe_id' : classe_id,
        'month_id' : month_id,
       


        '_token':"{{csrf_token() }}"
    },                              
    success: function( data ) {
        //toastr.success("تم التحديث بنجاح!");
        alert(data.success);
        jQuery('.alert').show();
        jQuery('.alert').html(data.success);

   


     
    }
  });
}


    </script>

@endsection
