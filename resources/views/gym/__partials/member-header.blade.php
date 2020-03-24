<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <!-- begin:: Header Menu -->
    <!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click"
                    aria-haspopup="true">
                    <a href="{{url('gym/member')}}" class="kt-menu__link ">
                        <span class="kt-menu__link-text">Home</span>
                    </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click"
                    aria-haspopup="true">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Archive</span>
                    </a>
                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{url('/gym/member/archive', "leads")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">Leads</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{url('/gym/member/archive', "failedCalls")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">Failed Calls</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{url('/gym/member/archive', "notJoinedMembers")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">Not Joined Members</span>
                                </a>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true">
                                <a href="{{url('/gym/member/archive', "expiredMembers")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">Expired Members</span>
                                </a>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true">
                                <a href="{{url('/gym/member/archive', "inActiveMembers")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">List of Inactive Members</span>
                                </a>
                            </li>
                            {{--                            <li class="kt-menu__item" aria-haspopup="false">--}}
                            {{--                                <a href="#" class="kt-menu__link ">--}}
                            {{--                                    <span class="kt-menu__link-text">Membership Transfer</span>--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                            <li class="kt-menu__item" aria-haspopup="true">
                                <a href="{{url('/gym/member/archive', "oldMembers")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">Old Members</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click"
                    aria-haspopup="true">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Guest</span>
                    </a>
                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{url('/gym/member/guest', "previewCalls")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">Preview Calls</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{url('/gym/member/guest', "transferCalls")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">My Transfer calls</span>
                                </a>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true">
                                <a href="{{url('/gym/member/guest', "preivewAppointments")}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">Preivew Appointments</span>
                                </a>
                            </li>
                            {{--                            <li class="kt-menu__item" aria-haspopup="false">--}}
                            {{--                                <a href="#" class="kt-menu__link ">--}}
                            {{--                                    <span class="kt-menu__link-text">Preview Guest Cards</span>--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click"
                    aria-haspopup="true">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Member</span>
                    </a>
                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{url('/gym/member/list')}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">List Members</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{url('/gym/member/create')}}" class="kt-menu__link ">
                                    <span class="kt-menu__link-text">Create Member</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- end:: Header Menu -->
    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                    <span
                        class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::guard('employee')->user()->name }}</span>
                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span
                        class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">
                        <img src="{{asset('assets/media/users/avatar.png')}}" alt="image">
                    </span>
                </div>
            </div>
            <div
                class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                     style="background-image: url({{asset('assets/media/users/300_25.jpg')}})}})">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="{{asset('assets/media/users/300_25.jpg')}}"/>
                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
                            <img src="{{asset('assets/media/users/avatar.png')}}" alt="image">
                        </span>
                    </div>
                    <div class="kt-user-card__name">
                        {{ Auth::guard('employee')->user()->name }}
                    </div>
                    <div class="kt-user-card__badge">
                        <span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
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
