<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search Here">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active">{{auth()->user()->unreadNotifications->count()}}</span>
                    <!-- <span></span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            @if(auth()->user()->unreadNotifications->count()>0)
                            @foreach(auth()->user()->unreadNotifications as $note)
                            <li>
                                <a href="{{route('mark_note_read',$note->id)}}">
                                    <img src="/assets/vendors/images/ziwatti.jpg" alt="">
                                    <h3># {{$note->data['notification_type']}}</h3>
                                    <p>{{$note->data['message']}}</p>
                                </a>
                            </li>
                            @endforeach
                            @else
                            <li>
                                <a href="#">
                                    <p>You have caught up with everything for now</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="/assets/vendors/images/photo1.jpg" alt="">
                    </span>
                    <span class="user-name">{{auth()->user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a> -->
                    <!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a> -->
                    <!-- <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> -->

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="dw dw-logout"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>