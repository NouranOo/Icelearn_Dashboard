@extends('commonmodule::layouts.master')
@section('title')
    {{trans('courses::group.res.pageTitle')}}
@endsection

@section('css')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::group.res.pageTitle')}}
        </h1>
    </section>
@endsection

@section('content')

    <section class="content">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('courses::group.res.newdata')}}</h3>
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
            <form class="form-horizontal" id="createform" action="{{url('admin-panel/reservation/')}}" id="registration-form" method="POST"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="box-body">

                    {{-- Name --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">{{trans('courses::group.student')}}:</label>
                        <div class="col-sm-8">

                            {{--@dd($students)--}}
                            <select class="select2 form-control" id="student_id" name="student_id" >
                                    @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                                </select>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">{{trans('courses::group.group')}}:</label>
                        <div class="col-sm-8">
                            <select class="select2 form-control" id="group_id" name="group_id">
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->id}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                   

                </div>


                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{url('/admin-panel/student')}}" type="button" class="btn btn-default">{{trans('student::student.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                    <button type="submit" class="btn btn-primary pull-right">{{trans('student::student.save')}} &nbsp; <i class="fa fa-save"></i></button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </section>
@endsection

@section('javascript') {{-- jQuery Count letters --}}


<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

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



<!-- jQuery form validator -->
<script src="{{asset('assets/admin/plugins/jquery_form_validator/jquery.form-validator.min.js')}}"></script>
<script>
    $.validate({
        form : '#createform',
        onError : function($form) {
            alert('Error, Make sure of your Data, Validation failed!');
            return false;
        },
    });

</script>
@endsection
