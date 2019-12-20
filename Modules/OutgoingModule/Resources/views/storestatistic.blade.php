@extends('commonmodule::layouts.master')
@section('title')  عرض احصاءيات الربح
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
    عرض احصاءيات الربح:
    </h1>
</section>
@endsection


@section('content')
<section class="content">

<table class='table table-striped'>
		<tr class="warning">
			<td>اجمالي الايردات </td>
			<td><span class="money" >{{$totalpayments}}</span> ج.م</td>
		</tr>
		<tr class="warning">
			<td> اجمالي  المصروفات</td>
			<td> <span class="money">{{$totaloutgoing}}</span>  ج.م</td>
		</tr>
       
        <tr   class="success">
        	<td>صافي الربح</td>
        	<td><span class="money" >{{$safy}}</span> ج.م</td>
        </tr>
	</table>


   
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> فلتره</h3>
        </div>
       
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{route('dostorestatistical')}}" method="POST">
            {{ csrf_field() }}
            <div class="box-body">

                <div class="form-group">
                   
                    <label class="control-label col-sm-2" for="title">من </label>
                    <div class="col-sm-8">
                      <input type="date" name="from" class="form-control">
                       
                    </div>
                </div>

                <div class="form-group">
                   
                   <label class="control-label col-sm-2" for="title">الي </label>
                   <div class="col-sm-8">
                     <input type="date" name="to" class="form-control">
                      
                   </div>
               </div>




             

              

             

               

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <!-- <a href="{{url('/admin-panel/outgoing')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a> -->
                <button type="submit" class="btn btn-primary pull-right">فلتره &nbsp; <i class="fa fa-save"></i></button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</section>
@endsection