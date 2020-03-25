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
                                        <img class="kt-widget__img kt-hidden-"
                                             src="{{asset('assets/media/gym/gym-marketing.jpeg')}}" alt="image"
                                             style="height: 100%;">
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
                                </span>
                            </div>
                            <div class="kt-widget14__content">
                                <div class="kt-widget14__chart">
                                    <div class="kt-widget14__stat"> {{ $totalCalls }}</div>
                                    <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                                </div>
                                <div class="kt-widget14__legends">
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-success"></span>
                                        <span
                                            class="kt-widget14__stats">{{ $callsForAppointments }} Appointment Calls</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                        <span class="kt-widget14__stats">{{ $transferCalls }} Transfered Calls</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-danger"></span>
                                        <span class="kt-widget14__stats">{{ $failedCalls }} Failed Calls</span>
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
                            </div>
                            <div class="kt-widget14__content">
                                <div class="kt-widget14__chart">
                                    <div id="kt_chart_revenue_change" style="height: 150px; width: 150px;"></div>
                                </div>
                                <div class="kt-widget14__legends">
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                        <span class="kt-widget14__stats">{{ $leads }} Total Leads</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-success"></span>
                                        <span class="kt-widget14__stats">{{$activeMembers}}  Active Members</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-warning"></span>
                                        <span class="kt-widget14__stats">{{$inActiveMembers}}  In-Active Members</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                        <span class="kt-widget14__stats">{{ $expiredMembers }} Expired Members</span>
                                    </div>
                                    <div class="kt-widget14__legend">
                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                        <span
                                            class="kt-widget14__stats">{{ $notJoinedMembers }} Not Joined Members</span>
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
                                    Calls & Demo
                                </h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Employee</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Transfer Status</th>
                                    <th>Transfered</th>
                                    <th>Re-Schedule Date</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($assignTasksEmployee as $row)
                                    <tr>
                                        <th>{{$i}}</th>
                                        <td>@if($row->employee != NULL) {{ $row->employee->name }} @else --- @endif</td>
                                        <td>@if($row->member != NULL) {{ $row->member->name }} @else --- @endif</td>
                                        <td>{{ $row->scheduleDate }}</td>
                                        <td>{{ $row->transferStatus }}</td>
                                        <td>@if($row->transferEmployee != NULL) {{ $row->transferEmployee->name }} @else
                                                --- @endif</td>
                                        <td>@if($row->reScheduleDate != NULL) {{ $row->reScheduleDate }} @else
                                                --- @endif</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{ $row->type }}</td>
                                        <?php  $i++; ?>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="9" align="center">
                                        {{ $assignTasksEmployee->links() }}
                                    </td>
                                </tr>
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
