@extends('_layouts.index')
@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/fullcalendar.bundle.css')}}">
@endsection
@section('content')
    <!-- end:: Header -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!--Begin::Dashboard 2-->
            <!--Begin::Row-->
            <div class="kt-portlet">
                <div class="kt-portlet__body  kt-portlet__body--fit">
                    <div class="row row-no-padding row-col-separator-lg">
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::Total Profit-->
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <h4 class="kt-widget24__title">
                                            Owner Leads
                                        </h4>
                                        <span class="kt-widget24__desc">
                                            Count
                                        </span>
                                    </div>
                                    <span class="kt-widget24__stats kt-font-brand">
                                        {{ $totalLead }}
                                    </span>
                                </div>
                                <div class="progress progress--sm">
                                    @if($total > 0)
                                        <div class="progress-bar kt-bg-brand" role="progressbar"
                                             style="width: {{ number_format($totalLead/$total * 100 , 0, '.', ',')  }}%;"
                                             aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    @else
                                        <div class="progress-bar kt-bg-brand" role="progressbar"
                                             style="width:0%;"
                                             aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    @endif
                                </div>
                                <div class="kt-widget24__action"><span class="kt-widget24__change"></span>
                                    <span class="kt-widget24__number">
                                    @if($total > 0)
                                            {{ number_format($totalLead/$total * 100 , 2, '.', ',')  }} %
                                        @else
                                            <b>0</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <!--end::Total Profit-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Feedbacks-->
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <h4 class="kt-widget24__title">
                                            Hot Rating
                                        </h4>
                                        <span class="kt-widget24__desc">
                                            Count
                                        </span>
                                    </div>
                                    <span class="kt-widget24__stats kt-font-warning">
                                        {{$hotRating}}
                                    </span>
                                </div>
                                <div class="progress progress--sm">
                                    @if($total > 0)
                                        <div class="progress-bar kt-bg-warning" role="progressbar"
                                             style="width: {{ number_format($hotRating/$total * 100 , 0, '.', ',')  }}%"
                                             aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    @else
                                        <div class="progress-bar kt-bg-brand" role="progressbar"
                                             style="width:0%;"
                                             aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    @endif
                                </div>
                                <div class="kt-widget24__action">
                                    <span class="kt-widget24__change"></span>
                                    <span class="kt-widget24__number">
                                         @if($total > 0)
                                            {{ number_format($hotRating/$total * 100 , 2, '.', ',')  }} %
                                        @else
                                            <b>0</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <!--end::New Feedbacks-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Users-->
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <h4 class="kt-widget24__title">
                                            New Members
                                        </h4>
                                        <span class="kt-widget24__desc">
                                            Joined User
                                        </span>
                                    </div>
                                    <span class="kt-widget24__stats kt-font-success">
                                        {{ $totalMember }}
                                    </span>
                                </div>
                                <div class="progress progress--sm">
                                    @if($total > 0)
                                        <div class="progress-bar kt-bg-success" role="progressbar"
                                             style="width: {{ number_format($totalMember/$total * 100 , 0, '.', ',')  }}%;"
                                             aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    @else
                                        <div class="progress-bar kt-bg-brand" role="progressbar"
                                             style="width:0%;"
                                             aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    @endif
                                </div>
                                <div class="kt-widget24__action">
                                    <span class="kt-widget24__change">
                                        Change
                                    </span>
                                    <span class="kt-widget24__number">
                                        @if($total > 0)
                                            {{ number_format($totalMember/$total * 100 , 2, '.', ',')  }} %
                                        @else
                                            <b>0</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <!--end::New Users-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <!--begin:: Widgets/Profit Share-->
                    <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow memberDashboardBigBox">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path
                                                d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z"
                                                fill="#000000"/>
                                            <path
                                                d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                fill="#000000"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__content">
                                            <div class="kt-widget14__chart">
                                                <div class="kt-widget14__stat"> {{ $totalCalls }}</div>
                                                <canvas id="kt_chart_profit_share"
                                                        style="height: 140px; width: 140px;"></canvas>
                                                <input type="hidden" id="appointmentCalls"
                                                       value="{{ $appointmentScheduled }}">
                                                <input type="hidden" id="transferCalls" value="{{ $transferCalls }}">
                                                <input type="hidden" id="failedCalls" value="{{ $failedCalls }}">
                                                <input type="hidden" id="presentationScheduled"
                                                       value="{{ $presentationScheduled }}">
                                                <input type="hidden" id="contractSent" value="{{ $contractSent }}">
                                                <input type="hidden" id="qualifiedToBuy" value="{{ $qualifiedToBuy }}">
                                            </div>
                                            <div class="kt-widget14__legends">
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-success"></span>
                                                    <span
                                                        class="kt-widget14__stats">{{ $appointmentScheduled }} Appointment Scheduled</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-danger"></span>
                                                    <span class="kt-widget14__stats">{{ $transferCalls }} Transfered Calls</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                    <span
                                                        class="kt-widget14__stats">{{ $failedCalls }} Failed Calls</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                    <span
                                                        class="kt-widget14__stats">{{ $presentationScheduled }} Presentation Scheduled</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-primary"></span>
                                                    <span
                                                        class="kt-widget14__stats">{{ $contractSent }} Contract Sent</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-success"></span>
                                                    <span
                                                        class="kt-widget14__stats">{{ $qualifiedToBuy }} Qualified To Buy</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Profit Share-->
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="kt-portlet kt-iconbox kt-iconbox--warning kt-iconbox--animate-fast memberDashboardBigBox">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path
                                                d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                fill="#000000"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__content">
                                            <div class="kt-widget14__chart">
                                                <div id="kt_chart_revenue_change"
                                                     style="height: 150px; width: 150px;"></div>
                                                <input type="hidden" id="leadValue" value="{{$leads}}">
                                                <input type="hidden" id="activeMembers" value="{{$activeMembers}}">
                                                <input type="hidden" id="inActiveMembers" value="{{$inActiveMembers}}">
                                                <input type="hidden" id="expiredMembers" value="{{$expiredMembers}}">
                                                <input type="hidden" id="notJoinedMembers"
                                                       value="{{$notJoinedMembers}}">
                                            </div>
                                            <div class="kt-widget14__legends">
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-success"></span>
                                                    <span class="kt-widget14__stats">{{ $leads }} Total Leads</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-danger"></span>
                                                    <span
                                                        class="kt-widget14__stats">{{$activeMembers}}  Active Members</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                    <span class="kt-widget14__stats">{{$inActiveMembers}}  In-Active Members</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-success"></span>
                                                    <span class="kt-widget14__stats">{{ $expiredMembers }} Expired Members</span>
                                                </div>
                                                <div class="kt-widget14__legend">
                                                    <span class="kt-widget14__bullet kt-bg-danger"></span>
                                                    <span
                                                        class="kt-widget14__stats">{{ $notJoinedMembers }} Not Joined Members</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-8 ">
                    <div class="kt-iconbox__icon">
                        <h6>
                            All Tasks
                        </h6>
                    </div>
                    <div class="kt-portlet kt-iconbox kt-iconbox--brand kt-iconbox--animate-slower memberDashboardSmallBox">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__desc" style="width: 100%;">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-light--info">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Employee</th>
                                                <th>Customer</th>
                                                <th>Stage</th>
                                                <th>Date</th>
                                                <th>Transfer Stage</th>
                                                <th>Transfered</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            @foreach($assignTasksEmployee as $row)
                                                <tr>
                                                    <th>{{$i}}</th>
                                                    <td>@if($row->employee != NULL) {{ $row->employee->name }} @else
                                                            --- @endif</td>
                                                    <td>@if($row->member != NULL) {{ $row->member->name }} @else
                                                            --- @endif</td>
                                                    <td>{{ $row->stage }}</td>
                                                    <td>{{ $row->scheduleDate }}</td>
                                                    <td>{{ $row->transferStage }}</td>
                                                    <td>@if($row->transferEmployee != NULL) {{ $row->transferEmployee->name }} @else
                                                            --- @endif</td>
                                                    <td>@if($row->reScheduleDate != NULL) {{ $row->reScheduleDate }} @else
                                                            --- @endif</td>
                                                    <td>{{ $row->status }}</td>
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
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1 order-xl-1">
                    <div class="kt-iconbox__icon">
                        <h6>
                            Today Activities
                        </h6>
                    </div>
                    <div class="kt-portlet kt-iconbox kt-iconbox--danger kt-iconbox--animate-faster memberDashboardSmallBox">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__desc">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="kt-portlet__body">
                                                <div class="kt-portlet__head-label">
                                                    <h6 class="kt-portlet__head-title">
                                                        <u> Schaduale </u>
                                                    </h6><br>
                                                </div>
                                                <!--Begin::Timeline 3 -->
                                                <div class="kt-timeline-v2">
                                                    <div
                                                        class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                                                        @foreach($dailySchaduale as $activity)
                                                            <div class="kt-timeline-v2__item">
                                                                <span class="kt-timeline-v2__item-time">
                                                                        {{ \Carbon\Carbon::parse($activity->scheduleDate)->format('H:i')}}
                                                                </span>
                                                                <div class="kt-timeline-v2__item-cricle">
                                                                    <i class="fa fa-genderless kt-font-danger"></i>
                                                                </div>
                                                                <div
                                                                    class="kt-timeline-v2__item-text  kt-padding-top-5">
                                                                    {{ $activity->stage }}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="kt-portlet__body">
                                                <div class="kt-portlet__head-label">
                                                    <h6 class="kt-portlet__head-title">
                                                        <u> Re-Schaduale </u>
                                                    </h6>
                                                </div>
                                                <br>
                                                <!--Begin::Timeline 3 -->
                                                <div class="kt-timeline-v2">
                                                    <div
                                                        class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                                                        @foreach($dailyReSchaduale as $activity)
                                                            <div class="kt-timeline-v2__item">
                                                                <span
                                                                    class="kt-timeline-v2__item-time">{{ \Carbon\Carbon::parse($activity->reScheduleDate)->format('H:i')}}</span>
                                                                <div class="kt-timeline-v2__item-cricle">
                                                                    <i class="fa fa-genderless kt-font-danger"></i>
                                                                </div>
                                                                <div
                                                                    class="kt-timeline-v2__item-text  kt-padding-top-5">
                                                                    {{ $activity->transferStage }}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
