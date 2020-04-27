@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3  m-5 p-3   shadow-lg complete-item">
                        <h6><u>Call Scheduled</u></h6>
                        <ul class="list-group  connectedSortable" id="Call-Scheduled">
                            @if(!empty($callScheduled) && $callScheduled->count())
                                @foreach($callScheduled as $key=>$value)
                                    @if($value->count() > -1)
                                        <li class="list-group-item "
                                            item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                    @else
                                        <li class="list-group-item "> none</li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-3  m-5 p-3   shadow-lg complete-item">
                        <h6><u>Appointment Scheduled</u></h6>
                        <ul class="list-group  connectedSortable" id="Appointment-Scheduled">
                            @if(!empty($appointmentScheduled) && $appointmentScheduled->count())
                                @foreach($appointmentScheduled as $key=>$value)
                                    <li class="list-group-item "
                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-3  m-5 p-3 shadow-lg complete-item">
                        <h6><u>Presentation Scheduled</u></h6>
                        <ul class="list-group shadow-lg connectedSortable" id="Presentation-Scheduled">
                            @if(!empty($presentationScheduled) && $presentationScheduled->count())
                                @foreach($presentationScheduled as $key=>$value)
                                    <li class="list-group-item"
                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-3  m-5 p-3   shadow-lg complete-item">
                        <h6><u>Contract Sent</u></h6>
                        <ul class="list-group  connectedSortable" id="Contract-Sent">
                            @if(!empty($contractSent) && $contractSent->count())
                                @foreach($contractSent as $key=>$value)
                                    <li class="list-group-item "
                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-3  m-5 p-3 shadow-lg complete-item">
                        <h6><u>Qualified To Buy</u></h6>
                        <ul class="list-group shadow-lg connectedSortable" id="Qualified-Buy">
                            @if(!empty($qualifiedBuy) && $qualifiedBuy->count())
                                @foreach($qualifiedBuy as $key=>$value)
                                    <li class="list-group-item"
                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-3  m-5 p-3 shadow-lg complete-item">
                        <h6><u>Closed Won</u></h6>
                        <ul class="list-group shadow-lg connectedSortable" id="Closed-Won">
                            @if(!empty($closedWon) && $closedWon->count())
                                @foreach($closedWon as $key=>$value)
                                    <li class="list-group-item"
                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-3 m-5 p-3 shadow-lg complete-item">
                        <h6><u>Closed Lost</u></h6>
                        <ul class="list-group shadow-lg connectedSortable" id="Closed-Lost">
                            @if(!empty($closedLost) && $closedLost->count())
                                @foreach($closedLost as $key=>$value)
                                    <li class="list-group-item"
                                        item-id="{{ $value->id }}">{{ $value->member->name }}</li>
                                @endforeach
                            @endif
                        </ul>
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
@endsection
