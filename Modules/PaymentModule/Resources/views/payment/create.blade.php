@extends('commonmodule::layouts.master')
@section('title') ايصال استلام نقديه
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        ايصال استلام نقديه
    </h1>

</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">الايصال:</h3>
           <h3 class="box-title" style=" float: left; color: crimson;  font-weight: 900; ">U GROW</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{route('storepayment')}}" method="POST">
            {{ csrf_field() }}

            <div class="box-body">
             <div class="row">

             {{-- name --}}
                <div class="form-group col-sm-6" >
                
                    <label class="control-label col-sm-2" for="title">{{__('formIndex.title')}}
                    </label>
                    <div class="col-sm-8">
                        <input type="text"  class="form-control"  name="name" value="{{$students->first()->name}}" required>
                        <input type="hidden"  class="form-control"  name="student_id" value="{{$students->first()->id}}">

                    </div>
                   
                </div>
                {{-- code --}}
                <div class="form-group col-sm-6" >
                  
                    <label class="control-label col-sm-2" for="title">الكود:
                    </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control"  name="code" required>
                    </div>
                </div>
              
              
                {{-- course Category --}}
                <div class="form-group col-sm-6" >
                  
                    <label class="control-label col-sm-2" for="title">الكورس:
                    </label>
                  
                    <div class="col-sm-8">

                    <select class="form-control" name="course_id" required>
                              @foreach($students->first()->courses as $course)
                               <option value="{{ $course->id}}"> {{$course->title}}  </option>
                              @endforeach
                        
                      </select>
                      </div> 

                </div>

                {{-- level  --}}
                <div class="form-group col-sm-6" >
                  
                    <label class="control-label col-sm-2" for="title">المستوي:
                    </label>
                   
                    <div class="col-sm-8">
                    <select class="form-control" name="level_id" required>
                              @foreach($students->first()->levels as $studentlevel)
                               <option value="{{ $studentlevel->id}}"> {{$studentlevel->title}}-{{$studentlevel->course->title}}  </option>
                              @endforeach
                        
                      </select>  
                    </div>
                    
                </div>
             
                {{-- Money --}}
                <div class="form-group col-sm-12" >
                <div class="row">
                <div class="continer">
                    <label class="control-label col-sm-1" style="float:right;padding-left:0;" for="title">مبلغ وقدره:
                    </label>
                    <div class="col-sm-9" style="width:80%">
                        <input type="number" min='0' step='any' autocomplete="off" class="form-control"  name="money" required>
                               
                    </div>  </div></div>
                </div>
                {{-- type Category --}}
                <div class="form-group col-sm-6">
                  
                    <label class="control-label col-sm-2" for="title">النوع:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="type_payment">
                              
                                    <option value="مصاريف الكتب"> &nbsp;&nbsp;مصاريف الكتب</option>
                                    <option value="مصاريف الشهر"> &nbsp;&nbsp;مصاريف الشهر</option>
                              
                            </select>
                    </div>
                </div>
                {{-- date --}}
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-2" for="title">التاريخ:</label>
                    <div class="col-sm-8">
                        <input type="date" id="date" autocomplete="off" class="form-control" value="{{old('date')}}"  name="date" required>
                    </div>
                </div>
              
                {{-- discount --}}
                <div class="form-group col-sm-6" >
                  
                    <label class="control-label col-sm-2" for="title"> خصم: 
                    </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control"  name="discount">
                              
                    </div>
                </div>
                {{-- discount_owner --}}
                <div class="form-group col-sm-6" >
                  
                    <label class="control-label col-sm-2" for="title"> مسؤل الخصم:
                    </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control"  name="discount_owner">
                            
                    </div>
                </div>
                {{-- recipient --}}
                <div class="form-group col-sm-6"  >
                  
                    <label class="control-label col-sm-2" for="title"> المستلم: 
                    </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control"  name="recipient">
                             
                    </div>
                </div>

                {{-- Secretary  --}}
                <div class="form-group col-sm-6" >
                  
                    <label class="control-label col-sm-2" for="title"> امين الخزنه: 
                    </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control"  name="secretary">
                             
                    </div>
                </div>
              
              


            </div>
           </div> 
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('admin-panel')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                <button type="submit" class="btn btn-primary pull-right">{{__('formIndex.submit')}} &nbsp; <i class="fa fa-save"></i></button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</section>
@endsection

@section('javascript')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script>
    $(function () {
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5({
                toolbar: {
                    "font-styles": true,
                    "emphasis": true,
                    "lists": true,
                    "html": true,
                    "link": true,
                    "image": false
                }
            });
        });



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

</script>
@endsection
