@extends('commonmodule::layouts.master')
@section('title') اضافه مصروف
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
        اضافه مصروف
    </h1>
</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">بيانات المصروف الجديده</h3>
        </div>
        @if(count($errors) > 0) @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
        @endforeach @endif
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{route('outgoing.store')}}" method="POST">
            {{ csrf_field() }}


            <div class="box-body">

                <div class="form-group">
                    {{-- Date --}}
                    <label class="control-label col-sm-2" for="title">التاريخ </label>
                    <div class="col-sm-8">
                        <input type="date" autocomplete="off" class="form-control"  name="date"
                               required data-validation="alphanumeric" data-validation-allowing='UTF-8' data-validation-length="3-50"
                               data-validation-error-msg="{{__('FormValidate.title')}}" required>
                    </div>
                </div>


                <div class="form-group">
                    {{-- day --}}
                    <label class="control-label col-sm-2" for="title">اليوم:</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="instructor_id" name="day" required>
                        
                            <option value="السبت"> السبت</option>
                            <option value="الاحد"> الاحد</option>
                            <option value="الاتنين"> الاتنين</option>
                            <option value="الثلاثاء"> الثلاثاء</option>
                            <option value="الاربعاء"> الاربعاء</option>
                            <option value="الخميس"> الخميس</option>
                            <option value="الجمعه"> الجمعه</option>

                         
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    {{-- money --}}
                    <label class="control-label col-sm-2" for="title">المبلغ :</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" step="any" autocomplete="off" class="form-control"  name="money" required>
                    </div>
                </div>

              

                <div class="form-group">
                    {{-- reason  --}}
                    <label class="control-label col-sm-2" for="title">السبب:</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="السبب" name="reason" required>
                    </div>
                </div>

               

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('/admin-panel/outgoing')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
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
