@extends('commonmodule::layouts.master')
@section('title')اضافه طالب لكلاس 
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       اضافه طالب لكلاس 
    </h1>

</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">البيانات:</h3>
           <h3 class="box-title" style=" float: left; color: crimson;  font-weight: 900; ">U GROW</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{route('storeaddclasses')}}" method="POST">
            {{ csrf_field() }}

            <div class="box-body">
             <div class="row">

             {{-- name --}}
                <div class="form-group col-sm-12" >
                
                    <label class="control-label col-sm-2" for="title">{{__('formIndex.title')}}
                    </label>
                    <div class="col-sm-4">
                        <input type="text"  class="form-control"  name="name" value="{{$student->name}}">
                        <input type="hidden"  class="form-control"  name="student_id" value="{{$student->id}}">

                    </div>
                   
                </div>
               
              
              
                {{-- course Category --}}
                <div class="form-group col-sm-12" >
                  
                    <label class="control-label col-sm-2" for="title">الكورس:
                    </label>
                  
                    <div class="col-sm-4">

                    <select class="form-control" name="course_id">
                              @foreach($student->courses as $studentCourse)
                               <option value="{{ $studentCourse->id}}"> {{$studentCourse->title}}  </option>
                              @endforeach
                        
                      </select>
                      </div> 

                </div>

                {{-- level  --}}
                <div class="form-group col-sm-12" >
                  
                    <label class="control-label col-sm-2" for="title">المستوي:
                    </label>
                   
                    <div class="col-sm-4">
                    <select class="form-control" name="level_id">
                              @foreach($student->levels as $studentlevel)
                               <option value="{{ $studentlevel->id}}"> {{$studentlevel->title}}-{{$studentlevel->course->title}}  </option>
                              @endforeach
                        
                      </select>  
                    </div>
                    
                </div>

                {{-- classe  --}}
                <div class="form-group col-sm-12" >
                  
                    <label class="control-label col-sm-2" for="title">الكلاس:
                    </label>
                  
                    <div class="col-sm-4">

                    <select class="form-control" name="classe_id">
                              @foreach($classes as $classe)
                               <option value="{{ $classe->id}}"> {{$classe->name}}  </option>
                              @endforeach
                        
                      </select>
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
</script>
@endsection
