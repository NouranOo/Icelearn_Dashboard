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
                               data-validation-error-msg="{{__('FormValidate.title')}}">
                    </div>
                </div>

                <div class="form-group">
                    {{-- Track --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.track')}}:</label>
                    <div class="col-sm-8">
                        @if (!empty($tracks->toArray()))
                        <select class="form-control" name="track_id">
                                @foreach($tracks as $track)
                                  <option value="{{ $track->id }}">{{ $track->title }}</option>
                                @endforeach
                            </select> @else
                        <select class="form-control" name="track_id" disabled>
                        </select>
                        <br>
                        <a href="{{url('/admin-panel/tracks/create')}}" type="button" class="btn btn-success"> <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;{{__('courses::course.create_track')}}</a>                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{-- Level --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.level')}}:</label>
                    <div class="col-sm-8">
                        @if (!empty($levels->toArray()))
                        <select class="form-control" name="level_id">
                                @foreach($levels as $level)
                                  <option value="{{ $level->id }}">{{ $level->title }}</option>
                                @endforeach
                            </select> @else
                        <select class="form-control" name="track_id" disabled>
                        </select>
                        <br>
                        <a href="{{url('/admin-panel/levels/create')}}" type="button" class="btn btn-success"> <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;{{__('courses::course.level_track')}}</a>                        @endif
                    </div>
                </div>
                {{-- ---------------------------------------------------------------- --}}
                <div class="form-group">
                    <label class="control-label col-sm-2">{{ __('courses::course.category')}} : </label>
                    <div class="col-sm-4">

                        <ul data-role="treeview-metro">
                            @foreach($categories as $cat)
                            <li>
                                <input type="checkbox" data-role="checkbox" value="{{ $cat->id  }}" name="category_id[]" data-caption="{{ $cat->title  }}"
                                    title=""> @if(count($cat->child)>0)
                                <ul>
                                    @foreach($cat->child as $child)
                                    <li>
                                        <input type="checkbox" data-role="checkbox" value="{{ $child->id  }}" name="car_categ[]" data-caption="{{ $child->title  }}"
                                            title="">
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- ---------------------------------------------------------------- --}}

                <div class="form-group">
                    {{-- Instructor --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.instructor')}}:</label>
                    <div class="col-sm-8">
                        <select class="select2 form-control" id="instructor_id" name="instructor_id[]" multiple>
                            @foreach($instructors as $instructor)
                            <option value="{{ $instructor->id }}"> <pre>&nbsp;&nbsp;&nbsp;</pre>{{ $instructor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{-- Type --}}
                    {{--<label class="control-label col-sm-2" for="title">{{trans('courses::course.type')}}:</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<select class="form-control" name="type">--}}
                            {{--<option value="general"> <pre>&nbsp;&nbsp;&nbsp;</pre>General</option>--}}
                            {{--<option value="conversation"> <pre>&nbsp;&nbsp;&nbsp;</pre>Conversation</option>--}}
                            {{--<option value="toefl"> <pre>&nbsp;&nbsp;&nbsp;</pre>Toefl</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    {{-- Number of classes --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.classnumbers')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('courses::course.classnumbers')}}" name="classes_number">
                    </div>
                </div>

                <div class="form-group">
                    {{-- book fees --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.bookfees')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('courses::course.bookfees')}}" name="book_fees">
                    </div>
                </div>

                <div class="form-group">
                    {{-- month fees --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.monthfees')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('courses::course.monthfees')}}" name="month_fees">
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
