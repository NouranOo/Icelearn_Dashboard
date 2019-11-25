@extends('commonmodule::layouts.master')
@section('title') {{trans('courses::category.edit')}}
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        {{trans('courses::category.edit')}}
    </h1>
</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('courses::category.edit')}}</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{url('admin-panel/categories')}}/{{$category->id}}" method="post" enctype="multipart/form-data">
            {{ method_field('put') }} {{ csrf_field() }}
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        {{-- Title --}}
                        <label class="control-label col-sm-2" for="title">{{trans('courses::category.title')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" autocomplete="off" value="{{ $category->translate(''.$lang->lang)->title }}" class="form-control" placeholder="Enter category title"
                                   name="{{ $lang->lang }}[title]" required data-validation="alphanumeric" data-validation-allowing='UTF-8'
                                   data-validation-length="3-50" data-validation-error-msg="{{__('FormValidate.title')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        {{-- Description --}}
                        <label class="control-label col-sm-2" for="title">{{trans('courses::category.desc')}}
                        </label>
                        <div class="col-sm-8">
                            <textarea class="textarea" name="{{ $lang->lang }}[description]" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $category->translate(''.$lang->lang)->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        {{-- Guardian Category --}}
                        <label class="control-label col-sm-2" for="title">{{trans('courses::category.parent')}}:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="parent_id">

                                {{-- {{$cat->title}} == {{$category->parent->title}} --}}
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">
                                        <pre>&nbsp;&nbsp;&nbsp;</pre>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.nav-tabs-custom -->

                    <div class="form-group">
                        {{-- Upload photo --}}
                        <label class="control-label col-sm-2" for="img">{{trans('courses::category.pic')}}</label>
                        <div class="col-sm-8">
                            <input type="file" autocomplete="off" name="photo">
                            <br> @if($category->photo)
                            <img src="{{asset('/images/category/' . $category->photo)}}" style="margin-top: 5px;" height="70" width="100">                            @else "
                            <strong>No Photo</strong>" @endif
                        </div>
                    </div>



                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{url('/admin-panel/categories')}}" type="button" class="btn btn-default">{{trans('courses::category.cancel')}} &nbsp; <i class="fa fa-remove"
                                                                                                   aria-hidden="true"></i>
                        </a>
                    <button type="submit" class="btn btn-primary pull-right">{{trans('courses::category.submit')}}
                            &nbsp; <i class="fa fa-save"></i></button>
                </div>
                <!-- /.box-footer -->
            </div>
        </form>
    </div>
</section>
@endsection

@section('javascript')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

@if($category->parent)
<script>
    $(document).ready(function () {
            if ($('option').has("{{$category->parent->title}}"))
                $('select').val('{{$category->parent->id}}');
            });

</script>
@endif

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
@endsection
