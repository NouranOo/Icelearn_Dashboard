@extends('commonmodule::layouts.master')
@section('title')
    إضافة كورس جديد
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection



@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">إضافة كورس جديد</h3>
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
        <form class="form-horizontal" id="createform" action="{{url('admin-panel/student/addcourse')}}" id="registration-form"
            method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <input type="hidden" value="{{$student->id}}" name="student_id">

                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">الكورسات المقدمة</h3>
                    </div>
                    <br>
                    {{-- Course Name --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">اسم الكورس:</label>
                        <div class="col-sm-8">
                            <select   name="course_id"class="form-control">
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach

                            </select>
                        </div>

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
                                    @foreach( $course->levels as $level )
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
                            <!-- <div class="form-group">
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
                            </div> -->

                            <hr>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">المستوى النهائي:</label>
                                <div class="col-sm-8">
                                <select name="finallyLevel" class="form-control">
                                    @foreach($courses as $course)
                                        @foreach(  $course->levels as $level )
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
                            <!-- <div class="form-group">
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
                        </div> -->


                    </div>
                </div>

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

