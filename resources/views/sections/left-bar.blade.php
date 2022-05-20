<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="/assets/vendors/images/ziwatti.jpg" class="dark-logo" style="height:72px; width: 72px; border-radius:22px; padding:2px; margin:2px">
            <img src="/assets/vendors/images/ziwatti.jpg" class="light-logo" style="height:72px; width: 72px; border-radius:22px; padding:2px; margin:2px">
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
                        @can('create',App\Models\Department::class)
                        <li><a href="{{route('admin.department.create')}}">New Departent</a></li>
                        @endcan
                        <li><a href="{{route('admin.course.create')}}">New Course </a></li>
                        @can('viewAny',App\Models\Department::class)
                        <li><a href="{{route('admin.department.index')}}">View Departments </a></li>
                        @endcan
                        <li><a href="{{route('admin.course.index')}}">View Courses </a></li>

                    </ul>
                </li>

                @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin','Ilo','Hod']))
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Assessors</span>
                    </a>
                    <ul class="submenu">
                        @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin','Hod']))
                        <li><a href="{{route('admin.supervisors.create')}}">New Assessor</a></li>
                        @endif
                        <li><a href="{{route('admin.supervisors.index')}}">View Assessors</a></li>
                        @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin','Ilo']))<li><a href="{{route('admin.allocate_supervisor_student')}}">Allocate Assesors</a></li> @endif
                        <li><a href="{{route('admin.supervisor_student')}}">Students Assessors</a></li>

                    </ul>
                </li>
                @endif
                @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin', 'Ilo']))
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Attachments</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.towns.create')}}">Allocate Town Tokens</a></li>
                        <li><a href="{{route('admin.settings.show')}}">Settings</a></li>
                        <li><a href="{{route('admin.attachments.index')}}">Received Applications</a></li>
                        <li><a href="{{route('admin.towns.view')}}">View Town Tokens</a></li>
                        <li><a href="{{route('admin.students.pending')}}">Pending Applicants</a></li>
                        <li><a href="{{route('admin.graphs')}}">Charts</a></li>
                    </ul>
                </li>
                @endif
                @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin', 'Hod']))
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">User Management</span>
                    </a>
                    <ul class="submenu">
                        @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin', 'Hod']))
                        <li><a href="{{route('admin.users.create')}}">Add Users</a></li>
                        <li><a href="{{route('admin.bulk_import')}}">Import Students</a></li>
                        <li><a href="{{route('admin.users.index')}}">View Users</a></li>

                        @endif
                    </ul>
                </li>
                @endif
                @endif


            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>