<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/admin/dist/img/pp.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>U GROW</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{__('commonmodule::sidebar.mainnav')}}</li>

            <!-- Common Module -->
            <li>
                <a href="{{url('/admin-panel')}}">
                    <i class="fa fa-home"></i> <span>{{__('commonmodule::sidebar.home')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>


            <li>
                <a href="{{url('admin-panel/student/')}}">
                    <i class="fa fa-user-circle"
                       aria-hidden="true"></i><span>الطلاب </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span>الايصالات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('allpayment')}}">
                            <i class="fa fa-money"></i> <span>كل الايصالات </span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('searchpayment')}}">
                            <i class="fa fa-money"></i> <span>انشاء ايصال جديد </span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>


                </ul>
            </li>
            <!-- <li>
                <a href="{{url('admin-panel/reservation/')}}">
                    <i class="fa fa-user-circle"
                       aria-hidden="true"></i><span>{{trans('commonmodule::sidebar.reservation')}} </span>
                    <span class="pull-right-container"></span>
                </a>
            </li> -->

            <li>
                <a href="{{url('instructors/instructors')}}">
                    <i class="fa fa-user-secret"
                       aria-hidden="true"></i><span>{{trans('commonmodule::sidebar.instructors')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>

{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-folder" aria-hidden="true"></i>--}}
{{--                    <span>{{__('commonmodule::sidebar.course')}}</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--                        <i class="fa fa-angle-left pull-right"></i>--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
                    <li>
                        <a href="{{url('admin-panel/courses')}}"><i class="fa fa-graduation-cap"></i>
                            {{__('commonmodule::sidebar.course')}}
                        </a>
                    </li>

{{--                    <li>--}}
{{--                        <a href="{{url('admin-panel/groups')}}"><i class="fa fa-circle-o"></i>--}}
{{--                            {{__('commonmodule::sidebar.group')}}--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                </ul>--}}
{{--            </li>--}}

            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder" aria-hidden="true"></i>
                    <span>{{__('commonmodule::sidebar.setting')}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"> -->
                    <!-- <li>
                        <a href="{{url('admin-panel/tracks/')}}">
                            <i class="fa fa-circle-o"></i><span>{{__('sidebar.track')}} </span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li> -->
                    <li><a href="{{url('admin-panel/levels/')}}">
                            <i class="fa fa-circle-o"></i><span>{{__('sidebar.level')}} </span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{url('admin-panel/categories')}}">
                            <i class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.coursecateg')}}
                        </a>
                    </li> -->
                <!-- </ul> -->
            <!-- </li> -->

            @role('superadmin')
            <li>
                <a href="{{ url('admin-panel/admins') }}">
                    <i class="fa fa-user" aria-hidden="true"></i><span>{{__('commonmodule::sidebar.admins')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>
            @endrole

            @role('superadmin')
            <!-- <li>
                <a href="{{ url('/admin-panel/commonmodule/activate-lang') }}">
                    <i class="fa fa-language" aria-hidden="true"></i><span>{{__('commonmodule::sidebar.langs')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li> -->
            @endrole

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span>الجروبات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('groupmodule')}}">
                            <i class="fa fa-user-circle"
                               aria-hidden="true"></i><span>جروب </span>
                            <span class="pull-right-container">
                </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('groupmodule/creategroup')}}">
                            <i class="fa fa-money"></i> <span>انشاء جروب جديد </span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>


                </ul>
            </li>

        </ul>


    </section>
    <!-- /.sidebar -->
</aside>
