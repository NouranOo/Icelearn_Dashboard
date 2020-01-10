@extends('commonmodule::layouts.master')

@section('title')
  {{trans('instructors::instructor.pageTitle')}}
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
  <h1>
    {{trans('instructors::instructor.pageTitle')}}
    <small>{{trans('instructors::instructor.smalladd')}}</small>
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
    <form class="form-horizontal" action="{{url('instructors/instructors/')}}" id="registration-form" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="box-body">


        <div class="form-group">
          {{-- Title --}}
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.name')}}</label>
          <div class="col-sm-8">
            <input  type="text" autocomplete="off" class="form-control" placeholder="{{trans('instructors::instructor.newtitle')}}" name="name" required>
          </div>
        </div>

        <div class="form-group">
          {{-- Description --}}
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.desc')}} </label>
          <div class="col-sm-8">
           
          <input  type="text" autocomplete="off" class="form-control" name="description" required> 
          </div>
        </div>

        <div class="form-group">
          {{-- Education --}}
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.edu')}} </label>
          <div class="col-sm-8">
           <input  type="text" autocomplete="off" class="form-control" name="education" required> 
           
          </div>
        </div>

        <div class="form-group">
          {{-- Experience --}}
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.exp')}} </label>
          <div class="col-sm-8">
           <input  type="text" autocomplete="off" class="form-control" name="experience" required> 
           
          </div>
        </div>

        <div class="form-group">
          {{-- Other informations --}}
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.others')}} </label>
          <div class="col-sm-8">
            <input  type="text" autocomplete="off" class="form-control" name="others" required> 
            
          </div>
        </div>



        <div class="form-group">
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.phone')}}:</label>
          <div class="col-sm-8">
            <input type="text" autocomplete="off" data-validation="number" class="form-control" placeholder="{{trans('instructors::instructor.phone')}}" name="phone" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="title">{{trans('instructors::instructor.email')}}:</label>
          <div class="col-sm-8">
            <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('instructors::instructor.email')}}" name="email" data-validation="email" required>
          </div>
        </div>

        <div class="form-group">
          {{-- Upload CV --}}
          <label class="control-label col-sm-2" for="img">{{trans('instructors::instructor.cv')}}</label>
          <div class="col-sm-8">
            <input type="file" autocomplete="off" class="" name="cv">
          </div>
        </div>

        <div class="form-group">
          {{-- Upload photo --}}
          <label class="control-label col-sm-2" for="img">{{trans('instructors::instructor.pic')}}</label>
          <div class="col-sm-8">
            <input type="file" autocomplete="off" name="photo">
          </div>
        </div>


      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{url('/categories')}}" type="button" class="btn btn-default">{{trans('instructors::instructor.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
        <button type="submit" id="submit" class="btn btn-primary pull-right">{{trans('instructors::instructor.save')}} &nbsp; <i class="fa fa-save"></i></button>
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

<!-- jQuery form validator -->
<script src="{{asset('assets/admin/plugins/jquery_form_validator/jquery.form-validator.min.js')}}"></script>
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
