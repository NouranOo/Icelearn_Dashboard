@extends('commonmodule::layouts.master')
@section('title') {{trans('courses::category.pageTitle')}}
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        {{ trans('courses::category.pageTitle')}}
    </h1>
</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('courses::category.pageTitle')}}</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{url('admin-panel/categories')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="box-body">

                <div class="form-group">
                    {{-- Title --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::category.title')}}
                    </label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" placeholder="{{trans('courses::category.newtitle')}}" name="title"
                               required>
                    </div>
                </div>

                <div class="form-group">
                    {{-- Description --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::category.desc')}}
                    </label>
                    <div class="col-sm-8">
                        <textarea class="textarea" name="description" placeholder="{{trans('courses::category.newdesc')}}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    {{-- Guardian Category --}}
                    <label class="control-label col-sm-2" for="title">{{trans('courses::category.parent')}}:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="parent_id">
                                <option value="0"> Parent Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">
                                        <pre>&nbsp;&nbsp;&nbsp;</pre>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="form-group">
                    {{-- Upload photo --}}
                    <label class="control-label col-sm-2" for="img">{{trans('courses::category.pic')}}</label>
                    <div class="col-sm-8">
                        <input type="file" autocomplete="off" class="" name="photo">
                    </div>
                </div>



            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('admin-panel/categories')}}" type="button" class="btn btn-default">{{trans('courses::category.cancel')}} &nbsp; <i class="fa fa-remove"
                                                                                               aria-hidden="true"></i>
                    </a>
                <button type="submit" class="btn btn-primary pull-right">{{trans('courses::category.submit')}}
                        &nbsp; <i class="fa fa-save"></i></button>
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
