@extends('commonmodule::layouts.master')

@section('title')
  {{trans('student::parent.pageTitle')}}
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      {{ trans('student::parent.pageTitle')}}
    </h1>

  </section>
@endsection

@section('content')

<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('student::parent.newdata')}}</h3>
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
    <form class="form-horizontal" id="createform" action="{{url('admin-panel/parent/')}}" id="registration-form" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="box-body">



        <div class="form-group">
          {{-- Guardian Name --}}
          <label class="control-label col-sm-2" for="title">{{trans('student::parent.name')}}</label>
          <div class="col-sm-8">
            <input id="name" type="text" autocomplete="off" class="form-control" name="name" required>
          </div>
        </div>

        <div class="form-group">
          {{-- Guardian Address --}}
          <label class="control-label col-sm-2" for="title">{{trans('student::parent.address')}}</label>
          <div class="col-sm-8">
            <input type="text" autocomplete="off" class="form-control"  name="address" required>
          </div>
        </div>
        <div class="form-group">
          {{-- Guardian Degree --}}
          <label class="control-label col-sm-2" for="title">{{trans('student::parent.degree')}}</label>
          <div class="col-sm-8">
            <input type="text" autocomplete="off" class="form-control" name="degree" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="title">{{trans('student::parent.phone')}}:</label>
          <div class="col-sm-8">
            <input type="text" autocomplete="off" data-validation="number" class="form-control" placeholder="{{trans('student::parent.phone')}}" name="phone" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="title">{{trans('student::parent.phone2')}}:</label>
          <div class="col-sm-8">
            <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('student::parent.phone2')}}" name="phone2">
          </div>
        </div>



      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{url('/admin-panel/parent')}}" type="button" class="btn btn-default">{{trans('student::student.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i></a>
        <button type="submit" class="btn btn-primary pull-right">{{trans('student::student.save')}}&nbsp; <i class="fa fa-save"></i></button>
      </div>
      <!-- /.box-footer -->
    </form>
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
<script>
  $( ".type" ).change(function() {

    $( ".type option:selected" ).each(function() {
      var state = $( this ).val();

      if(state == 'kids'){
        $( ".parent" ).prop('disabled',false);
      }else{
        $( ".parent" ).prop('disabled',true);

      }
    });

  });
</script>

<!-- jQuery form validator -->
<script src="{{asset('assets/admin/plugins/jquery_form_validator/jquery.form-validator.min.js')}}"></script>
<script>
    $.validate({
        form : '#createform',
    onError : function($form) {
        alert('Error, Make sure of your Data, Validation failed!');
        return false;
    }
  });
</script>

@endsection
