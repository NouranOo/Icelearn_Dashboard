@extends('commonmodule::layouts.master')

@section('title')
  {{$category->title}}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

<style>
  .wordLi{
    margin: 4%;
    font-size: large;
  }
</style>
@endsection

@section('content-header')
<section class="content-header">
  <h1>
    {{trans('courses::category.show')}}

  </h1>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">{{trans('courses::category.category')}} <strong>{{$category->title}}&nbsp;:</strong></h3>

          @role('admin|superadmin')
          <a title="Edit" href="{{url('/admin-panel/categories/' . $category->id . '/edit')}}" type="button" class="btn btn-primary pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('courses::category.edit')}}</a>
          @endrole

          <a href="{{url('/admin-panel/categories')}}" style="margin-right: 5px;" type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; {{trans('courses::category.back')}}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-7">
            <h3><strong>{{trans('courses::category.pic')}}:</strong></h3><br>
            @if ($category->photo)
                <img style="margin: 4%; padding-left: 10px;" src="{{asset('/images/category/' . $category->photo)}}" width="400" height="250">
            @else
                <pre><strong>"No Photo"</strong></pre>
            @endif

            <div class="box-body">
              <h3><strong>{{trans('courses::category.desc')}}</strong></h3><br> {!! $category->description !!}
            </div>
          </div>
          <div class="col-md-5 pull-right" >
            <ul>
              <li class="wordLi">{{trans('courses::category.id')}}:&nbsp; <strong>{{$category->id}}</strong> <br></li>
              <li class="wordLi">{{trans('courses::category.title')}}:&nbsp; <strong>{{$category->title}}</strong> <br></li>
              <li class="wordLi">{{trans('courses::category.parent')}}:&nbsp; <strong>{{$category->parent_id}}</strong> <br></li>
              <li class="wordLi">{{trans('courses::category.slug')}}:&nbsp; <strong>{{$category->slug}}</strong> <br></li>
              <li class="wordLi">{{trans('courses::category.tag')}}:&nbsp; <strong>{{$category->meta_keywords}}</strong> <br></li>
            </ul>
          </div>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
