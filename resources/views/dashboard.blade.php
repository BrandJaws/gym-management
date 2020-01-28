@extends('_layouts.index')
@section('content-header')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Dashboard</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <span class="kt-subheader__desc">#XRS-45670</span>
                <a href="#" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">
                    Add New
                </a>
                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                        <span><i class="flaticon2-search-1"></i></span>
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn kt-subheader__btn-secondary">Today</a>
                    <a href="#" class="btn kt-subheader__btn-secondary">Month</a>
                    <a href="#" class="btn kt-subheader__btn-secondary">Year</a>
                    <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker"
                       data-toggle="kt-tooltip" title="Select dashboard daterange" data-placement="left">
                        <span class="kt-subheader__btn-daterange-title"
                              id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
                        <span class="kt-subheader__btn-daterange-date"
                              id="kt_dashboard_daterangepicker_date">Aug 16</span>
                        <i class="flaticon2-calendar-1"></i>
                    </a>
                    <div class="dropdown dropdown-inline" data-toggle-="kt-tooltip" title="Quick actions"
                         data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                 class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path
                                        d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path
                                        d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                        fill="#000000"/>
                                </g>
                            </svg>
                            <!--<i class="flaticon2-plus"></i>-->
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">
                            <!--begin::Nav-->
                            <ul class="kt-nav">
                                <li class="kt-nav__head">
                                    Add anything or jump to:
                                    <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right"
                                       title="Click to learn more..."></i>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                        <span class="kt-nav__link-text">Order</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                        <span class="kt-nav__link-text">Ticket</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                        <span class="kt-nav__link-text">Goal</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                        <span class="kt-nav__link-text">Support Case</span>
                                        <span class="kt-nav__link-badge">
                                            <span class="kt-badge kt-badge--brand kt-badge--rounded">5</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__foot">
                                    <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                    <a class="btn btn-clean btn-bold btn-sm kt-hidden" href="#" data-toggle="kt-tooltip"
                                       data-placement="right" title="Click to learn more...">Learn more</a>
                                </li>
                            </ul>
                            <!--end::Nav-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <!--Begin::Row-->
        <div class="row">
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <!--begin:: Widgets/Activity-->
                <div
                    class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Activity</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle"
                               data-toggle="dropdown">Export</a>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__section kt-nav__section--first">
                                        <span class="kt-nav__section-text">Finance</span>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                            <span class="kt-nav__link-text">Statistics</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                            <span class="kt-nav__link-text">Events</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                            <span class="kt-nav__link-text">Reports</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__section">
                                        <span class="kt-nav__section-text">Customers</span>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                            <span class="kt-nav__link-text">Notifications</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                            <span class="kt-nav__link-text">Files</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-widget17">
                            <div
                                class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides"
                                style="background-color: #fd397a">
                                <div class="kt-widget17__chart" style="height:320px;">
                                    <canvas id="kt_chart_activities"></canvas>
                                </div>
                            </div>
                            <div class="kt-widget17__stats">
                                <div class="kt-widget17__items">
                                    <div class="kt-widget17__item">
                                        <span class="kt-widget17__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                        fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                          x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="kt-widget17__subtitle">Delivered</span>
                                        <span class="kt-widget17__desc">15 New Paskages</span>
                                    </div>
                                    <div class="kt-widget17__item">
                                        <span class="kt-widget17__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--success">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path
                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
                                                    <path
                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="kt-widget17__subtitle">Ordered</span>
                                        <span class="kt-widget17__desc">72 New Items</span>
                                    </div>
                                </div>
                                <div class="kt-widget17__items">
                                    <div class="kt-widget17__item">
															<span class="kt-widget17__icon">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1"
                                                                     class="kt-svg-icon kt-svg-icon--warning">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z"
                                                                            fill="#000000"/>
																	</g>
																</svg> </span>
                                        <span class="kt-widget17__subtitle">
																Reported
															</span>
                                        <span class="kt-widget17__desc">
																72 Support Cases
															</span>
                                    </div>
                                    <div class="kt-widget17__item">
															<span class="kt-widget17__icon">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1"
                                                                     class="kt-svg-icon kt-svg-icon--danger">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                            fill="#000000"/>
																	</g>
																</svg> </span>
                                        <span class="kt-widget17__subtitle">
																Arrived
															</span>
                                        <span class="kt-widget17__desc">
																34 Upgraded Boxes
															</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Activity-->
            </div>
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

                <!--begin:: Widgets/Inbound Bandwidth-->
                <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half">
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
                <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half">
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
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

                <!--Begin::Portlet-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Recent Activities
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon-more-1"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">

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
                                                </svg>
                                            </span>
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
                                                    <span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__separator"></li>
                                        <li class="kt-nav__foot">
                                            <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
                                            <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip"
                                               data-placement="right" title="Click to learn more...">Learn more</a>
                                        </li>
                                    </ul>

                                    <!--end::Nav-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--Begin::Timeline 3 -->
                        <div class="kt-timeline-v2">
                            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time">10:00</span>
                                    <div class="kt-timeline-v2__item-cricle">
                                        <i class="fa fa-genderless kt-font-danger"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text  kt-padding-top-5">
                                        Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                        incididunt ut labore et dolore magna
                                    </div>
                                </div>
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time">12:45</span>
                                    <div class="kt-timeline-v2__item-cricle">
                                        <i class="fa fa-genderless kt-font-success"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text kt-timeline-v2__item-text--bold">
                                        AEOL Meeting With
                                    </div>
                                    <div class="kt-list-pics kt-list-pics--sm kt-padding-l-20">
                                        <a href="#"><img src="assets/media/users/100_4.jpg" title=""></a>
                                        <a href="#"><img src="assets/media/users/100_13.jpg" title=""></a>
                                        <a href="#"><img src="assets/media/users/100_11.jpg" title=""></a>
                                        <a href="#"><img src="assets/media/users/100_14.jpg" title=""></a>
                                    </div>
                                </div>
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time">14:00</span>
                                    <div class="kt-timeline-v2__item-cricle">
                                        <i class="fa fa-genderless kt-font-brand"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text kt-padding-top-5">
                                        Make Deposit <a href="#" class="kt-link kt-link--brand kt-font-bolder">USD
                                            700</a> To ESL.
                                    </div>
                                </div>
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time">16:00</span>
                                    <div class="kt-timeline-v2__item-cricle">
                                        <i class="fa fa-genderless kt-font-warning"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text kt-padding-top-5">
                                        Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                        incididunt ut labore et dolore magna elit enim at minim<br>
                                        veniam quis nostrud
                                    </div>
                                </div>
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time">17:00</span>
                                    <div class="kt-timeline-v2__item-cricle">
                                        <i class="fa fa-genderless kt-font-info"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text kt-padding-top-5">
                                        Placed a new order in
                                        <a href="#" class="kt-link kt-link--brand kt-font-bolder">SIGNATURE MOBILE</a>
                                        marketplace.
                                    </div>
                                </div>
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time">16:00</span>
                                    <div class="kt-timeline-v2__item-cricle">
                                        <i class="fa fa-genderless kt-font-brand"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text kt-padding-top-5">
                                        Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                        incididunt ut labore et dolore magna elit enim at minim<br>
                                        veniam quis nostrud
                                    </div>
                                </div>
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time">17:00</span>
                                    <div class="kt-timeline-v2__item-cricle">
                                        <i class="fa fa-genderless kt-font-danger"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text kt-padding-top-5">
                                        Received a new feedback on
                                        <a href="#" class="kt-link kt-link--brand kt-font-bolder">FinancePro App</a>
                                        product.
                                    </div>
                                </div>
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time">15:30</span>
                                    <div class="kt-timeline-v2__item-cricle">
                                        <i class="fa fa-genderless kt-font-danger"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text kt-padding-top-5">
                                        New notification message has been received on
                                        <a href="#" class="kt-link kt-link--brand kt-font-bolder">LoopFin Pro</a>
                                        product.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End::Timeline 3 -->
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-8 order-lg-2 order-xl-1">
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
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon-more-1"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">
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
                                                </svg>
                                            </span>
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
                                                    <span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__separator"></li>
                                        <li class="kt-nav__foot">
                                            <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
                                            <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip"
                                               data-placement="right" title="Click to learn more...">Learn more</a>
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
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <!--begin:: Widgets/Blog-->
                <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                    <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                        <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                             style="min-height: 300px; background-image: url(assets/media//products/product4.jpg)">
                            <h3 class="kt-widget19__title kt-font-light">
                                Introducing New Feature
                            </h3>
                            <div class="kt-widget19__shadow"></div>
                            <div class="kt-widget19__labels">
                                <a href="#" class="btn btn-label-light-o2 btn-bold ">Recent</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget19__wrapper">
                            <div class="kt-widget19__content">
                                <div class="kt-widget19__userpic">
                                    <img src="assets/media/users/user1.jpg" alt="">
                                </div>
                                <div class="kt-widget19__info">
                                    <a href="#" class="kt-widget19__username">
                                        Anna Krox
                                    </a>
                                    <span class="kt-widget19__time">
                                        UX/UI Designer, Google
                                    </span>
                                </div>
                                <div class="kt-widget19__stats">
                                    <span class="kt-widget19__number kt-font-brand">
                                        18
                                    </span>
                                    <a href="#" class="kt-widget19__comment">
                                        Comments
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget19__text">
                                Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type
                                specimen book text of the dummy text of the printing printing and typesetting industry
                                scrambled dummy text of the printing.
                            </div>
                        </div>
                        <div class="kt-widget19__action">
                            <a href="#" class="btn btn-sm btn-label-brand btn-bold">Read More...</a>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Blog-->
            </div>
        </div>
        <!--End::Row-->
        <!--Begin::Row-->
        <div class="row">
            <div class="col-xl-8 col-lg-12 order-lg-3 order-xl-1">
                <!--begin:: Widgets/Best Sellers-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Best Sellers
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content"
                                       role="tab">
                                        Latest
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
                                        Month
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab">
                                        All time
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                <div class="kt-widget5">
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product27.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Great Logo Designn
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic admin themes.
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Keenthemes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">19,200</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">1046</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product22.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Branding Mockup
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic bootstrap themes.
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Fly themes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">24,583</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">3809</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product15.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Awesome Mobile App
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic admin themes.Lorem Ipsum Amet
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Fly themes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">210,054</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">1103</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget5_tab2_content">
                                <div class="kt-widget5">
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product10.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Branding Mockup
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic bootstrap themes.
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Fly themes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">24,583</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">3809</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product11.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Awesome Mobile App
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic admin themes.Lorem Ipsum Amet
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Fly themes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">210,054</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">1103</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product6.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Great Logo Designn
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic admin themes.
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Keenthemes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">19,200</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">1046</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget5_tab3_content">
                                <div class="kt-widget5">
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product11.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Awesome Mobile App
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic admin themes.Lorem Ipsum Amet
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Fly themes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">210,054</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">1103</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product6.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Great Logo Designn
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic admin themes.
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Keenthemes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">19,200</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">1046</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="assets/media/products/product10.jpg"
                                                     alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="#" class="kt-widget5__title">
                                                    Branding Mockup
                                                </a>
                                                <p class="kt-widget5__desc">
                                                    Metronic bootstrap themes.
                                                </p>
                                                <div class="kt-widget5__info">
                                                    <span>Author:</span>
                                                    <span class="kt-font-info">Fly themes</span>
                                                    <span>Released:</span>
                                                    <span class="kt-font-info">23.08.17</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">24,583</span>
                                                <span class="kt-widget5__sales">sales</span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number">3809</span>
                                                <span class="kt-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
            <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

                <!--begin:: Widgets/New Users-->
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                New Users
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content"
                                       role="tab">
                                        Today
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab2_content" role="tab">
                                        Month
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget4_tab1_content">
                                <div class="kt-widget4">
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_4.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Anna Strong
                                            </a>
                                            <p class="kt-widget4__text">
                                                Visual Designer,Google Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-brand btn-bold">Follow</a>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_14.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Milano Esco
                                            </a>
                                            <p class="kt-widget4__text">
                                                Product Designer, Apple Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-warning btn-bold">Follow</a>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_11.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Nick Bold
                                            </a>
                                            <p class="kt-widget4__text">
                                                Web Developer, Facebook Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-danger btn-bold">Follow</a>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_1.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Wiltor Delton
                                            </a>
                                            <p class="kt-widget4__text">
                                                Project Manager, Amazon Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-success btn-bold">Follow</a>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_5.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Nick Stone
                                            </a>
                                            <p class="kt-widget4__text">
                                                Visual Designer, Github Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-primary btn-bold">Follow</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget4_tab2_content">
                                <div class="kt-widget4">
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_2.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Kristika Bold
                                            </a>
                                            <p class="kt-widget4__text">
                                                Product Designer,Apple Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-success">Follow</a>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_13.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Ron Silk
                                            </a>
                                            <p class="kt-widget4__text">
                                                Release Manager, Loop Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-brand">Follow</a>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_9.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Nick Bold
                                            </a>
                                            <p class="kt-widget4__text">
                                                Web Developer, Facebook Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-danger">Follow</a>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_2.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Wiltor Delton
                                            </a>
                                            <p class="kt-widget4__text">
                                                Project Manager, Amazon Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-success">Follow</a>
                                    </div>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_8.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                Nick Bold
                                            </a>
                                            <p class="kt-widget4__text">
                                                Web Developer, Facebook Inc
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-info">Follow</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/New Users-->
            </div>
            <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">

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
            <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">

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
                                <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
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
            <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">
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
                                <div id="kt_chart_revenue_change" style="height: 150px; width: 150px;"></div>
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
            <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">
                <!--begin:: Widgets/Tasks -->
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Tasks
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget2_tab1_content"
                                       role="tab">
                                        Today
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget2_tab2_content" role="tab">
                                        Week
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget2_tab3_content" role="tab">
                                        Month
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget2_tab1_content">
                                <div class="kt-widget2">
                                    <div class="kt-widget2__item kt-widget2__item--primary">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Bob
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--warning">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Prepare Docs For Metting On Monday
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Sean
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--brand">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Widgets Development. Estudiat Communy Elit
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Aziko
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--success">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Metronic Development. Lorem Ipsum
                                            </a>
                                            <a class="kt-widget2__username">
                                                By James
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--danger">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Completa Financial Report For Emirates Airlines
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Bob
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--info">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Completa Financial Report For Emirates Airlines
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Sean
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget2_tab2_content">
                                <div class="kt-widget2">
                                    <div class="kt-widget2__item kt-widget2__item--success">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Metronic Development.Lorem Ipsum
                                            </a>
                                            <a class="kt-widget2__username">
                                                By James
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--warning">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Prepare Docs For Metting On Monday
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Sean
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--danger">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Completa Financial Report For Emirates Airlines
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Bob
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--primary">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Bob
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--info">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Completa Financial Report For Emirates Airlines
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Sean
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--brand">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Widgets Development.Estudiat Communy Elit
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Aziko
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget2_tab3_content">
                                <div class="kt-widget2">
                                    <div class="kt-widget2__item kt-widget2__item--warning">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Metronic Development. Lorem Ipsum
                                            </a>
                                            <a class="kt-widget2__username">
                                                By James
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--danger">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Completa Financial Report For Emirates Airlines
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Bob
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--brand">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Widgets Development.Estudiat Communy Elit
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Aziko
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--info">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Completa Financial Report For Emirates Airlines
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Sean
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--success">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Completa Financial Report For Emirates Airlines
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Bob
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                    <div class="kt-widget2__item kt-widget2__item--primary">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a href="#" class="kt-widget2__title">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </a>
                                            <a href="#" class="kt-widget2__username">
                                                By Bob
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                               data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Tasks -->
            </div>
            <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">
                <!--begin:: Widgets/Notifications-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Notifications
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget6_tab1_content"
                                       role="tab">
                                        Latest
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget6_tab2_content" role="tab">
                                        Week
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget6_tab3_content" role="tab">
                                        Month
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget6_tab1_content" aria-expanded="true">
                                <div class="kt-notification">
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                        fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                          x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New order has been received.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                2 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.98630124,11 4.48466491,11.0516454 4,11.1500272 L4,7 C4,5.8954305 4.8954305,5 6,5 L20,5 C21.1045695,5 22,5.8954305 22,7 L22,16 C22,17.1045695 21.1045695,18 20,18 L12.9835977,18 Z M19.1444251,6.83964668 L13,10.1481833 L6.85557487,6.83964668 C6.4908718,6.6432681 6.03602525,6.77972206 5.83964668,7.14442513 C5.6432681,7.5091282 5.77972206,7.96397475 6.14442513,8.16035332 L12.6444251,11.6603533 C12.8664074,11.7798822 13.1335926,11.7798822 13.3555749,11.6603533 L19.8555749,8.16035332 C20.2202779,7.96397475 20.3567319,7.5091282 20.1603533,7.14442513 C19.9639747,6.77972206 19.5091282,6.6432681 19.1444251,6.83964668 Z"
                                                        fill="#000000"/>
                                                    <path
                                                        d="M8.4472136,18.1055728 C8.94119209,18.3525621 9.14141644,18.9532351 8.89442719,19.4472136 C8.64743794,19.9411921 8.0467649,20.1414164 7.5527864,19.8944272 L5,18.618034 L5,14.5 C5,13.9477153 5.44771525,13.5 6,13.5 C6.55228475,13.5 7,13.9477153 7,14.5 L7,17.381966 L8.4472136,18.1055728 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New member is registered and pending for approval.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                3 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <circle fill="#000000" cx="12" cy="9" r="5"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                Membership application has been added.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                3 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path
                                                        d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New report file has been uploaded.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                5 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z"
                                                        fill="#000000"/>
                                                    <path
                                                        d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New user feedback received and pending for review.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                8 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                        fill="#000000"/>
                                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                Database sever #2 has been fully restarted.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                23 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget6_tab2_content" aria-expanded="false">
                                <div class="kt-notification">
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--success">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M9.35321926,16.3736278 L16.3544311,10.3706602 C16.5640654,10.1909158 16.5882961,9.87526197 16.4085517,9.66562759 C16.3922584,9.64662485 16.3745611,9.62887247 16.3556091,9.6125202 L9.35439731,3.57169798 C9.14532254,3.39130299 8.82959492,3.41455255 8.64919993,3.62362732 C8.5708616,3.71442013 8.52776329,3.83034375 8.52776329,3.95026134 L8.52776329,15.9940512 C8.52776329,16.2701936 8.75162092,16.4940512 9.02776329,16.4940512 C9.14714624,16.4940512 9.2625893,16.4513356 9.35321926,16.3736278 Z"
                                                        fill="#000000"
                                                        transform="translate(12.398118, 9.870355) rotate(-450.000000) translate(-12.398118, -9.870355) "/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(12.500000, 17.500000) scale(-1, 1) rotate(-270.000000) translate(-12.500000, -17.500000) "
                                                          x="11" y="11" width="3" height="13" rx="0.5"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New company application has been approved.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                3 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="12" y="4" width="3"
                                                          height="13" rx="1.5"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8"
                                                          rx="1.5"/>
                                                    <path
                                                        d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
                                                    <rect fill="#000000" opacity="0.3" x="17" y="11" width="3"
                                                          height="6" rx="1.5"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New report has been received.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                23 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--danger">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                        fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                          x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New file has been uploaded and pending for review.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                5 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <circle fill="#000000" cx="12" cy="9" r="5"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                Membership application has been added.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                3 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--info">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path
                                                        d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New customer is registered.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                3 days ago
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget6_tab3_content" aria-expanded="false">
                                <div class="kt-notification">
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--warning">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New order has been received.
                                            </div>
                                            <div class="kt-notification__item-time">
                                                2 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--success">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z"
                                                        fill="#000000"/>
                                                    <path
                                                        d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z"
                                                        fill="#000000"/>
                                                    <path
                                                        d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New customer is registered
                                            </div>
                                            <div class="kt-notification__item-time">
                                                3 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--brand">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="2" y="9" width="20"
                                                          height="13" rx="2"/>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="5" width="14" height="2"
                                                          rx="0.5"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="1" width="10" height="2"
                                                          rx="0.5"/>
                                                    <path
                                                        d="M10.8333333,20 C9.82081129,20 9,19.3159906 9,18.4722222 C9,17.6284539 9.82081129,16.9444444 10.8333333,16.9444444 C11.0476105,16.9444444 11.2533018,16.9750785 11.4444444,17.0313779 L11.4444444,12.7916011 C11.4444444,12.4782408 11.6398662,12.2012404 11.9268804,12.1077729 L15.4407693,11.0331119 C15.8834716,10.8889438 16.3333333,11.2336005 16.3333333,11.7169402 L16.3333333,12.7916011 C16.3333333,13.1498215 15.9979332,13.3786009 15.7222222,13.4444444 C15.3255297,13.53918 14.3070112,13.7428837 12.6666667,14.0555556 L12.6666667,18.5035214 C12.6666667,18.5583862 12.6622174,18.6091837 12.6535404,18.6559869 C12.5446237,19.4131089 11.771224,20 10.8333333,20 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                Application has been approved
                                            </div>
                                            <div class="kt-notification__item-time">
                                                3 hrs ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--warning">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect opacity="0.200000003" x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M4.5,7 L9.5,7 C10.3284271,7 11,7.67157288 11,8.5 C11,9.32842712 10.3284271,10 9.5,10 L4.5,10 C3.67157288,10 3,9.32842712 3,8.5 C3,7.67157288 3.67157288,7 4.5,7 Z M13.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L13.5,18 C12.6715729,18 12,17.3284271 12,16.5 C12,15.6715729 12.6715729,15 13.5,15 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M17,11 C15.3431458,11 14,9.65685425 14,8 C14,6.34314575 15.3431458,5 17,5 C18.6568542,5 20,6.34314575 20,8 C20,9.65685425 18.6568542,11 17,11 Z M6,19 C4.34314575,19 3,17.6568542 3,16 C3,14.3431458 4.34314575,13 6,13 C7.65685425,13 9,14.3431458 9,16 C9,17.6568542 7.65685425,19 6,19 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New customer comment recieved
                                            </div>
                                            <div class="kt-notification__item-time">
                                                2 days ago
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1"
                                                 class="kt-svg-icon kt-svg-icon--danger">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                        fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                          x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New customer is registered
                                            </div>
                                            <div class="kt-notification__item-time">
                                                3 days ago
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Notifications-->
            </div>
            <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">
                <!--begin:: Widgets/Support Tickets -->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Support Tickets
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon-md btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon-more-1"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">

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
                                                </svg>
                                            </span>
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
                                                    <span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__separator"></li>
                                        <li class="kt-nav__foot">
                                            <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
                                            <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip"
                                               data-placement="right" title="Click to learn more...">Learn more</a>
                                        </li>
                                    </ul>

                                    <!--end::Nav-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget3">
                            <div class="kt-widget3__item">
                                <div class="kt-widget3__header">
                                    <div class="kt-widget3__user-img">
                                        <img class="kt-widget3__img" src="assets/media/users/user1.jpg" alt="">
                                    </div>
                                    <div class="kt-widget3__info">
                                        <a href="#" class="kt-widget3__username">
                                            Melania Trump
                                        </a><br>
                                        <span class="kt-widget3__time">
                                            2 day ago
                                        </span>
                                    </div>
                                    <span class="kt-widget3__status kt-font-info">
                                        Pending
                                    </span>
                                </div>
                                <div class="kt-widget3__body">
                                    <p class="kt-widget3__text">
                                        Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh
                                        euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                    </p>
                                </div>
                            </div>
                            <div class="kt-widget3__item">
                                <div class="kt-widget3__header">
                                    <div class="kt-widget3__user-img">
                                        <img class="kt-widget3__img" src="assets/media/users/user4.jpg" alt="">
                                    </div>
                                    <div class="kt-widget3__info">
                                        <a href="#" class="kt-widget3__username">
                                            Lebron King James
                                        </a><br>
                                        <span class="kt-widget3__time">
                                            1 day ago
                                        </span>
                                    </div>
                                    <span class="kt-widget3__status kt-font-brand">
                                        Open
                                    </span>
                                </div>
                                <div class="kt-widget3__body">
                                    <p class="kt-widget3__text">
                                        Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh
                                        euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad
                                        minim veniam,quis nostrud exerci tation ullamcorper.
                                    </p>
                                </div>
                            </div>
                            <div class="kt-widget3__item">
                                <div class="kt-widget3__header">
                                    <div class="kt-widget3__user-img">
                                        <img class="kt-widget3__img" src="assets/media/users/user5.jpg" alt="">
                                    </div>
                                    <div class="kt-widget3__info">
                                        <a href="#" class="kt-widget3__username">
                                            Deb Gibson
                                        </a><br>
                                        <span class="kt-widget3__time">
                                            3 weeks ago
                                        </span>
                                    </div>
                                    <span class="kt-widget3__status kt-font-success">
                                        Closed
                                    </span>
                                </div>
                                <div class="kt-widget3__body">
                                    <p class="kt-widget3__text">
                                        Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh
                                        euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Support Tickets -->
            </div>
        </div>
        <!--End::Row-->
        <!--End::Dashboard 1-->
    </div>
    <!-- end:: Content -->
@endsection



