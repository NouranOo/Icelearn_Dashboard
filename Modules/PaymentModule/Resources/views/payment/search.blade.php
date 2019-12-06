@extends('commonmodule::layouts.master')
@section('title') ايصال استلام نقديه
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        ابحث 
    </h1>

</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">البحث:</h3>
           <h3 class="box-title" style=" float: left; color: crimson;  font-weight: 900; ">U GROW</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{route('dosearchpayment')}}" method="Get">
            {{ csrf_field() }}

            <div class="box-body">
             <div class="row">

             {{-- name --}}
                <div class="form-group col-sm-12" >
                
                    <label class="control-label col-sm-2" for="title">البحث:
                    </label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control"  name="search" >

                                
                    </div>

                    <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary pull-right">Search &nbsp; <i class="fa fa-search"></i></button>
       
                    </div>
                </div>
               
            </div>
           </div> 
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('admin-panel')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                <!-- <button type="submit" class="btn btn-primary pull-right">{{__('formIndex.submit')}} &nbsp; <i class="fa fa-save"></i></button> -->
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
