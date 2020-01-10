@extends('commonmodule::layouts.master')
@section('title') {{trans('courses::course.pageTitle')}}
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
        {{trans('courses::course.pageTitle')}}
    </h1>
</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('courses::course.newdata')}}</h3>
        </div>
        @if(count($errors) > 0) @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
        @endforeach @endif
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{url('admin-panel/courses')}}" method="POST">
            {{ csrf_field() }}


            <div class="box-body">

                <div class="form-group">
                    {{-- Title --}}
                    <label class="control-label col-sm-2" for="title">{{__('formIndex.title')}} </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('courses::course.newtitle')}}" name="title"
                               required data-validation="alphanumeric" data-validation-allowing='UTF-8' data-validation-length="3-50"
                               data-validation-error-msg="{{__('FormValidate.title')}}" required>
                    </div>
                </div>
  

               

                <div class="form-group">
                    {{-- Instructor --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.instructor')}}:</label>
                    <div class="col-sm-8">
                        <select class="select2 form-control" id="instructor_id" name="instructor_id[]" required multiple>
                            @foreach($instructors as $instructor)
                            <option value="{{ $instructor->id }}"> <pre>&nbsp;&nbsp;&nbsp;</pre>{{ $instructor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    {{-- Number of levels --}}
                    <label class="control-label col-sm-2" for="title">عدد المستويات:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="عدد المستويات" name="levels_number" required>
                    </div>
                </div>


                <div class="form-group">
                    {{-- book fees --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.bookfees')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('courses::course.bookfees')}}" name="book_fees" required>
                    </div>
                </div>

                <div class="form-group">
                    {{-- month fees --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.monthfees')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('courses::course.monthfees')}}" name="month_fees" required>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('/admin-panel/courses')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
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
