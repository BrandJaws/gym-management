@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @include('_layouts.flash-message')
            <div class="row">
                <div class="col-sm-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Reports
                                </h3>
                            </div>
                        </div>
                        {{--                        <form action="{{ route('member.reports') }}" method="get" enctype="multipart/form-data"--}}
                        {{--                              class="kt-form kt-form--label-right">--}}
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label> Customer Type:</label>
                                                    <select class="form-control"
                                                            onchange="changeDiv(this.value)" name="customerType"
                                                            id="customerType">
                                                        <option value="None">Select . . . !</option>
                                                        <option value="Member">Member</option>
                                                        <option value="Lead">Lead</option>
                                                    </select>
                                                    <input type="hidden" name="id" value="121">
                                                </div>
                                            </div>
                                            <div class="col-md-2 LeadFields" style="display: none">
                                                <div class="form-group">
                                                    <label>Type :</label>
                                                    <select class="form-control" name="type" id="type">
                                                        <option value="Call">Call</option>
                                                        <option value="Demo">Demo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 MemberFields" style="display: none">
                                                <div class="form-group">
                                                    <label>Status :</label>
                                                    <select class="form-control" name="memberStatus" id="memberStatus">
                                                        <option value="Not Joined">Not Joined</option>
                                                        <option value="Active">Active</option>
                                                        <option value="In-Active">In-Active</option>
                                                        <option value="Expired">Expired</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 LeadFields" style="display: none">
                                                <div class="form-group">
                                                    <label>Status :</label>
                                                    <select class="form-control" name="leadStatus" id="leadStatus">
                                                        <option value="Pending">Pending</option>
                                                        <option value="Success">Success</option>
                                                        <option value="Failed Call">Failed Calls</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Start Date :</label>
                                                    <input type="date" name="from_date" id="from_date"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>End Date :</label>
                                                <div class="form-group">
                                                    <input type="date" name="to_date" id="to_date"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>-</label>
                                                <div class="form-group">
                                                    <button type="button" name="filter" id="filter"
                                                            class="btn btn-info btn-sm">Filter
                                                    </button>
                                                    <button type="button" name="refresh" id="refresh"
                                                            class="btn btn-warning btn-sm">Refresh
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="name" style="cursor: pointer">Employee
                                                        <span
                                                            id="id_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="duration" style="cursor: pointer">Member
                                                        <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="amount" style="cursor: pointer">Date <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="monthlyFee" style="cursor: pointer">
                                                        Transfer
                                                        Status<span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="detail" style="cursor: pointer">Transfer
                                                        Employee <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="detail" style="cursor: pointer">
                                                        Re-Schedule
                                                        Date <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name=" " style="cursor: pointer">Actions <span
                                                            id="post_title_icon"></span></th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            {{ csrf_field() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Section-->
                        </div>
                    {{--                        </form>--}}
                    <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>

@endsection
@section('custom-script')

    <script type="text/javascript">


        $(document).ready(function () {

            var date = new Date();

            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            var _token = $('input[name="_token"]').val();

            fetch_data();

            function fetch_data(from_date = '', to_date = '', type = '', customerType = '', memberStatus = '', leadStatus = '') {
                $.ajax({
                    url: "{{ route('member.fetch_data') }}",
                    method: "POST",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        type: type,
                        customerType: customerType,
                        memberStatus: memberStatus,
                        leadStatus: leadStatus,
                        _token: _token
                    },
                    dataType: "json",
                    success: function (data) {
                        var output = '';
                        $('#total_records').text(data.length);
                        for (var count = 0; count < data.length; count++) {
                            output += '<tr>';
                            output += '<td>' + data[count].id + '</td>';
                            output += '<td>' + data[count].id + '</td>';
                            output += '<td>' + data[count].id + '</td></tr>';
                        }
                        $('tbody').html(output);
                    }
                })
            }

            $('#filter').click(function () {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var type = $('#type').val();
                var customerType = $('#customerType').val();
                var memberStatus = $('#memberStatus').val();
                var leadStatus = $('#leadStatus').val();
                if (from_date != '' && to_date != '') {
                    fetch_data(from_date, to_date, type, customerType, leadStatus);
                } else {
                    alert('Both Date is required');
                }
            });

            $('#refresh').click(function () {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#type').val('');
                $('#customerType').val('');
                $('#memberStatus').val('');
                $('#leadStatus').val('');
                fetch_data();
            });
        });

        function changeDiv(value) {
            if (value === "Lead") {
                var div = document.getElementsByClassName('LeadFields');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "block";
                }
            } else {
                var div = document.getElementsByClassName('LeadFields');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "none";
                }
            }

            if (value === "Member") {
                var div = document.getElementsByClassName('MemberFields');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "block";
                }
            } else {
                var div = document.getElementsByClassName('MemberFields');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "none";
                }
            }
        }
    </script>

@endsection