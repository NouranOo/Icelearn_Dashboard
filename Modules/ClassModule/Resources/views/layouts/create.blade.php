@extends('commonmodule::layouts.master')
@section('title')
انشاء كلاس جديد
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin/bower_components/select2/dist/css/select2.min.css')}}"> {{-- Metro CSS --}}
<link rel="stylesheet" href="{{asset('assets/admin/treeview.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       انشاء كلاس جديد
    </h1>
</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">بيانات الكلاس الجديد</h3>
        </div>
        @if(count($errors) > 0) @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
        @endforeach @endif
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{route('storeclass')}}" method="POST">
            {{ csrf_field() }}


            <div class="box-body">

                <div class="form-group">
                    {{-- name --}}
                    <label class="control-label col-sm-2" for="title">{{__('formIndex.title')}} </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="اكتب اسم للكلاس" name="name"
                               required data-validation="alphanumeric" data-validation-allowing='UTF-8' data-validation-length="3-50"
                               data-validation-error-msg="{{__('FormValidate.title')}}">
                    </div>
                </div>

                <div class="form-group">
                    {{-- courses --}}
                    <label class="control-label col-sm-2" for="title">الكورس:</label>
                    <div class="col-sm-8">
                        <select class="select2 form-control" name="course_id" required>
                            @foreach($courses as $course)
                            <option value="{{ $course->id }}"> {{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    {{-- levels --}}
                    <label class="control-label col-sm-2" for="title">المستوي:</label>
                    <div class="col-sm-8">
                        <select class="select2 form-control"  name="level_id" required>
                            @foreach($levels as $level)
                            <option value="{{ $level->id }}"> {{ $level->title }}-{{$level->course->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    {{-- instructore --}}
                    <label class="control-label col-sm-2" for="title">المحاضر:</label>
                    <div class="col-sm-8">
                        <select class="select2 form-control" id="instructor_id" name="instructor_id" required>
                            @foreach($instructores as $instructore)
                            <option value="{{ $instructore->id }}"> {{ $instructore->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

           

                <div class="form-group">
                    {{-- date  --}}
                    <label class="control-label col-sm-2" for="title">التاريخ:</label>
                    <div class="col-sm-8">
                        <input type="date" autocomplete="off" class="form-control" placeholder="" name="date" required>
                    </div>
                </div>

                <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> أيام:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="أيام"
                                        name="day" value="{{old('day')}}" required>
                                </div>
                            </div>

                         
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> من ساعة:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="من ساعة"
                                        name="from" value="{{old('fromhour')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> إلى ساعة:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="إلى ساعة"
                                        name="to" value="{{old('tohour')}}" required>
                                </div>
                            </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('/admin-panel/classes')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
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

{{-- Treeview --}}
<script src="{{asset('assets/admin/metro.js')}}"></script>

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

<script src="{{ asset('assets/admin/bower_components/select2/dist/js/select2.min.js')}}"></script>

<script>
    $('.select2').select2()

</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });

</script>
@endsection
