@extends('_layouts.index')
@section('content')
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <!--Begin::Row-->
        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-lg">
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::Total Profit-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Memberships
                                    </h4>
                                    <span class="kt-widget24__desc">
                                        Custom Review
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-brand">
                                    {{$memberships}}
                                </span>
                            </div>
                            <div class="progress progress--sm">
                                <div class="progress-bar kt-bg-brand progress-bar-striped progress-bar-animated"
                                     role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    Change
                                </span>
                                <span class="kt-widget24__number">
                                    -
                                </span>
                            </div>
                        </div>
                        <!--end::Total Profit-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Feedbacks-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Employees
                                    </h4>
                                    <span class="kt-widget24__desc">
                                      Custom Review
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-warning">
                                    {{$employees}}
                                </span>
                            </div>
                            <div class="progress progress--sm">
                                <div class="progress-bar kt-bg-warning progress-bar-striped progress-bar-animated"
                                     role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    Change
                                </span>
                                <span class="kt-widget24__number">
                                   -
                                </span>
                            </div>
                        </div>
                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Orders-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Members
                                    </h4>
                                    <span class="kt-widget24__desc">
                                        Custom Review
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-danger">
                                    {{$members}}
                                </span>
                            </div>
                            <div class="progress progress--sm">
                                <div class="progress-bar kt-bg-danger progress-bar-striped progress-bar-animated"
                                     role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    Change
                                </span>
                                <span class="kt-widget24__number">
                                    -
                                </span>
                            </div>
                        </div>
                        <!--end::New Orders-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Users-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Trainers
                                    </h4>
                                    <span class="kt-widget24__desc">
                                        Custom Review
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-success">
                                    {{$trainers}}
                                </span>
                            </div>
                            <div class="progress progress--sm">
                                <div class="progress-bar kt-bg-success progress-bar-striped progress-bar-animated"
                                     role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    Change
                                </span>
                                <span class="kt-widget24__number">
                                   -
                                </span>
                            </div>
                        </div>
                        <!--end::New Users-->
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding mt-2 row-col-separator-lg">

                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Users-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Supplier
                                    </h4>
                                    <span class="kt-widget24__desc">
                                        Custom Review
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-success">
                                    {{$supplier}}
                                </span>
                            </div>
                            <div class="progress progress--sm">
                                <div class="progress-bar kt-bg-success progress-bar-striped progress-bar-animated"
                                     role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    Change
                                </span>
                                <span class="kt-widget24__number">
                                   -
                                </span>
                            </div>
                        </div>
                        <!--end::New Users-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Orders-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Leads
                                    </h4>
                                    <span class="kt-widget24__desc">
                                        Custom Review
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-danger">
                                    {{$leads}}
                                </span>
                            </div>
                            <div class="progress progress--sm">
                                <div class="progress-bar kt-bg-danger progress-bar-striped progress-bar-animated"
                                     role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    Change
                                </span>
                                <span class="kt-widget24__number">
                                    -
                                </span>
                            </div>
                        </div>
                        <!--end::New Orders-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Feedbacks-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Parent Members
                                    </h4>
                                    <span class="kt-widget24__desc">
                                        Custom Review
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-warning">
                                    {{$parentMembers}}
                                </span>
                            </div>
                            <div class="progress progress--sm">
                                <div class="progress-bar kt-bg-warning progress-bar-striped progress-bar-animated"
                                     role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    Change
                                </span>
                                <span class="kt-widget24__number">
                                   -
                                </span>
                            </div>
                        </div>
                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::Total Profit-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Child Members
                                    </h4>
                                    <span class="kt-widget24__desc">
                                        Custom Review
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-brand">
                                    {{$childMembers}}
                                </span>
                            </div>
                            <div class="progress progress--sm">
                                <div class="progress-bar kt-bg-brand progress-bar-striped progress-bar-animated"
                                     role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    Change
                                </span>
                                <span class="kt-widget24__number">
                                    -
                                </span>
                            </div>
                        </div>
                        <!--end::Total Profit-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 order-lg-3 order-xl-1">
                <!--begin:: Widgets/New Users-->
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Logs
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
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab2_content" role="tab">--}}
{{--                                        All--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget4_tab1_content">
                                <div class="kt-scroll" data-scroll="true" style="height: 400px">
                                    @foreach($todayLogs  as $key => $row)
                                        <div class="kt-widget4 mt-3">
                                            <div class="kt-widget4__item">
                                                <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                    @if($row->employee->userImage != "")
                                                        <img
                                                            src="{{ URL::to('/') }}/{{ $row->employee->userImage->path }}">
                                                    @else
                                                        <img src="{{asset('assets/media/users/100_12.jpg')}}" alt="">
                                                    @endif
                                                </div>
                                                <div class="kt-widget4__info">
                                                    <a href="#" class="kt-widget4__username">
                                                        {{ $row->activity }}
                                                    </a>
                                                    <p class="kt-widget4__text">
                                                        {{ $row->employee->name }}
                                                    </p>
                                                </div>
                                                <div class="kt-section__content kt-section__content--solid">
                                                    @if($key %2 == 0)
                                                        <span
                                                            class="btn btn-label-success btn-pill">{{ $row->created_at }}</span>
                                                    @else
                                                        <span
                                                            class="btn btn-label-warning btn-pill">{{ $row->created_at }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
{{--                            <div class="tab-pane" id="kt_widget4_tab2_content">--}}
{{--                                <div class="kt-scroll" data-scroll="true" style="height: 400px">--}}
{{--                                    @foreach($activityLogs  as $key => $row)--}}
{{--                                        <div class="kt-widget4 mt-3">--}}
{{--                                            <div class="kt-widget4__item">--}}
{{--                                                <div class="kt-widget4__pic kt-widget4__pic--pic">--}}
{{--                                                    @if($row->employee->userImage != "")--}}
{{--                                                        <img--}}
{{--                                                            src="{{ URL::to('/') }}/{{ $row->employee->userImage->path }}">--}}
{{--                                                    @else--}}
{{--                                                        <img src="{{asset('assets/media/users/100_12.jpg')}}" alt="">--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                                <div class="kt-widget4__info">--}}
{{--                                                    <a href="#" class="kt-widget4__username">--}}
{{--                                                        {{ $row->activity }}--}}
{{--                                                    </a>--}}
{{--                                                    <p class="kt-widget4__text">--}}
{{--                                                        {{ $row->employee->name }}--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                                <div class="kt-section__content kt-section__content--solid">--}}
{{--                                                    @if($key %2 == 0)--}}
{{--                                                        <span--}}
{{--                                                            class="btn btn-label-info btn-pill">{{ $row->created_at }}</span>--}}
{{--                                                    @else--}}
{{--                                                        <span--}}
{{--                                                            class="btn btn-label-danger btn-pill">{{ $row->created_at }}</span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/New Users-->
            </div>
            <div class="col-xl-6 col-lg-6 order-lg-3 order-xl-1">
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
                                        All
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget2_tab1_content">
                                <div class="kt-scroll" data-scroll="true" style="height: 400px">
                                    @foreach($todayTask  as $key => $row)
                                        <div class="kt-widget4 mt-3">
                                            <div class="kt-widget4__item">
                                                <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                    @if($row->employee->userImage != "")
                                                        <img
                                                            src="{{ URL::to('/') }}/{{ $row->employee->userImage->path }}">
                                                    @else
                                                        <img src="{{asset('assets/media/users/100_12.jpg')}}" alt="">
                                                    @endif
                                                </div>
                                                <div class="kt-widget4__info">
                                                    <a href="#" class="kt-widget4__username">
                                                        {{ $row->employee->name }}
                                                    </a>
                                                    <p class="kt-widget4__text">
                                                        {{ $row->stage }}
                                                    </p>
                                                    <span>{{ $row->scheduleDate }}</span>
                                                </div>
                                                <div class="kt-section__content kt-section__content--solid">
                                                    @if($key %2 == 0)
                                                        <span class="btn btn-label-danger btn-pill">
                                                            {{ $row->created_at }}
                                                        </span>
                                                    @else
                                                        <span class="btn btn-label-success btn-pill">
                                                            {{ $row->created_at }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget2_tab2_content">
                                <div class="kt-scroll" data-scroll="true" style="height: 400px">
                                    @foreach($allTask  as $key => $row)
                                        <div class="kt-widget4 mt-3">
                                            <div class="kt-widget4__item">
                                                <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                    @if($row->employee->userImage != "")
                                                        <img
                                                            src="{{ URL::to('/') }}/{{ $row->employee->userImage->path }}">
                                                    @else
                                                        <img src="{{asset('assets/media/users/100_12.jpg')}}" alt="">
                                                    @endif
                                                </div>
                                                <div class="kt-widget4__info">
                                                    <a href="#" class="kt-widget4__username">
                                                        {{ $row->employee->name }}
                                                    </a>
                                                    <p class="kt-widget4__text">
                                                        {{ $row->stage }}
                                                    </p>
                                                    <span>{{ $row->scheduleDate }}</span>
                                                </div>
                                                <div class="kt-section__content kt-section__content--solid">
                                                    @if($key %2 == 0)
                                                        <span
                                                            class="btn btn-label-warning btn-pill">{{ $row->created_at }}</span>
                                                    @else
                                                        <span
                                                            class="btn btn-label-primary btn-pill">{{ $row->created_at }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Tasks -->
            </div>
        </div>
        <!--End::Row-->
        <!--End::Dashboard 1-->
    </div>
    <!-- end:: Content -->
@endsection
@section('custom-script')

    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>

@endsection



