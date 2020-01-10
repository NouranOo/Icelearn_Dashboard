@extends('commonmodule::layouts.master')
@section('title') {{trans('instructors::instructor.title')}}
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
  <h1>
    {{trans('instructors::instructor.title')}}
    <small>{{trans('instructors::instructor.smalltitle')}}</small>
  </h1>
</section>
@endsection

@section('content')

<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('instructors::instructor.newdata')}}</h3>
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
    <form class="form-horizontal" id="registration-form" action="{{url('instructors/instructors/' . $instructor->id)}}" method="post" enctype="multipart/form-data">
      {{ method_field('put') }}
      {{ csrf_field() }}

      <div class="box-body">



          <div class="form-group">
              {{-- Title --}}
              <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.name')}}</label>
              <div class="col-sm-8">
                  <input type="text" autocomplete="off" value="{{$instructor->name}}" class="form-control" placeholder="{{trans('instructors::instructor.newtitle')}}" name="name" required data-validation="alphanumeric"
                         data-validation-allowing='UTF-8' data-validation-length="3-50" data-validation-error-msg="{{__('FormValidate.title')}}">
              </div>
          </div>


          <div class="form-group">
              {{-- Description --}}
              <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.desc')}} </label>
              <div class="col-sm-8">
                  <textarea class="textarea" name="description" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $instructor->description !!}</textarea>
              </div>
          </div>

          <div class="form-group">
              {{-- Description --}}
              <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.edu')}} </label>
              <div class="col-sm-8">
                  <textarea class="textarea" name="education" required  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $instructor->education !!}</textarea>
              </div>
          </div>

          <div class="form-group">
              {{-- Description --}}
              <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.exp')}} </label>
              <div class="col-sm-8">
                  <textarea class="textarea" name="experience" required placeholder="{{trans('instructors::instructor.exp')}}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $instructor->experience !!}</textarea>
              </div>
          </div>

          <div class="form-group">
              {{-- Description --}}
              <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.others')}} </label>
              <div class="col-sm-8">
                  <textarea class="textarea" name="others" required placeholder="{{trans('instructors::instructor.others')}}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $instructor->others !!}</textarea>
              </div>
          </div>


        <div class="form-group">
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.phone')}}:</label>
          <div class="col-sm-8">
            <input type="text" autocomplete="off" required data-validation="number" class="form-control" placeholder="{{trans('instructors::instructor.phone')}}" name="phone" value="{{$instructor->phone}}">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.email')}}:</label>
          <div class="col-sm-8">
            <input type="text" autocomplete="off" required data-validation="email" class="form-control" placeholder="{{trans('instructors::instructor.email')}}" name="email" value="{{$instructor->email}}" data-validation="email">
          </div>
        </div>

        <div class="form-group">
          {{-- Upload photo --}}
          <label class="control-label col-sm-2" for="img">{{trans('instructors::instructor.cv')}}</label>
          <div class="col-sm-8">
            <input type="file" autocomplete="off" class="" name="cv">
            @if($instructor->cv)
                <a title="Edit" href="{{asset('public/files/cv/' . $instructor->cv)}}" style="padding: 10 0px;margin-top:5px" type="button" target="_blank" class="btn btn-primary"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i> &nbsp; Download CV</a>
            @else
                <br>
                <pre><strong>No CV Uploaded</strong></pre>
            @endif
          </div>
        </div>

        <div class="form-group">
          {{-- Upload photo --}}
          <label class="control-label col-sm-2" for="img">{{trans('instructors::instructor.pic')}}</label>
          <div class="col-sm-8">
            <input type="file" autocomplete="off" class="" name="photo">
            @if ($instructor->photo)
            <img src="{{asset('public/images/instructor/' . $instructor->photo)}}" style="margin-top: 5px;" height="70" width="100">
            @else
                <br>
                <strong>"No Photo Uploaded"</strong>
            @endif
          </div>
        </div>


      </div>
      <div class="box-footer">
        <a href="{{url('/instructors/instructors')}}" type="button" class="btn btn-default">{{trans('instructors::instructor.cancel')}}&nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
        <button type="submit" class="btn btn-primary pull-right">{{trans('instructors::instructor.save')}}&nbsp; <i class="fa fa-save"></i></button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</section>
@endsection

@section('javascript')
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

<!-- jQuery form validator -->
<script src="{{asset('assets/plugins/jquery_form_validator/jquery.form-validator.min.js')}}"></script>
<script>
    $.validate({
        form : '#registration-form',
    onError : function($form) {
        alert('Error, Make sure of your Data, Validation failed!');
        return false;
    },
    // onSuccess : function($form) {
    //     alert('The form'+' is valid!');
    //     return false; // Will stop the submission of the form
    // },
    // onValidate : function($form) {
    //     return {
    //         element : $('#some-input'),
    //         message : 'This input has an invalid value for some reason'
    //     }
    // },
    // onElementValidate : function(valid, $el, $form, errorMess) {
    //     console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
    // }
    });
</script>

@endsection
