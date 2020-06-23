@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!--Begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Timeline v2
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <div class="kt-timeline-v1 kt-timeline-v1--justified">
                                <div class="kt-timeline-v1__items">
                                    <div class="kt-timeline-v1__marker"></div>
                                    @foreach($notification as $row)
                                    <div class="kt-timeline-v1__item kt-timeline-v1__item--first">
                                        <div class="kt-timeline-v1__item-circle">
                                            <div class="kt-bg-danger"></div>
                                        </div>
                                        <span class="kt-timeline-v1__item-time kt-font-brand">
                                            <span>{{ date('H:i:s', strtotime($row->created_at)) }}</span>
														</span>
                                        <div class="kt-timeline-v1__item-content">
                                            <div class="kt-timeline-v1__item-title">
                                                {{ $row->data }}
                                            </div>
                                            <div class="kt-timeline-v1__item-body">
                                                <p>
{{--                                                    {{ $notification->data['letter']['body'] }}--}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
