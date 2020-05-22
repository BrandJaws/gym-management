@extends('_layouts.index')
@section('content')
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <!--Begin::Row-->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Portlet-->
                        <div class="kt-portlet" id="kt_portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="flaticon-map-location"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Calendar
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="response"></div>
                                <div id='calendar'></div>
                            </div>
                        </div>

                        <!--end::Portlet-->
                    </div>
                </div>
            </div>

            <!-- end:: Content -->
        </div>
        <!--End::Row-->
        <!--End::Dashboard 1-->
    </div>
    <!-- end:: Content -->
@endsection
@section('custom-script')

    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}"/>
    <script src="{{asset('js/moment.min.js')}}" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ="
            crossorigin="anonymous"></script>
    <script src="{{asset('js/fullcalendar.js')}}"></script>

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

    <script>
        $(document).ready(function () {

            var SITEURL = "{{url('/')}}";
            var guestUrl = "{{url('gym/member/guests/')}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/gym/calendar",

                displayEventTime: true,
                editable: true,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                // select: function (start, end, allDay) {
                //     var title = prompt('Event Title:');
                //
                //     if (title) {
                //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                //         $.ajax({
                //             // url: SITEURL + "/list/create",
                //
                //             data: 'title=' + title + '&amp;start=' + start + '&amp;end=' + end,
                //             type: "POST",
                //             success: function (data) {
                //                 displayMessage("Added Successfully");
                //             }
                //         });
                //         calendar.fullCalendar('renderEvent',
                //             {
                //                 title: title,
                //                 start: start,
                //                 end: end,
                //                 allDay: allDay
                //             },
                //             true
                //         );
                //     }
                //     calendar.fullCalendar('unselect');
                // },

                eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + guestUrl + event.id,
                        data: 'title=' + event.title + '&amp;start=' + start + '&amp;end=' + end + '&amp;id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
                eventClick: function (event) {
                    window.location.href = guestUrl + '/' + event.id;
                    $.ajax({
                        type: "GET",
                        url: guestUrl + '/' + event.id,
                        data: event.id,
                    });
                }

            });
        });

        function displayMessage(message) {
            $(".response").html("<div class='success'>" + message + "</div>");
            setInterval(function () {
                $(".success").fadeOut();
            }, 1000);
        }
    </script>
@endsection



