@extends('_layouts.index')
@section('content')
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->

            <!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->

            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                    <!-- begin:: Header Menu -->

                    <!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu"
                             class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                            <ul class="kt-menu__nav ">
                                <li>Home</li>
                                <li>Guest</li>
                                <li>Archive</li>
                                <li>Member</li>
                            </ul>
                        </div>
                    </div>

                    <!-- end:: Header Menu -->

                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">

                        <!--begin: Quick panel toggler -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--quick-panel" data-toggle="kt-tooltip"
                             title="Quick panel" data-placement="right">
								<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
											<path
                                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                fill="#000000" opacity="0.3"/>
										</g>
									</svg> </span>
                        </div>

                        <!--end: Quick panel toggler -->
                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                                    <span class="kt-header__topbar-username kt-hidden-mobile">Sean</span>
                                    <img class="kt-hidden" alt="Pic" src="{{asset('assets/media/users/300_25.jpg')}}"/>

                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <span
                                        class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
                                </div>
                            </div>
                            <div
                                class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                                     style="background-image: url({{asset('assets/media/misc/bg-1.jpg')}})">
                                    <div class="kt-user-card__avatar">
                                        <img class="kt-hidden" alt="Pic"
                                             src="{{asset('assets/media/users/300_25.jpg')}}"/>
                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                        <span
                                            class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
                                    </div>
                                    <div class="kt-user-card__name">
                                        Sean Stone
                                    </div>
                                </div>

                                <!--end: Head -->

                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <a href="custom/apps/user/profile-1/personal-information.html"
                                       class="kt-notification__item">
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
                                        <a href="custom/user/login-v2.html" target="_blank"
                                           class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                                    </div>
                                </div>

                                <!--end: Navigation -->
                            </div>
                        </div>

                        <!--end: User Bar -->
                    </div>

                    <!-- end:: Header Topbar -->
                </div>

                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <!--Begin::Dashboard 2-->
                        <!--Begin::Row-->
                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <!--begin:: Widgets/Daily Sales-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b-30">
                                            <h3 class="kt-widget14__title">
                                                Daily Sales
                                            </h3>
                                            <span class="kt-widget14__desc">
													Check out each collumn for more details
												</span>
                                        </div>
                                        <div class="kt-widget14__chart" style="height:120px;">
                                            <canvas id="kt_chart_daily_sales"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <!--begin:: Widgets/Profit Share-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header">
                                            <h3 class="kt-widget14__title">
                                                Profit Share
                                            </h3>
                                            <span class="kt-widget14__desc">
													Profit Share between customers
												</span>
                                        </div>
                                        <div class="kt-widget14__content">
                                            <div class="kt-widget14__chart">
                                                <div class="kt-widget14__stat">45</div>
                                                <canvas id="kt_chart_profit_share"
                                                        style="height: 140px; width: 140px;"></canvas>
                                            </div>
                                            <div class="kt-widget14__legends">
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-success"></span>
                                                    <span class="kt-widget14__stats">37% Sport Tickets</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                    <span class="kt-widget14__stats">47% Business Events</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                    <span class="kt-widget14__stats">19% Others</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Profit Share-->
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <!--begin:: Widgets/Revenue Change-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header">
                                            <h3 class="kt-widget14__title">
                                                Revenue Change
                                            </h3>
                                            <span class="kt-widget14__desc">
													Revenue change breakdown by cities
												</span>
                                        </div>
                                        <div class="kt-widget14__content">
                                            <div class="kt-widget14__chart">
                                                <div id="kt_chart_revenue_change"
                                                     style="height: 150px; width: 150px;"></div>
                                            </div>
                                            <div class="kt-widget14__legends">
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-success"></span>
                                                    <span class="kt-widget14__stats">+10% New York</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                    <span class="kt-widget14__stats">-7% London</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                    <span class="kt-widget14__stats">+20% California</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Revenue Change-->
                            </div>
                        </div>
                        <!--End::Row-->
                        <!--Begin::Row-->
                        <div class="row">
                            <div class="col-xl-8 order-lg-1 order-xl-1">
                                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                    <div
                                        class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Exclusive Datatable Plugin
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div
                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">

                                                    <!--begin::Nav-->
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__head">
                                                            Export Options
                                                            <span data-toggle="kt-tooltip" data-placement="right"
                                                                  title="Click to learn more...">
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1"
                                                                         class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<circle fill="#000000" opacity="0.3" cx="12"
                                                                                    cy="12" r="10"/>
																			<rect fill="#000000" x="11" y="10" width="2"
                                                                                  height="7" rx="1"/>
																			<rect fill="#000000" x="11" y="7" width="2"
                                                                                  height="2" rx="1"/>
																		</g>
																	</svg> </span>
                                                        </li>
                                                        <li class="kt-nav__separator"></li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-drop"></i>
                                                                <span class="kt-nav__link-text">Activity</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                                                <span class="kt-nav__link-text">FAQ</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                                                <span class="kt-nav__link-text">Settings</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                                                <span class="kt-nav__link-text">Support</span>
                                                                <span class="kt-nav__link-badge">
																		<span
                                                                            class="kt-badge kt-badge--success kt-badge--rounded">5</span>
																	</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__separator"></li>
                                                        <li class="kt-nav__foot">
                                                            <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade
                                                                plan</a>
                                                            <a class="btn btn-clean btn-bold btn-sm" href="#"
                                                               data-toggle="kt-tooltip" data-placement="right"
                                                               title="Click to learn more...">Learn more</a>
                                                        </li>
                                                    </ul>

                                                    <!--end::Nav-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fit">

                                        <!--begin: Datatable -->
                                        <div class="kt-datatable" id="kt_datatable_latest_orders"></div>

                                        <!--end: Datatable -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 order-lg-1 order-xl-1">

                                <!--begin:: Widgets/Inbound Bandwidth-->
                                <div
                                    class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half">
                                    <div class="kt-portlet__head kt-portlet__space-x">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Inbound Bandwidth
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <a href="#" class="btn btn-label-success btn-sm btn-bold dropdown-toggle"
                                               data-toggle="dropdown">
                                                Export
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                            <span class="kt-nav__link-text">Reports</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-send"></i>
                                                            <span class="kt-nav__link-text">Messages</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                            <span class="kt-nav__link-text">Charts</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                            <span class="kt-nav__link-text">Members</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                            <span class="kt-nav__link-text">Settings</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fluid">
                                        <div class="kt-widget20">
                                            <div class="kt-widget20__content kt-portlet__space-x">
                                                <span class="kt-widget20__number kt-font-brand">670+</span>
                                                <span class="kt-widget20__desc">Successful transactions</span>
                                            </div>
                                            <div class="kt-widget20__chart" style="height:130px;">
                                                <canvas id="kt_chart_bandwidth1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Inbound Bandwidth-->
                                <div class="kt-space-20"></div>

                                <!--begin:: Widgets/Outbound Bandwidth-->
                                <div
                                    class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half">
                                    <div class="kt-portlet__head kt-portlet__space-x">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Outbound Bandwidth
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <a href="#" class="btn btn-label-warning btn-sm  btn-bold dropdown-toggle"
                                               data-toggle="dropdown">
                                                Download
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                            <span class="kt-nav__link-text">Reports</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-send"></i>
                                                            <span class="kt-nav__link-text">Messages</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                            <span class="kt-nav__link-text">Charts</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                            <span class="kt-nav__link-text">Members</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                            <span class="kt-nav__link-text">Settings</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fluid">
                                        <div class="kt-widget20">
                                            <div class="kt-widget20__content kt-portlet__space-x">
                                                <span class="kt-widget20__number kt-font-danger">1340+</span>
                                                <span class="kt-widget20__desc">Completed orders</span>
                                            </div>
                                            <div class="kt-widget20__chart" style="height:130px;">
                                                <canvas id="kt_chart_bandwidth2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Outbound Bandwidth-->
                            </div>



                        </div>

                        <!--End::Row-->


                    </div>

                    <!-- end:: Content -->
                </div>

                <!-- begin:: Footer -->


                <!-- end:: Footer -->
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Quick Panel -->
    <div id="kt_quick_panel" class="kt-quick-panel">
        <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
        <div class="kt-quick-panel__nav">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x"
                role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
                </li>
            </ul>
        </div>
        <div class="kt-quick-panel__content">
            <div class="tab-content">
                <div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
                    <div class="kt-notification">
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-line-chart kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New order has been received
                                </div>
                                <div class="kt-notification__item-time">
                                    2 hrs ago
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- end::Quick Panel -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- end::Scrolltop -->

    <!-- begin::Sticky Toolbar -->
    <ul class="kt-sticky-toolbar" style="margin-top: 30px;">
        <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle"
            data-toggle="kt-tooltip" title="Check out more demos" data-placement="right">
            <a href="#" class=""><i class="flaticon2-drop"></i></a>
        </li>
        <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip"
            title="Layout Builder" data-placement="left">
            <a href="https://keenthemes.com/metronic/preview/demo1/builder.html" target="_blank"><i
                    class="flaticon2-gear"></i></a>
        </li>
        <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip"
            title="Documentation" data-placement="left">
            <a href="https://keenthemes.com/metronic/?page=docs" target="_blank"><i class="flaticon2-telegram-logo"></i></a>
        </li>
        <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler"
            data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
            <a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>
        </li>
    </ul>

    <!-- end::Sticky Toolbar -->

    <!-- begin::Demo Panel -->
    <div id="kt_demo_panel" class="kt-demo-panel">
        <div class="kt-demo-panel__head">
            <h3 class="kt-demo-panel__title">
                Select A Demo

                <!--<small>5</small>-->
            </h3>
            <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
        </div>
        <div class="kt-demo-panel__body">
            <div class="kt-demo-panel__item kt-demo-panel__item--active">
                <div class="kt-demo-panel__item-title">
                    Demo 1
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo1.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo1/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo1/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 2
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo2.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo2/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo2/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 3
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo3.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo3/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo3/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 4
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo4.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo4/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo4/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 5
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo5.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo5/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo5/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 6
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo6.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo6/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo6/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 7
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo7.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo7/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo7/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 8
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo8.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo8/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo8/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 9
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo9.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo9/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo9/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 10
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo10.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo10/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo10/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 11
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo11.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo11/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo11/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 12
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo12.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="https://keenthemes.com/metronic/preview/demo12/index.html"
                           class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="https://keenthemes.com/metronic/preview/demo12/rtl/index.html"
                           class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 13
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo13.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 14
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo14.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 15
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo15.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 16
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo16.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 17
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo17.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 18
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo18.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 19
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo19.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 20
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo20.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 21
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo21.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 22
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media//demos/preview/demo22.jpg" alt=""/>
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <a href="https://1.envato.market/EA4JP" target="_blank"
               class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
                Buy Metronic Now!
            </a>
        </div>
    </div>

    <!-- end::Demo Panel -->

    <!--Begin:: Chat-->
    <div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="kt-chat">
                    <div class="kt-portlet kt-portlet--last">
                        <div class="kt-portlet__head">
                            <div class="kt-chat__head ">
                                <div class="kt-chat__left">
                                    <div class="kt-chat__label">
                                        <a href="#" class="kt-chat__title">Jason Muller</a>
                                        <span class="kt-chat__status">
												<span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
											</span>
                                    </div>
                                </div>
                                <div class="kt-chat__right">
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-clean btn-sm btn-icon"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="flaticon-more-1"></i>
                                        </button>
                                        <div
                                            class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">

                                            <!--begin::Nav-->
                                            <ul class="kt-nav">
                                                <li class="kt-nav__head">
                                                    Messaging
                                                    <i class="flaticon2-information" data-toggle="kt-tooltip"
                                                       data-placement="right" title="Click to learn more..."></i>
                                                </li>
                                                <li class="kt-nav__separator"></li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-group"></i>
                                                        <span class="kt-nav__link-text">New Group</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                        <span class="kt-nav__link-text">Contacts</span>
                                                        <span class="kt-nav__link-badge">
																<span
                                                                    class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
															</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                        <span class="kt-nav__link-text">Calls</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                        <span class="kt-nav__link-text">Settings</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                        <span class="kt-nav__link-text">Help</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__separator"></li>
                                                <li class="kt-nav__foot">
                                                    <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade
                                                        plan</a>
                                                    <a class="btn btn-clean btn-bold btn-sm" href="#"
                                                       data-toggle="kt-tooltip" data-placement="right"
                                                       title="Click to learn more...">Learn more</a>
                                                </li>
                                            </ul>

                                            <!--end::Nav-->
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                        <i class="flaticon2-cross"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="225">
                                <div class="kt-chat__messages kt-chat__messages--solid">
                                    <div class="kt-chat__message kt-chat__message--success">
                                        <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="assets/media/users/100_12.jpg" alt="image">
												</span>
                                            <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                            <span class="kt-chat__datetime">2 Hours</span>
                                        </div>
                                        <div class="kt-chat__text">
                                            How likely are you to recommend our company<br> to your friends and family?
                                        </div>
                                    </div>
                                    <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                        <div class="kt-chat__user">
                                            <span class="kt-chat__datetime">30 Seconds</span>
                                            <a href="#" class="kt-chat__username">You</span></a>
                                            <span class="kt-media kt-media--circle kt-media--sm">
													<img src="assets/media/users/300_21.jpg" alt="image">
												</span>
                                        </div>
                                        <div class="kt-chat__text">
                                            Hey there, we’re just writing to let you know that you’ve<br> been
                                            subscribed to a repository on GitHub.
                                        </div>
                                    </div>
                                    <div class="kt-chat__message kt-chat__message--success">
                                        <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="assets/media/users/100_12.jpg" alt="image">
												</span>
                                            <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                            <span class="kt-chat__datetime">30 Seconds</span>
                                        </div>
                                        <div class="kt-chat__text">
                                            Ok, Understood!
                                        </div>
                                    </div>
                                    <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                        <div class="kt-chat__user">
                                            <span class="kt-chat__datetime">Just Now</span>
                                            <a href="#" class="kt-chat__username">You</span></a>
                                            <span class="kt-media kt-media--circle kt-media--sm">
													<img src="assets/media/users/300_21.jpg" alt="image">
												</span>
                                        </div>
                                        <div class="kt-chat__text">
                                            You’ll receive notifications for all issues, pull requests!
                                        </div>
                                    </div>
                                    <div class="kt-chat__message kt-chat__message--success">
                                        <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="assets/media/users/100_12.jpg" alt="image">
												</span>
                                            <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                            <span class="kt-chat__datetime">2 Hours</span>
                                        </div>
                                        <div class="kt-chat__text">
                                            You were automatically <b class="kt-font-brand">subscribed</b> <br>because
                                            you’ve been given access to the repository
                                        </div>
                                    </div>
                                    <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                        <div class="kt-chat__user">
                                            <span class="kt-chat__datetime">30 Seconds</span>
                                            <a href="#" class="kt-chat__username">You</span></a>
                                            <span class="kt-media kt-media--circle kt-media--sm">
													<img src="assets/media/users/300_21.jpg" alt="image">
												</span>
                                        </div>
                                        <div class="kt-chat__text">
                                            You can unwatch this repository immediately <br>by clicking here: <a
                                                href="#" class="kt-font-bold kt-link"></a>
                                        </div>
                                    </div>
                                    <div class="kt-chat__message kt-chat__message--success">
                                        <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="assets/media/users/100_12.jpg" alt="image">
												</span>
                                            <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                            <span class="kt-chat__datetime">30 Seconds</span>
                                        </div>
                                        <div class="kt-chat__text">
                                            Discover what students who viewed Learn <br>Figma - UI/UX Design Essential
                                            Training also viewed
                                        </div>
                                    </div>
                                    <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                        <div class="kt-chat__user">
                                            <span class="kt-chat__datetime">Just Now</span>
                                            <a href="#" class="kt-chat__username">You</span></a>
                                            <span class="kt-media kt-media--circle kt-media--sm">
													<img src="assets/media/users/300_21.jpg" alt="image">
												</span>
                                        </div>
                                        <div class="kt-chat__text">
                                            Most purchased Business courses during this sale!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-chat__input">
                                <div class="kt-chat__editor">
                                    <textarea placeholder="Type here..." style="height: 50px"></textarea>
                                </div>
                                <div class="kt-chat__toolbar">
                                    <div class="kt_chat__tools">
                                        <a href="#"><i class="flaticon2-link"></i></a>
                                        <a href="#"><i class="flaticon2-photograph"></i></a>
                                        <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                    </div>
                                    <div class="kt_chat__actions">
                                        <button type="button"
                                                class="btn btn-brand btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">
                                            reply
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

