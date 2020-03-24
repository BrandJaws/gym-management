@extends('_layouts.index')
@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/fullcalendar.bundle.css')}}">
@endsection
@section('content')
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
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" class="btn btn-clean btn-icon" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                <span class="kt-nav__link-text">Reports</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-4">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/gym-marketing.jpeg')}}" alt="image" style="height: 100%;">
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                Total Memberships
                                            </a>
                                            <div class="kt-widget__button">
                                                <h2>{{$memberships}}</h2>
                                            </div>
                                            <div class="kt-widget__button">
                                                <span class="btn btn-label-warning btn-sm">Active</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>
{{--                    <div class="kt-portlet kt-portlet--height-fluid">--}}
{{--                        <div class="kt-widget14">--}}
{{--                            <div class="kt-widget14__header kt-margin-b-30">--}}
{{--                                <h3 class="kt-widget14__title">--}}
{{--                                    Memberships--}}
{{--                                </h3>--}}
{{--                                <span class="kt-widget14__desc">--}}
{{--                                    Check out each collumn for more details--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                            <div class="kt-widget14__chart" style="height:120px;">--}}
{{--                                <canvas id="kt_chart_daily_sales"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!--end:: Widgets/Daily Sales-->
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--begin:: Widgets/Profit Share-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-widget14">
                            <div class="kt-widget14__header">
                                <h3 class="kt-widget14__title">
                                     Calls
                                </h3>
                                <span class="kt-widget14__desc">
                                    Profit Share between customers
                                </span>
                            </div>
                            <div class="kt-widget14__content">
                                <div class="kt-widget14__chart">
                                    <div class="kt-widget14__stat">{{$totalCalls}}</div>
                                    <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                                </div>
                                <div class="kt-widget14__legends">
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-success"></span>
                                        <span class="kt-widget14__stats">{{$callsForAppointments}} Total Calls</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-warning"></span>
                                        <span class="kt-widget14__stats">{{$callsTransfered}} Appointment Calls</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                        <span class="kt-widget14__stats">{{$failedCalls}} Transfered Calls</span>
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
                                    Members
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
                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                        <span class="kt-widget14__stats">{{$joinedMembers}} Expired Members</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-success"></span>
                                        <span class="kt-widget14__stats">{{$notComingMembers}} In Active Members</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-warning"></span>
                                        <span class="kt-widget14__stats">{{$leadMembers}} Not Joined Members</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                        <span class="kt-widget14__stats">{{$notLivedMembers}} Expired Members</span>
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
                <div class="col-xl-12 col-lg-12">
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
                        <div class="kt-portlet__body">

                            <!--begin: Datatable -->
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#id</th>
                                    <th>Gym</th>
                                    <th>Employee</th>
                                    <th>Customer</th>
                                    <th>Transfered</th>
                                    <th>Status</th>
                                    <th>Transfer Status</th>
                                    <th>Interseted Packages</th>
                                    <th>Remarks</th>
                                    <th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assignTasksEmployee as $row)
                                    <tr>
                                        <th scope="row">{{$row->id}}</th>
                                        <td>{{$row->gym_id}}</td>
                                        <td>{{$row->employee_id}}</td>
                                        <td>{{ $row->customer_id }}</td>
                                        <td>{{ $row->transfer_id }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{ $row->transferStatus }}</td>
                                        <td>{{ $row->intersetedPackages }}</td>
                                        <td>{{ $row->remarks }}</td>
                                        <td>{{ $row->type }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
            </div>
            <!--End::Row-->
            <!--End::Dashboard 2-->
        </div>
        <!-- end:: Content -->
    </div>
@endsection

@section('custom-script')
    <script src="{{asset('js/fullcalendar.bundle.js')}}"></script>
    <script src="{{asset('js/gmaps.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
@endsection
