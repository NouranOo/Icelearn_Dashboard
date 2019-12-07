@extends('commonmodule::layouts.master')
@section('title')
    إضافة جروب جديد
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection



@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">إضافة جروب جديد</h3>
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
        <form class="form-horizontal" id="createform" action="" id="registration-form"
            method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}


                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">الكورسات </h3>
                    </div>
                    <br>
                    {{-- Course Name --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">اسم الكورس:</label>
                        <div class="col-sm-8">
                            <select   name="course_id"class="form-control">
{{--                                @foreach($courses as $course)--}}
{{--                                <option value="{{$course->id}}">{{$course->title}}</option>--}}
                                <option value="">English</option>
                                <option value="">French</option>
                                <option value="">Arabic</option>
                                <option value="">Programming</option>
{{--                                @endforeach--}}

                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">المستوى :</label>
                        <div class="col-sm-8">
                            <select name="suggestedLevel" class="form-control">
                                {{--                                 @foreach($courses as $course)--}}
                                {{--                                    @foreach( $course->levels as $level )--}}
                                {{--                                        <option  value="{{$level->id}}">{{$course->title}}-{{$level->title}}</option>--}}
                                <option  value="">Level0</option>
                                <option  value="">Level1</option>
                                <option  value="">Level2</option>
                                <option  value="">Level3</option>

                                {{--                                    @endforeach--}}
                                {{--                                @endforeach--}}

                            </select>

                        </div>

                    </div>

                </div>
                <hr>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{trans('student::student.id')}}</th>
                            <th>{{trans('student::student.name')}}</th>
                            <th>الغياب</th>
                            <th>التفاعل</th>
                            <th>HomeWork</th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> نوران</td>
                                <td><input type="checkbox" name="" value="">  </td>
                                <td> <input type="checkbox" name="" value=""> </td>
                                <td> <input type="checkbox" name="" value=""> </td>

                            </tr>
                            <tr>
                                <td> 2</td>
                                <td> أنس</td>
                                <td><input type="checkbox" name="" value="">  </td>
                                <td> <input type="checkbox" name="" value=""> </td>
                                <td> <input type="checkbox" name="" value=""> </td>

                            </tr>
                            <tr>
                                <td>3</td>
                                <td> محمد</td>
                                <td><input type="checkbox" name="" value="">  </td>
                                <td> <input type="checkbox" name="" value=""> </td>
                                <td> <input type="checkbox" name="" value=""> </td>

                            </tr>
                            <tr>
                                <td>4</td>
                                <td> أحمد</td>
                                <td><input type="checkbox" name="" value="">  </td>
                                <td> <input type="checkbox" name="" value=""> </td>
                                <td> <input type="checkbox" name="" value=""> </td>

                            </tr>

                        </tbody>
                    </table>
                </div>


            <div class="box-footer">
                    <a href="{{url('/admin-panel/student')}}" type="button"
                        class="btn btn-default">{{trans('student::student.cancel')}} &nbsp; <i class="fa fa-remove"
                            aria-hidden="true"></i>
                    </a>
                    <button type="submit" class="btn btn-primary pull-right">{{trans('student::student.save')}} &nbsp;
                        <i class="fa fa-save"></i>
                    </button>
                </div>
                <!-- /.box-footer -->
        </form>
    </div>
</section>
@endsection
@section('javascript')

    {{-- sweet alert --}}
    <script src="{{asset('assets/admin/plugins/sweetalert/sweetalert.min.js')}}"></script>

    @if (session('success'))
        <script>
            swal("{{__('commonmodule::swal.good')}}", "{{__('commonmodule::swal.saved')}}", "success", {button: "{{__('commonmodule::swal.btn')}}",});
        </script>
    @endif

    @if (session('updated'))
        <script>
            swal("{{trans('courses::course.good')}}", "{{trans('courses::course.updated')}}", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    @if (session('deleted'))
        <script>
            swal("{{trans('courses::course.good')}}", "{{trans('courses::course.deleted')}}", "success", {button: "{{trans('courses::course.btn')}}",});
        </script>
    @endif

    <!-- page script -->
    <!-- DataTables -->
    <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

    </script>

@endsection






