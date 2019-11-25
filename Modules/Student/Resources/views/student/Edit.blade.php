@extends('commonmodule::layouts.master')
@section('title') {{trans('student::student.title')}}
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        {{trans('student::student.title')}}
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
        <form class="form-horizontal" id="createform" action="{{url('admin-panel/student/' . $student->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('put') }} {{ csrf_field() }}

            <div class="box-body">

                {{-- Name --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.name')}}:</label>
                    <div class="col-sm-8">
                        <input value="{{$student->name}}"  type="text" autocomplete="off" class="form-control" placeholder="{{trans('student::student.newtitle')}}"
                                name="name" required>
                    </div>
                </div>

                {{-- Gender --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.gender')}}:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="gender">
                            <option value="male" @if($student->gender ==  'male' ) selected="selected"  @endif >ذكر</option>
                            <option value="female" @if($student->gender ==  'female' ) selected="selected"  @endif ><pre>أنثى</pre></option>
                            
                               
                
                            
                        </select>
                    </div>
                </div>

                {{-- NID --}}
                <div class="form-group" >
                    <label class="control-label col-sm-2" for="title">الرقم القومى :</label>
                    <div class="col-sm-8">
                        <input value="{{$student->NID}}" type="text" autocomplete="off" data-validation="number" class="form-control" placeholder="{{trans('student::student.NID')}}"
                               name="NID" required>
                    </div>
                </div>

                {{-- birthDate --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.birth_date')}}:</label>
                    <div class="col-sm-8">
                        <input value="{{$student->birthDate}}" type="date" autocomplete="off" class="form-control" placeholder="{{trans('student::student.birth_date')}}" name="birthDate"
                               required>
                    </div>
                </div>

                {{-- age --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.age')}}:</label>
                    <div class="col-sm-8">
                    <input value="{{$student->age}}" type="number" autocomplete="off" class="form-control" placeholder="{{trans('student::student.age')}}" name="age"
                               required>
                    </div>
                </div>


                {{-- phone --}}
                <div class="form-group" >
                    <label class="control-label col-sm-2" for="title">{{trans('student::student.phone')}}:</label>
                    <div class="col-sm-8">
                        <input value="{{$student->phone}}" type="text" autocomplete="off" data-validation="number" class="form-control" placeholder="{{trans('student::student.phone')}}"
                               name="phone" required>
                    </div>
                </div>

                {{-- currentJob --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">الوظيفه الحالية:</label>
                    <div class="col-sm-8">
                        <input value="{{$student->currentJob}}"  type="text" autocomplete="off" class="form-control" placeholder="{{trans('student::student.currentJob')}}"
                                name="currentJob" required>
                    </div>
                </div>
                {{-- mail --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">البريد الالكترونى:</label>
                    <div class="col-sm-8">
                        <input value="{{$student->mail}}"  type="text" autocomplete="off" class="form-control" placeholder="{{trans('student::student.mail')}}"
                                name="mail" required>
                    </div>
                </div>
                {{-- address --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">العنوان:</label>
                    <div class="col-sm-8">
                        <input value="{{$student->address}}"  type="text" autocomplete="off" class="form-control" placeholder="{{trans('student::student.address')}}"
                                name="address" required>
                    </div>
                </div>
                {{-- telephoneFix --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">التليفون الارضى:</label>
                    <div class="col-sm-8">
                        <input value="{{$student->telephoneFix}}"  type="text" autocomplete="off" class="form-control" placeholder="{{trans('student::student.telephoneFix')}}"
                                name="telephoneFix" required>
                    </div>
                </div>
                {{-- barCode --}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">الرمز الشريطي:</label>
                    <div class="col-sm-8">
                        <input value="{{$student->barCode}}"  type="text" autocomplete="off" class="form-control" placeholder="{{trans('student::student.barCode')}}"
                                name="barCode" required>
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
