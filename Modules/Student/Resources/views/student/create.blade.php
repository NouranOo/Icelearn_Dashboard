@extends('commonmodule::layouts.master')
@section('title') {{trans('student::student.pageTitle')}}
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        {{trans('student::student.pageTitle')}}
    </h1>
</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('student::student.newdata')}}</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- /.box-header -->
        <form class="form-horizontal" id="createform" action="{{url('admin-panel/student/')}}" id="registration-form"
            method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="box-body">

                {{-- Name --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.name')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="اسم الطالب" name="name"
                            value="{{old('name')}}">
                    </div>
                </div>
                {{-- Gender --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.gender')}}:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="gender" value="{{old('gender')}}">
                            <option value="male">ذكر</option>
                            <option value="female">
                                <pre>أنثى</pre>
                            </option>
                        </select>
                    </div>
                </div>
                {{-- NID --}}
                <div class="form-group" id="lol2">
                    <label class="control-label col-sm-2" for="title">الرقم القومى:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" data-validation="number" class="form-control"
                            placeholder="{{trans('student::student.NID')}}" name="NID" id="nid" value="{{old('NID')}}"
                            onkeyup="myFunction()">
                    </div>
                </div>
                {{-- Birth --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.birth_date')}}:</label>
                    <div class="col-sm-8">
                        <input type="date" autocomplete="off" class="form-control" value="{{old('birthDate')}}"
                            placeholder="{{trans('student::student.birth_date')}}" name="birthDate">
                    </div>
                </div>

                {{-- current age  --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">السن فى الوقت الحالى:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="السن" name="age"
                            value="{{old('age')}}">
                    </div>
                </div>
                {{-- Phone --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">رقم المحمول(طالب):</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" data-validation="number" class="form-control"
                            placeholder="{{trans('student::student.phone')}}" name="phone" value="{{old('phone')}}">
                    </div>
                </div>
                {{-- current job --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">الوظيفة الحالية:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="الوظيفه الحاليه"
                            name="currentJob" value="{{old('currentJob')}}">
                    </div>
                </div>

                {{-- mail --}}
                <div class="form-group">

                    <label class="control-label col-sm-2" for="title">البريد الإلكترونى:</label>
                    <div class="col-sm-8">
                        <input type="mail" autocomplete="off" class="form-control" name="mail" value="{{old('mail')}}"
                            placeholder="البريد الإلكترونى">
                    </div>
                </div>

                {{-- Address--}}
                <div class="form-group">

                    <label class="control-label col-sm-2" for="title">محل الإقامة</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" name="address"
                            value="{{old('address')}}" placeholder="محل الإقامة">
                    </div>
                </div>
                {{-- telephone fix--}}
                <div class="form-group">

                    <label class="control-label col-sm-2" for="title">رقم الهاتف الإرضى:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" name="telephoneFix"
                            value="{{old('telephoneFix')}}" placeholder="الهاتف الارضى">
                    </div>
                </div>
                {{-- Barcode--}}
                <div class="form-group">

                    <label class="control-label col-sm-2" for="title">الرمز الشريطي:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" name="barCode"
                            value="{{old('barCode')}}" placeholder="barcode" id="barcode">
                    </div>
                </div>
                {{-- Upload photo --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="img">صورة الطالب:</label>
                    <div class="col-sm-8">
                        <input type="file" autocomplete="off" name="photo" value="{{old('photo')}}">
                    </div>
                </div>
                <!-- {{-- Type --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.type')}}:</label>
                    <div class="col-sm-8">
                        <select class="form-control type" name="type" id="type">
              <option value="kid"><pre>{{trans('student::student.kid')}}</pre></option>
                            <option value="adult"><pre>{{trans('student::student.adult')}}</pre></option>
            </select>
                    </div>
                </div>

                -->



                <hr>



                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">الكورسات المقدمة</h3>
                    </div>
                    <br>
                    {{-- Course Name --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">اسم الكورس:</label>
                        <div class="col-sm-8">
                            <select   name="course"class="form-control">
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                                
                            </select>
                   
                    </div>
                    <hr>
                    <div class="box-body">
                        <div class="box-header with-border">
                            <h3 class="box-title">نتائج اختبار تحديد المستوى (المقابلة الشخصية)</h3>
                        </div>
                        <br>
                        {{-- Levels Result--}}
                        <div class="result">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">المستوى المقترح:</label>
                                <div class="col-sm-8">
                                <select name="suggestedLevel" class="form-control">
                                @foreach($courses as $course)
                                    @foreach( $levels as $level )
                                        <option  value="{{$level->id}}">{{$course->title}}-{{$level->title}}</option>
                                    @endforeach
                                @endforeach
                                    
                                </select>
                               
                            </div>
                                <!-- <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control"
                                        placeholder="المستوى المقترح" name="suggestedLevel"
                                        value="{{old('suggestedLevel')}}">
                                </div> -->
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> المدرب:</label>
                                <div class="col-sm-8">
                                    <input  type="text" autocomplete="off" class="form-control" placeholder="المدرب"
                                        name="suggestedCoach" required>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> أيام:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="أيام"
                                        name="suggestedDay" value="{{old('suggestedDay')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> من ساعة:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="من ساعة"
                                        name="suggestedFromHour" value="{{old('suggestedFromHour')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> إلى ساعة:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="إلى ساعة"
                                        name="suggestedToHour" value="{{old('suggestedToHour')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> التاريخ:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="التاريخ"
                                        name="suggestedDate" value="{{old('suggestedDate')}}">
                                </div>
                            </div>

                            <hr>
                             
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">المستوى النهائي:</label>
                                <div class="col-sm-8">
                                <select name="finallyLevel" class="form-control">
                                    @foreach($courses as $course)
                                        @foreach( $levels as $level )
                                            <option value="{{$level->id}}">{{$course->title}}-{{$level->title}}</option>
                                        @endforeach
                                    @endforeach
                                    
                                </select>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> المدرب:</label>
                                <div class="col-sm-8">
                                    <input  type="text" autocomplete="off" class="form-control" placeholder="المدرب"
                                        name="finallyCoach" >
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> أيام:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="أيام"
                                        name="finallyDay" value="{{old('finallyDay')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> من ساعة:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="من ساعة"
                                        name="finallyFromHour" value="{{old('finallyFromHour')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> إلى ساعة:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="إلى ساعة"
                                        name="finallyToHour" value="{{old('finallyToHour')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> التاريخ:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="التاريخ"
                                        name="finallyDate" value="{{old('finallyDate')}}">
                                </div>
                            </div>
                        </div>
                        <!-- {{-- school Address--}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.schoolAdd')}}:</label>
                    <div class="col-sm-8">
                        <input  type="text" autocomplete="off" class="form-control" placeholder="{{trans('student::student.schoolAdd')}}"
                                name="schoolAdd" required>
                    </div>
                </div> -->

                        <!-- {{-- School Type --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.schoolType')}}:</label>
                    <div class="col-sm-8">
                        <select class="form-control type" name="schoolType">
                            <option value="public"><pre>{{trans('student::student.public')}}</pre></option>
                            <option value="private">{{trans('student::student.private')}}</option>
                        </select>
                    </div>
                </div> -->

                        <!-- {{-- Grade --}}
                <div class="form-group" >
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.grade')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" data-validation="number" class="form-control" placeholder="{{trans('student::student.grade')}}"
                               name="grade" required>
                    </div>
                </div> -->


                    </div>
                </div>
                <!-- <hr> -->
                <!-- <div class="box-body" id="lol">


                {{-- Guardian Name --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.guardianName')}}:</label>
                    <div class="col-sm-8">
                        <input id="parentName" type="text" autocomplete="off" class="form-control" name="guardianName"  placeholder="{{trans('student::student.guardianName')}}">
                    </div>
                </div>

                {{-- Guardian Address --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::parent.address')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control"  name="guardianAddress"  placeholder="{{trans('student::parent.address')}}">
                    </div>
                </div>

                {{-- Guardian Degree --}}
                <div class="form-group">

                    <label class="control-label col-sm-2" for="title">{{trans('student::parent.degree')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" name="degree"  placeholder="{{trans('student::parent.degree')}}">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::parent.phone')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" data-validation="number" class="form-control" placeholder="{{trans('student::parent.phone')}}" name="guardianPhone" >
                    </div>
                </div>



            </div> -->
                <!-- <hr> -->
                <!-- <div class="form-group">
                <label class="control-label col-sm-2" for="title">{{trans('student::parent.downPayment')}}:</label>
                <div class="col-sm-8">
                    <input type="text" autocomplete="off" data-validation="number" class="form-control" placeholder="{{trans('student::parent.downPayment')}}" name="downPayment" required>
                </div>
            </div> -->
                <!-- <hr> -->
                <!-- <div class="form-group">
                {{-- course --}}
                <label class="control-label col-sm-2" for="title">{{trans('student::student.courseGroup')}}:</label>
                <div class="col-sm-8">
                    <select class="select2 form-control" id="group_id" name="group_id" >
                      

                            <option value=""> <pre> </pre>  </option>
                     
                    </select>
                </div>
            </div> -->

                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{url('/admin-panel/student')}}" type="button"
                        class="btn btn-default">{{trans('student::student.cancel')}} &nbsp; <i class="fa fa-remove"
                            aria-hidden="true"></i> </a>
                    <button type="submit" class="btn btn-primary pull-right">{{trans('student::student.save')}} &nbsp;
                        <i class="fa fa-save"></i></button>
                </div>
                <!-- /.box-footer -->
        </form>
    </div>
</section>
@endsection




@section('javascript')

<script>
$(".type").change(function() {

    $(".type option:selected").each(function() {
        var state = $(this).val();

        if (state == 'kids') {
            $(".parent").prop('disabled', false);
        } else {
            $(".parent").prop('disabled', true);

        }
    });

});
</script>


<script>
$(document).ready(function() {
    $('#type').on('change', function() {
        if (this.value == 'adult') {
            $("#lol").hide();
        } else {
            $("#lol").show();
            $("#lol2").hide();

        }
    });
});
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
function myFunction() {
    var x = document.getElementById("nid");
    var y = document.getElementById("barcode");
    y.value = x.value;
}
</script>
<!-- 
<script>
$(document).ready(function() {
    var wrapper = $(".result");
    $('.courses').on('click', function(event) {
        
      
        var checkbox_value =[];
       
        $(":checkbox").each(function () {
            var ischecked = $(this).is(":checked");
            if (ischecked) {
                checkbox_value.push($(this).val()) ;
               
            }
        }); 
         $.ajax({
            url: "{{url('admin-panel/getlevelsofcourse')}}",
            method: "post",
            data: {
                'courses': checkbox_value,
                '_token':"{{ csrf_token() }}"
            },
            
            beforeSend: function() {
                

            },
            success: function(data) {
                console.log(data);
                 $(wrapper).append(' <div class="form-group">'+
                               ' <label class="control-label col-sm-2" for="title">المستوى المقترح:</label>'+
                                '<div class="col-sm-8">'+
                                    '<input type="text" autocomplete="off" class="form-control"'+
                                       ' placeholder="المستوى المقترح" name="suggestedLevel" ></div>');
                // $('#datatable').prepend("<tr><td></td><td> "+ data.name+"</td></tr>")


            }
        })
        
    });

});
</script> -->

@endsection

