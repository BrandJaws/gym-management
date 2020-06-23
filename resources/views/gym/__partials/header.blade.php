<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <!-- begin:: Header Menu -->
    <!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
            <h3 class="mb-0">Gym Dashboard</h3>
        </div>
    </div>
    <!-- end:: Header Menu -->
    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <div class="kt-header__topbar-item dropdown">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
                <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
                     <i class="flaticon-bell kt-font-success"></i> <span class="kt-pulse__ring"></span> <span class="kt-pulse__ring"></span>
                </span>
                <!--
                Use dot badge instead of animated pulse effect:
                <span class="kt-badge kt-badge--dot kt-badge--notify kt-badge--sm kt-badge--brand"></span>
                -->
            </div>
            <div
                class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg"
                style="position: absolute; transform: translate3d(-246px, 64px, 0px); top: 0px; left: 0px; will-change: transform;padding: 0!important;"
                x-placement="bottom-end">
                <form>
                    <!--begin: Head -->
                    <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b"
                         style="background-image: url({{asset('assets/media/misc/bg-1.jpg')}})">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab"
                                   href="#topbar_notifications_notifications" role="tab"
                                   aria-selected="true">Schaduale</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab"
                                   aria-selected="false">Re-Schaduale</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab"--}}
{{--                                   aria-selected="false">Logs</a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
{{--                                <a href="{{ route('markAsRead') }}" class="btn btn-link">Mark All As Read</a>--}}
{{--                                <span class="badge badge-danger">{{ Auth::guard('employee')->user()->unreadNotifications->count() }}</span>--}}
                                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_All" role="tab"
                                   aria-selected="false">Notification</a>
                            </li>
                        </ul>
                    </div>
                    <!--end: Head -->
                    <div class="tab-content">
                        <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll ps ps--active-y"
                                 data-scroll="true" data-height="300" data-mobile-height="200"
                                 style="height: 300px; overflow: hidden;">
                                @foreach(Auth::guard('employee')->user()->schadualeStage as $row)
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-drop kt-font-info"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                {{ $row->stage }}
                                            </div>
                                            <div class="kt-notification__item-time">
                                                {{ $row->scheduleDate }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 300px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 108px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true"
                                 data-height="300" data-mobile-height="200">
                                @foreach(Auth::guard('employee')->user()->reSchaduale as $row)
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                {{ $row->transferStage }}
                                            </div>
                                            <div class="kt-notification__item-time">
                                                {{ $row->reScheduleDate }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll ps ps--active-y"
                                 data-scroll="true" data-height="300" data-mobile-height="200"
                                 style="height: 300px; overflow: hidden;">
                                @foreach(Auth::guard('employee')->user()->activityLogs as $row)
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-safe kt-font-primary"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                {{ $row->activity }}
                                            </div>
                                            <div class="kt-notification__item-time">
                                                {{ $row->created_at }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 300px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 108px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="topbar_notifications_All" role="tabpanel">
                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll ps ps--active-y"
                                 data-scroll="true" data-height="300" data-mobile-height="200"
                                 style="height: 300px; overflow: hidden;">
                                @foreach(Auth::guard('employee')->user()->unreadNotifications as $row)
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-safe kt-font-primary"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                {{ $row->data['letter']['title'] }}
                                            </div>
                                            <div class="kt-notification__item-time">
                                                {{ $row->created_at }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 300px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 108px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                    <span
                        class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::guard('employee')->user()->name }}</span>
                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span
                        class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">
                          @if(Auth::guard('employee')->user()->userImage != "")
                            <img src="{{asset(Auth::guard('employee')->user()->userImage->path)}}" alt="image">
                        @endif
                        @if(Auth::guard('employee')->user()->userImage == "")
                            <img src="{{asset('assets/media/users/avatar.png')}}" alt="image">
                        @endif
                    </span>
                </div>
            </div>
            <div
                class="dropdown-menu dropdown-menu-fit
                dropdown-menu-right dropdown-menu-anim
                dropdown-menu-top-unround dropdown-menu-xl adminLoginDropdown">
                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                     style="background-image: url({{asset('assets/media/misc/bg-1.jpg')}})">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="{{asset('assets/media/users/300_25.jpg')}}"/>
                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
                           @if(Auth::guard('employee')->user()->userImage != "")
                                <img src="{{asset(Auth::guard('employee')->user()->userImage->path)}}" alt="image">
                            @endif
                            @if(Auth::guard('employee')->user()->userImage == "")
                                <img src="{{asset('assets/media/users/avatar.png')}}" alt="image">
                            @endif
                        </span>
                    </div>
                    <div class="kt-user-card__name">
                        {{ Auth::guard('employee')->user()->name }}
                    </div>
                </div>
                <!--end: Head -->
                <!--begin: Navigation -->
                <div class="kt-notification">
                    <a href="{{route('gym.profile')}}" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                My Profile
                            </div>
                            <div class="kt-notification__item-time">
                                Account settings and more
                            </div>
                        </div>
                    </a>
                    <div class="kt-notification__custom kt-space-between">
                        <a href="#"
                           onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();"
                           class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                        <form id="admin-logout-form" action="{{ route('gym.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <!--end: Navigation -->
            </div>
        </div>
        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="dropdown-menu dropdown-menu-fit
            dropdown-menu-right dropdown-menu-anim
            dropdown-menu-top-unround dropdown-menu-xl adminLoginDropdown">
                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                     style="background-image: url({{asset('assets/media/misc/bg-1.jpg')}})">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="{{asset('assets/media/users/300_25.jpg')}}"/>
                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
                            @if(Auth::guard('employee')->user()->userImage != "")
                                <img src="{{asset(Auth::guard('employee')->user()->userImage->path)}}" alt="image">
                            @endif
                            @if(Auth::guard('employee')->user()->userImage == "")
                                <img src="{{asset('assets/media/users/avatar.png')}}" alt="image">
                            @endif
                        </span>
                    </div>
                    <div class="kt-user-card__name">
                        {{ Auth::guard('employee')->user()->name }}
                    </div>
                </div>
                <!--end: Head -->
                <!--begin: Navigation -->
                <div class="kt-notification">
                    <a href="{{route('gym.profile')}}" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                My Profile
                            </div>
                            <div class="kt-notification__item-time">
                                Account settings and more
                            </div>
                        </div>
                    </a>
                    <div class="kt-notification__custom kt-space-between">
                        <a href="#"
                           onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();"
                           class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                        <form id="admin-logout-form" action="{{ route('gym.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>
        <!--end: User Bar -->
    </div>
    <!-- end:: Header Topbar -->
</div>

