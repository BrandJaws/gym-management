@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet">
                <div class="kt-portlet__body  kt-portlet__body--fit">
                    <div class="row row-no-padding row-col-separator-lg">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <!--begin::Total Profit-->
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <h4 class="kt-widget24__title">
                                            Total {{ $breadcrumbs }}
                                        </h4>
                                        <span class="kt-widget24__desc">
                                            Count
                                        </span>
                                    </div>
                                    <span class="kt-widget24__stats kt-font-brand">
                                        {{ $totalStage }}
                                    </span>
                                </div>
                                <div class="progress progress--sm">
                                    @if($total > 0)
                                        <div class="progress-bar kt-bg-brand progress-bar-striped progress-bar-animated"
                                             role="progressbar"
                                             style="width: {{ number_format($totalStage/$total * 100 , 0, '.', ',')  }}%;"
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
                                    </span>
                                    <span class="kt-widget24__number">
                                        @if($total > 0)
                                            {{ number_format($totalStage/$total * 100 , 2, '.', ',')  }}%
                                        @else
                                            <b>0</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <!--end::Total Profit-->
                        </div>
                    </div>
                </div>
            </div>
            @include('_layouts.flash-message')
            <div class="row">
                <div class="col-sm-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    List of {{ $breadcrumbs }}
                                </h3>
                            </div>
                            @if($breadcrumbs == "Leads")
                                <div class="dropdown dropdown-inline">
                                    <a href="{{route('membership.create')}}" type="button"
                                       class="btn btn-brand btn-icon-sm">
                                        <i class="flaticon2-plus"></i> Add New
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="kt-portlet">
                            <div class="kt-portlet__body">
                                <!--begin::Section-->
                                <div class="kt-section">
                                    <div class="kt-section__content">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-9">
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="kt-input-icon kt-input-icon--right">
                                                        <input type="text" class="form-control"
                                                               placeholder="Search" name="serach" id="serach">
                                                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 width="24px" height="24px"
                                                                 viewBox="0 0 24 24"
                                                                 version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        opacity="0.3"/>
                                                                    <path
                                                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                        fill="#000000" fill-rule="nonzero"/>
																	</g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="EmployeeName" style="cursor: pointer">
                                                            Employee
                                                            <span id="post_title_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="Member" style="cursor: pointer">Member
                                                            <span id="post_title_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="stage" style="cursor: pointer">Stage <span
                                                                id="id_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="scheduleDate" style="cursor: pointer">Date
                                                            <span
                                                                id="post_title_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="status" style="cursor: pointer">Status
                                                            <span
                                                                id="post_title_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="transferStage" style="cursor: pointer">
                                                            Re-Schedule Stage
                                                            <span id="post_title_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="transfer_id" style="cursor: pointer">
                                                            Transfer
                                                            Employee <span
                                                                id="post_title_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="reScheduleDate" style="cursor: pointer">
                                                            Re-Schedule
                                                            Date <span
                                                                id="post_title_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name="reStatus" style="cursor: pointer">
                                                            Re-Status <span
                                                                id="post_title_icon"></span></th>
                                                        <th class="sorting" data-sorting_type="asc"
                                                            data-column_name=" " style="cursor: pointer">Actions <span
                                                                id="post_title_icon"></span></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @include('gym.member.guest.pagination_data')
                                                    </tbody>
                                                </table>
                                                <input type="hidden" name="hidden_page" id="hidden_page" value="1"/>
                                                <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                                       value="id"/>
                                                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type"
                                                       value="asc"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Section-->
                            </div>

                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>
                </div>
            </div>
            <!-- end:: Content -->
        </div>
        <script>
            $(document).ready(function () {
                function clear_icon() {
                    $('#id_icon').html('');
                    $('#post_title_icon').html('');
                }

                @if($breadcrumbs == "Preview Calls")
                function fetch_data(page, sort_type, sort_by, query) {
                    $.ajax({
                        url: "/gym/member/guest/previewCalls?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                        success: function (data) {
                            $('tbody').html('');
                            $('tbody').html(data);
                        }
                    })
                }

                @elseif($breadcrumbs == "Preview Appointments")
                function fetch_data(page, sort_type, sort_by, query) {
                    $.ajax({
                        url: "/gym/member/guest/previewAppointments?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                        success: function (data) {
                            $('tbody').html('');
                            $('tbody').html(data);
                        }
                    })
                }

                @elseif($breadcrumbs == "Preview Presentations")
                function fetch_data(page, sort_type, sort_by, query) {
                    $.ajax({
                        url: "/gym/member/guest/previewPresentations?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                        success: function (data) {
                            $('tbody').html('');
                            $('tbody').html(data);
                        }
                    })
                }

                @elseif($breadcrumbs == "Contract Sent")
                function fetch_data(page, sort_type, sort_by, query) {
                    $.ajax({
                        url: "/gym/member/guest/contractSent?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                        success: function (data) {
                            $('tbody').html('');
                            $('tbody').html(data);
                        }
                    })
                }

                @elseif($breadcrumbs == "Qualified To Buy")
                function fetch_data(page, sort_type, sort_by, query) {
                    $.ajax({
                        url: "/gym/member/guest/previewQualified?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                        success: function (data) {
                            $('tbody').html('');
                            $('tbody').html(data);
                        }
                    })
                }

                @elseif($breadcrumbs == "Closed Won")
                function fetch_data(page, sort_type, sort_by, query) {
                    $.ajax({
                        url: "/gym/member/guest/closedWon?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                        success: function (data) {
                            $('tbody').html('');
                            $('tbody').html(data);
                        }
                    })
                }

                @endif

                $(document).on('keyup', '#serach', function () {
                    var query = $('#serach').val();
                    var column_name = $('#hidden_column_name').val();
                    var sort_type = $('#hidden_sort_type').val();
                    var page = $('#hidden_page').val();
                    fetch_data(page, sort_type, column_name, query);
                });
                $(document).on('click', '.sorting', function () {
                    var column_name = $(this).data('column_name');
                    var order_type = $(this).data('sorting_type');
                    var reverse_order = '';
                    if (order_type == 'asc') {
                        $(this).data('sorting_type', 'desc');
                        reverse_order = 'desc';
                        clear_icon();
                        $('#' + column_name + '_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
                    }
                    if (order_type == 'desc') {
                        $(this).data('sorting_type', 'asc');
                        reverse_order = 'asc';
                        clear_icon
                        $('#' + column_name + '_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
                    }
                    $('#hidden_column_name').val(column_name);
                    $('#hidden_sort_type').val(reverse_order);
                    var page = $('#hidden_page').val();
                    var query = $('#serach').val();
                    fetch_data(page, reverse_order, column_name, query);
                });
                $(document).on('click', '.pagination a', function (event) {
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    $('#hidden_page').val(page);
                    var column_name = $('#hidden_column_name').val();
                    var sort_type = $('#hidden_sort_type').val();

                    var query = $('#serach').val();

                    $('li').removeClass('active');
                    $(this).parent().addClass('active');
                    fetch_data(page, sort_type, column_name, query);
                });
            });

        </script>

@endsection
