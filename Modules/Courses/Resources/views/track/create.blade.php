@extends('commonmodule::layouts.master')
@section('title') {{trans('courses::track.pageTitle')}}
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        {{trans('courses::track.pageTitle')}}
    </h1>
</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('courses::track.newdata')}}</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{url('admin-panel/tracks')}}" method="POST">
            {{ csrf_field() }}

            <div class="box-body">
                <div class="form-group">
                    {{-- Title --}}
                    <label class="control-label col-sm-2" for="title">{{__('formIndex.title')}}
                    </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('courses::track.newtitle')}}" name="title"
                               required data-validation="alphanumeric" data-validation-allowing='UTF-8' data-validation-length="3-50"
                               data-validation-error-msg="{{__('FormValidate.title')}}">
                    </div>
                </div>

                <div class="form-group">
                    {{-- Description --}}
                    <label class="control-label col-sm-2" for="title">{{__('formIndex.desc')}}
                    </label>
                    <div class="col-sm-8">
                        <textarea class="textarea" name="description" placeholder="{{trans('courses::track.newdesc')}}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('admin-panel/tracks')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
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
