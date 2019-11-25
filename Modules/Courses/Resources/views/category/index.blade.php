@extends('commonmodule::layouts.master')

@section('title')
    {{trans('courses::category.index')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  @endsection


@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('courses::category.index')}}

        </h1>

    </section>
@endsection


@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('courses::category.index')}}</h3>
                    <a href="{{url('admin-panel/categories/create')}}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{trans('courses::category.createnew')}}</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="categoriesIndex" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{trans('courses::category.id')}}</th>
                                <th>{{trans('courses::category.title')}}</th>
                                <th>{{trans('courses::category.pic')}}</th>
                                <th>{{trans('courses::category.parent')}}</th>
                                <th>{{trans('courses::category.op')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categs as $item)
                                <tr>
                                    <td> {{$item->id}} </td>
                                    <td> {{$item->title}} </td>
                                    <td>
                                        @if ($item->photo)
                                        <img src="{{asset('public/images/category/' . $item->photo)}}" height="70" width="100">
                                        @else
                                            "<strong>No Photo</strong>"
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->parent)
                                        {{ $item->parent->title }}
                                        @else
                                            Parent Category
                                        @endif
                                    </td>
                                    <td>
                                        {{-- view --}}
                                        <a title="View" href="{{url('/admin-panel/categories/' . $item->id)}}" type="button" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                        {{-- Edit --}}
                                        @role('admin|superadmin')
                                        <a title="Edit" href="{{url('/admin-panel/categories/' . $item->id . '/edit')}}" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        @endrole

                                        {{-- Delete --}}
                                        @role('superadmin')
                                        <form class="inline" action="{{url('/admin-panel/categories/delete/' . $item->id)}}" method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit" onclick="return confirm('Are you sure, You want to delete Category?')" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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


@section('javascript')

{{-- sweet alert --}}
<script src="{{asset('assets/admin/plugins/sweetalert/sweetalert.min.js')}}"></script>

@if (session('success'))
<script>
    swal("{{__('commonmodule::swal.good')}}", "{{__('commonmodule::swal.saved')}}", "success", { button: "{{__('commonmodule::swal.btn')}}", });
</script>
@endif

@if (session('updated'))
<script>
    swal("{{__('commonmodule::swal.good')}}", "{{__('commonmodule::swal.edited')}}", "success", { button: "{{__('commonmodule::swal.btn')}}", });

</script>
@endif

<!-- page script -->
<!-- DataTables -->
<script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#categoriesIndex').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        });
    })

</script>

@endsection
