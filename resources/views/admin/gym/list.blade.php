@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    List of Gyms
                                </h3>
                            </div>
                            <div class="dropdown">
                                <a href="{{route('gym.create')}}" type="button" class="btn btn-brand btn-icon-sm">
                                    <i class="flaticon2-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                        @include('_layouts.flash-message')
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-md-9">

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="serach" id="serach" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th width="10%" class="sorting" data-sorting_type="asc"
                                                        data-column_name="name" style="cursor: pointer">Name <span
                                                            id="id_icon"></span></th>
                                                    <th width="10%" class="sorting" data-sorting_type="asc"
                                                        data-column_name="city" style="cursor: pointer">City <span
                                                            id="post_title_icon"></span></th>
                                                    <th width="10%" class="sorting" data-sorting_type="asc"
                                                        data-column_name="country" style="cursor: pointer">Country <span
                                                            id="post_title_icon"></span></th>
                                                    <th width="10%" class="sorting" data-sorting_type="asc"
                                                        data-column_name="address" style="cursor: pointer">Address <span
                                                            id="post_title_icon"></span></th>
                                                    <th width="10%" class="sorting" data-sorting_type="asc"
                                                        data-column_name="status" style="cursor: pointer">Status <span
                                                            id="post_title_icon"></span></th>
                                                    <th width="10%" class="sorting" data-sorting_type="asc"
                                                        data-column_name=" " style="cursor: pointer">Actions <span
                                                            id="post_title_icon"></span></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @include('admin.gym.pagination_data')
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
                        <div class="kt-portlet__foot" style="padding: 10px 25px;">
                            <div class="dropdown float-right">
                                <a href="{{route('gym.licenseList')}}" type="button" class="btn btn-brand btn-icon-sm">
                                    <i class="flaticon2-right-arrow"></i> License
                                </a>
                            </div>
                        </div>
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
                    url: "/admin/gym?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                    success: function (data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                })
            }

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

