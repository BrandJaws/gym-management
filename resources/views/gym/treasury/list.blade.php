@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-iconbox kt-iconbox--brand kt-iconbox--animate-slower">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon"></div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                                        <div class="kt-widget kt-widget--user-profile-4">
                                            <div class="kt-widget__head">
                                                <div class="kt-widget__media">
                                                    <div class="kt-iconbox__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z" fill="#000000" opacity="0.3"/>
                                                                <path d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z" fill="#000000"/>
                                                                <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="kt-widget__content">
                                                    <div class="kt-widget__section">
                                                        <a href="#" class="kt-widget__username">
                                                            Total Cash-In
                                                        </a>
                                                        <div class="kt-widget__button">
                                                            <h4>{{ $treasuryCashIn }}</h4>
                                                        </div>
                                                        <div class="kt-widget__button">
                                                            <span class="btn btn-label-warning btn-sm">Active</span>
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
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon"></div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                                        <div class="kt-widget kt-widget--user-profile-4">
                                            <div class="kt-widget__head">
                                                <div class="kt-widget__media">
                                                    <div class="kt-iconbox__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
                                                                <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="kt-widget__content">
                                                    <div class="kt-widget__section">
                                                        <a href="#" class="kt-widget__username">
                                                            Total Cash-Out
                                                        </a>
                                                        <div class="kt-widget__button">
                                                            <h2>{{ $treasuryCashOut }}</h2>
                                                        </div>
                                                        <div class="kt-widget__button">
                                                            <span class="btn btn-label-warning btn-sm">Active</span>
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
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-iconbox kt-iconbox--warning kt-iconbox--animate-fast">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon"></div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                                        <div class="kt-widget kt-widget--user-profile-4">
                                            <div class="kt-widget__head">
                                                <div class="kt-widget__media">
                                                    <div class="kt-iconbox__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                                <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="kt-widget__content">
                                                    <div class="kt-widget__section">
                                                        <a href="#" class="kt-widget__username">
                                                            Total Cash-Discount
                                                        </a>
                                                        <div class="kt-widget__button">
                                                            <h2>{{ $treasuryCashDiscount }}</h2>
                                                        </div>
                                                        <div class="kt-widget__button">
                                                            <span class="btn btn-label-warning btn-sm">Active</span>
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
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-iconbox kt-iconbox--danger kt-iconbox--animate-faster">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon"></div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                                        <div class="kt-widget kt-widget--user-profile-4">
                                            <div class="kt-widget__head">
                                                <div class="kt-widget__media">
                                                    <div class="kt-iconbox__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="kt-widget__content">
                                                    <div class="kt-widget__section">
                                                        <a href="#" class="kt-widget__username">
                                                            Total Cash-Extra
                                                        </a>
                                                        <div class="kt-widget__button">
                                                            <h2>{{ $treasuryCashExtra }}</h2>
                                                        </div>
                                                        <div class="kt-widget__button">
                                                            <span class="btn btn-label-warning btn-sm">Active</span>
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
            </div>
            @include('_layouts.flash-message')
            <div class="row">
                <div class="col-sm-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    List of Treasuries
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline">
                                <a href="{{route('treasury.create')}}" type="button" class="btn btn-brand btn-icon-sm">
                                    <i class="flaticon2-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <div class="   ">
                                        <div class="row">
                                            <div class="col-md-9">

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="kt-input-icon kt-input-icon--right">
                                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search..." id="generalSearch">
                                                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                                            <span><i class="la la-search"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="   ">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="name" style="cursor: pointer">Name <span
                                                            id="id_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="cashFlow" style="cursor: pointer">Cash Flow <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="type" style="cursor: pointer">Type <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="value" style="cursor: pointer">Value <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="date" style="cursor: pointer">Date <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="purpose" style="cursor: pointer">Purpose <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="note" style="cursor: pointer">Note <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name=" " style="cursor: pointer">Actions <span
                                                            id="post_title_icon"></span></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @include('gym.treasury.pagination_data')
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
            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "/gym/treasury?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                    success: function (data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                })
            }
            $(document).on('keyup', '#search', function () {
                var query = $('#search').val();
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
                var query = $('#search').val();
                fetch_data(page, reverse_order, column_name, query);
            });
            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#search').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });
        });

    </script>

@endsection
@section('custom-script')
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
@endsection
