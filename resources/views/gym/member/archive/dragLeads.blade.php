@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid ">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            List of Leads
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
                                    <li class="kt-nav__separator"></li>
                                    <li class="kt-nav__item"><a  class="kt-nav__link" href="{{route('member.create')}}" ><i class="la la-plus"></i>  &nbsp; Add New Lead</a></li>
                                    <li class="kt-nav__item"><a class="kt-nav__link" href="{{url('/gym/member/archive/leads')}}"> <i class="la la-table"></i> &nbsp; View In Table</a></li>
                                    <li class="kt-nav__item"><a class="kt-nav__link" href="{{url('/gym/member/drag/leads')}}"> <i class="la la-clipboard"></i> &nbsp; All Leads</a></li>
                                    <li class="kt-nav__separator"></li>
                                </ul>
                                <!--end::Nav-->
                            </div>
                        </div>
                    </div>
                </div>
                @include('_layouts.flash-message')
                <div class="row">
                    <div class="col-md-12">
                        <div class="dragLeadsBox">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="sorting">
                                        <h6><b>Call Scheduled<span
                                                    style="float: right;">{{ $callScheduled->count() }}</span></b></h6>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                    </th>
                                    <th class="sorting">
                                        <h6><b>Appointment Scheduled<span
                                                    style="float: right;">{{ $appointmentScheduled->count() }}</span></b>
                                        </h6>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                    </th>
                                    <th class="sorting">
                                        <h6><b>Presentation Scheduled<span
                                                    style="float: right;">{{ $presentationScheduled->count() }}</span></b>
                                        </h6>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                    </th>
                                    <th class="sorting">
                                        <h6><b>Contract Sent<span
                                                    style="float: right;">{{ $contractSent->count() }}</span></b></h6>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                    </th>
                                    <th class="sorting">
                                        <h6><b>Qualified To Buy<span
                                                    style="float: right;">{{ $qualifiedBuy->count() }}</span></b></h6>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                    </th>
                                    <th class="sorting">
                                        <h6><b>Closed Won<span
                                                    style="float: right;">{{ $closedWon->count() }}</span></b></h6>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill bg-none"></span>
                                    </th>
                                    <th class="sorting">
                                        <h6><b>Closed Lost<span
                                                    style="float: right;">{{ $closedLost->count() }}</span></b></h6>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                        <span class="kt-badge kt-badge--danger kt-badge--pill"></span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <ul class="list-group  connectedSortable" id="Call-Scheduled">
                                            <li class="list-group-item inner"></li>
                                            @if(!empty($callScheduled) && $callScheduled->count())
                                                @foreach($callScheduled as $key=>$value)
                                                    <li class="list-group-item "
                                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group  connectedSortable" id="Appointment-Scheduled">
                                            <li class="list-group-item inner"></li>
                                            @if(!empty($appointmentScheduled) && $appointmentScheduled->count())
                                                @foreach($appointmentScheduled as $key=>$value)
                                                    <li class="list-group-item "
                                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group shadow-lg connectedSortable"
                                            id="Presentation-Scheduled">
                                            <li class="list-group-item inner"></li>
                                            @if(!empty($presentationScheduled) && $presentationScheduled->count())
                                                @foreach($presentationScheduled as $key=>$value)
                                                    <li class="list-group-item"
                                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group  connectedSortable" id="Contract-Sent">
                                            <li class="list-group-item inner"></li>
                                            @if(!empty($contractSent) && $contractSent->count())
                                                @foreach($contractSent as $key=>$value)
                                                    <li class="list-group-item "
                                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group shadow-lg connectedSortable" id="Qualified-Buy">
                                            <li class="list-group-item inner"></li>
                                            @if(!empty($qualifiedBuy) && $qualifiedBuy->count())
                                                @foreach($qualifiedBuy as $key=>$value)
                                                    <li class="list-group-item"
                                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group shadow-lg connectedSortable" id="Closed-Won">
                                            <li class="list-group-item inner"></li>
                                            @if(!empty($closedWon) && $closedWon->count())
                                                @foreach($closedWon as $key=>$value)
                                                    <li class="list-group-item"
                                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group shadow-lg connectedSortable" id="Closed-Lost">
                                            <li class="list-group-item inner"></li>
                                            @if(!empty($closedLost) && $closedLost->count())
                                                @foreach($closedLost as $key=>$value)
                                                    <li class="list-group-item"
                                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom-script')
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script>
        $(function () {
            $("#Presentation-Scheduled, #Appointment-Scheduled, #Call-Scheduled, #Contract-Sent, #Qualified-Buy, #Closed-Won, #Closed-Lost").sortable({
                connectWith: ".connectedSortable",
                opacity: 0.5,
            }).disableSelection();

            $(".connectedSortable").on("sortupdate", function (event, ui) {
                var presentationArr = [];
                var appointmentArr = [];
                var callArr = [];
                var contractArr = [];
                var qualifiedArr = [];
                var wonArr = [];
                var lostArr = [];

                $("#Presentation-Scheduled li").each(function (index) {
                    presentationArr[index] = $(this).attr('item-id');
                });

                $("#Appointment-Scheduled li").each(function (index) {
                    appointmentArr[index] = $(this).attr('item-id');
                });

                $("#Call-Scheduled li").each(function (index) {
                    callArr[index] = $(this).attr('item-id');
                });

                $("#Contract-Sent li").each(function (index) {
                    contractArr[index] = $(this).attr('item-id');
                });

                $("#Qualified-Buy li").each(function (index) {
                    qualifiedArr[index] = $(this).attr('item-id');
                });

                $("#Closed-Won li").each(function (index) {
                    wonArr[index] = $(this).attr('item-id');
                });

                $("#Closed-Lost li").each(function (index) {
                    lostArr[index] = $(this).attr('item-id');
                });

                $.ajax({
                    url: "{{ route('member.update.leads') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        presentationArr: presentationArr,
                        appointmentArr: appointmentArr,
                        callArr: callArr,
                        contractArr: contractArr,
                        qualifiedArr: qualifiedArr,
                        wonArr: wonArr,
                        lostArr: lostArr
                    },

                    success: function (data) {
                        console.log('success');
                    }
                });

            });
        });
    </script>
    <style>
        .table {
            min-height: 600px;
        }
    </style>
@endsection
