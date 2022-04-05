<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="/" class="dropdown-toggle no-arrow">
                        <span class="mtext"> <i class="fa fa-home" aria-hidden="true"></i> Home</span>
                    </a>
                </li>
                @if(auth()->user()->user_role =='User')
                <li>
                    <a href="{{route('student.attachment.create')}}" class="dropdown-toggle no-arrow">
                        <span class="mtext"> <i class="fa fa-map-pin" aria-hidden="true"></i>Apply Attachment</span>
                    </a>
                </li>
                @else
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Department & Courses</span>
                    </a>
                    <ul class="submenu">
                        @if(auth()->user()->user_role =='Admin')
                        <li><a href="{{route('admin.department.create')}}">New Departent</a></li>
                        <li><a href="{{route('admin.course.create')}}">New Course </a></li>
                        @endif
                        @if(auth()->user()->user_role !=='User')
                        <li><a href="{{route('admin.department.index')}}">View Departments </a></li>
                        <li><a href="{{route('admin.course.index')}}">View Courses </a></li>
                        @endif
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Supervisors</span>
                    </a>
                    <ul class="submenu">
                        @if(auth()->user()->user_role =='Admin')
                        <li><a href="{{route('admin.supervisors.create')}}">New Supervisor</a></li>
                        @endif
                        @if(auth()->user()->user_role !=='User')
                        <li><a href="{{route('admin.supervisors.index')}}">View Supervisors</a></li>
                        <li><a href="{{route('admin.supervisor_student')}}">Students Supervisors</a></li>
                        @endif
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Students & Attachments</span>
                    </a>
                    <ul class="submenu">
                        @if(auth()->user()->user_role =='Admin')
                        <li><a href="{{route('admin.bulk_import')}}">Import Students</a></li>
                        @endif
                        @if(auth()->user()->user_role =='Ilo')
                        <li><a href="{{route('admin.towns.create')}}">Allocate Town Tokens</a></li>
                        @endif
                        @if(auth()->user()->user_role =='Ilo')
                        <li><a href="{{route('admin.attachments.index')}}">View All</a></li>
                        @endif
                        @if(auth()->user()->user_role !=='User')
                        <li><a href="{{route('admin.towns.view')}}">View Town Tokens</a></li>
                        <li><a href="{{route('admin.graphs')}}">Charts</a></li>
                        @endif
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">H.O.D</span>
                    </a>
                    <ul class="submenu">
                        @if(auth()->user()->user_role =='Hod')
                        <li><a href="{{route('admin.bulk_import')}}">Import Students</a></li>
                        @endif
                        @if(auth()->user()->user_role =='Admin' ||auth()->user()->user_role =='Super Admin')
                        <li><a href="{{route('admin.users.create')}}">Add Users</a></li>
                        @endif
                        @if(!auth()->user()->user_role =='User')
                        <li><a href="{{route('admin.towns.create')}}">View Students</a></li>
                        @endif
                    </ul>
                </li>
                @endif


            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>