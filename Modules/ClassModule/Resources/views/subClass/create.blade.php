@extends('commonmodule::layouts.master')
@section('title')
انشاء حصه جديد
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
       انشاء حصه جديد
    </h1>
</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">بيانات الحصه الجديد</h3>
        </div>
        @if(count($errors) > 0) @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
        @endforeach @endif
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{route('storesubclass')}}" method="POST">
            {{ csrf_field() }}


            <div class="box-body">

                <div class="form-group">
                    {{-- number --}}
                    <label class="control-label col-sm-2" for="title">رقم الحصه </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="اكتب رقم للحصه" name="number"
                               required data-validation="alphanumeric" data-validation-allowing='UTF-8' data-validation-length="3-50"
                               data-validation-error-msg="{{__('FormValidate.title')}}">
                    </div>
                </div>

                <div class="form-group">
                    {{-- day --}}
                    <label class="control-label col-sm-2" for="title">اليوم:</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="day" name="day" required>
                           
                            <option value="السبت">السبت</option>
                            <option value="الاحد">الاحد</option>
                            <option value="الاتنين">الاتنين</option>
                            <option value="الثلاثاء">الثلاثاء</option>
                            <option value="الاربعاء">الاربعاء</option>
                            <option value="الخميس">الخميس</option>
                            <option value="الجمعه">الجمعه</option>


                           
                        </select>
                    </div>
                </div>
                <input type="hidden" autocomplete="off" class="form-control" placeholder="" name="classe_id" value="{{$classe->id}}" required>
           

                <div class="form-group">
                    {{-- date  --}}
                    <label class="control-label col-sm-2" for="title">التاريخ:</label>
                    <div class="col-sm-8">
                        <input type="date" autocomplete="off" class="form-control" placeholder="" name="date" required>
                    </div>
                </div>

               

                         
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> من ساعة:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="من ساعة"
                                        name="from" value="{{old('from')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> إلى ساعة:</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="إلى ساعة"
                                        name="to" value="{{old('to')}}" required>
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
