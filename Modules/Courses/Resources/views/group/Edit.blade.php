@extends('commonmodule::layouts.master')
@section('title') {{trans('courses::group.title')}}
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
        {{trans('courses::group.title')}}
        <small>{{trans('courses::group.smalltitle')}}</small>
    </h1>
</section>
@endsection

@section('content')


<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('courses::group.edit')}}</h3>
        </div>
        @if(count($errors) > 0) @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
        @endforeach @endif
        <!-- /.box-header -->


        <form class="form-horizontal" action="{{url('admin-panel/groups/' . $group->id)}}" method="post">
            {{ method_field('put') }} {{ csrf_field() }}
            <div class="box-body">


                <div class="form-group">
                    {{-- sessionsPerWeek --}}
                    <label class="control-label col-sm-2" for="title">{{__('courses::group.title')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$group->title}}" autocomplete="off" class="form-control" placeholder="{{trans('courses::group.title')}}" name="title" required >
                    </div>
                </div>



                <div class="form-group">
                    {{-- course --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::group.course')}}:</label>
                    <div class="col-sm-8">
                        <select class="select2 form-control" id="course_id" name="course_id" >
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}"

                                        @if($group->course->id == $course->id  )
                                        selected
                                        @endif

                                > <pre> </pre>{{ $course->title }} ||| Num of Session = {{$course->classes_number}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    {{-- sessionsPerWeek --}}
                    <label class="control-label col-sm-2" for="title">{{__('courses::group.sessions')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$group->allSessions}}" autocomplete="off" class="form-control" placeholder="{{trans('courses::group.sessions')}}" name="allSessions" required >
                    </div>
                </div>

                <div class="form-group">
                    {{-- sessionsPerWeek --}}
                    <label class="control-label col-sm-2" for="title">{{__('courses::group.sessionsPerWeek')}}:</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$group->sessionsPerWeek}}" autocomplete="off" class="form-control" placeholder="{{trans('courses::group.sessionsPerWeek')}}" name="sessionsPerWeek" required >
                    </div>
                </div>

                <div class="form-group">
                    {{-- day --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::group.days')}}:</label>
                    <div class="col-sm-8">


                        <select class="select2 form-control" id="day_id" name="day_id[]" multiple>

                            <?php $groupDay_id=$group->days->pluck('day_id')->toArray();?>


                            <option value="Sat" {{(in_array('Sat',$groupDay_id)?'selected':'')}}>Sat</option>
                            <option value="Sun" {{(in_array('Sun',$groupDay_id)?'selected':'')}}>Sun</option>
                            <option value="Mon" {{(in_array('Mon',$groupDay_id)?'selected':'')}}>Mon</option>
                            <option value="Tue" {{(in_array('Tue',$groupDay_id)?'selected':'')}}>Tue</option>
                            <option value="Wed" {{(in_array('Wed',$groupDay_id)?'selected':'')}}>Wed</option>
                            <option value="Thu" {{(in_array('Thu',$groupDay_id)?'selected':'')}}>Thu</option>
                            <option value="Fri" {{(in_array('Fri',$groupDay_id)?'selected':'')}}>Fri</option>

Fri
                        </select>


                    </div>
                </div>


                <div class="form-group">
                    {{-- start date --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::course.start_date')}}:</label>
                    <div class="col-sm-8">
                        <input class="form-control" value="{{$group->groupStartDate}}" name="groupStartDate" type="date" placeholder="{{trans('courses::course.start_date')}}"
                        />
                    </div>
                </div>















            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('/admin-panel/groups')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                <button type="submit" class="btn btn-primary pull-right">{{__('formIndex.submit')}} &nbsp; <i class="fa fa-save"></i></button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</section>
@endsection

@section('javascript') {{-- Treeview --}}
<script src="{{asset('assets/admin/metro.js')}}"></script>



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
