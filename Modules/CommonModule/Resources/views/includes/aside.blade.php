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
             <!-- instructors Module -->
            <li>
                <a href="{{url('instructors/instructors')}}">
                    <i class="fa fa-user-secret"
                       aria-hidden="true"></i><span>{{trans('commonmodule::sidebar.instructors')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>
             <!-- course Module -->
            
            <li>
                        <a href="{{url('admin-panel/courses')}}"><i class="fa fa-graduation-cap"></i>
                            {{__('commonmodule::sidebar.course')}}
                        </a>
            </li>

             <!-- level Module -->
         
               <li><a href="{{url('admin-panel/levels/')}}">
                            <i class="fa fa-circle-o"></i><span>{{__('sidebar.level')}} </span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
             <!-- student Module -->

            <li>
                <a href="{{url('admin-panel/student/')}}">
                    <i class="fa fa-user-circle"
                       aria-hidden="true"></i><span>الطلاب </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>

             <!-- classindex Module -->
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>الكلاسات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('classindex')}}">
                            <i class="fa fa-user-circle"
                               aria-hidden="true"></i><span>كل الكلاسات </span>
                            <span class="pull-right-container">
                </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('createclass')}}">
                            <i class="fa fa-plus-circle"></i> <span>انشاء كلاس جديد </span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>


                </ul>
            </li>

             <!-- الايصالات Module -->

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


             <!-- المصروفات Module -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-outdent" aria-hidden="true"></i>
                    <span>المصروفات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('outgoing.index')}}">
                            <i class="fa fa-server"
                               aria-hidden="true"></i><span>كل المصروفات </span>
                            <span class="pull-right-container">
                </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('outgoing.create')}}">
                            <i class="fa fa-plus-circle"></i> <span>انشاء مصروف جديد </span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>


                </ul>
            </li>
          
             <!-- الاحصاءيات Module -->

            <li>
                <a href="{{route('storestatistical')}}">
                    <i class="fa fa-user-circle"
                       aria-hidden="true"></i><span>الاحصاءيات </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>



                 
           

            @role('superadmin')
            <li>
                <a href="{{ url('admin-panel/admins') }}">
                    <i class="fa fa-user" aria-hidden="true"></i><span>{{__('commonmodule::sidebar.admins')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>
            @endrole

        
<!-- 
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
            </li> -->



          

            

        </ul>


    </section>
    <!-- /.sidebar -->
</aside>
