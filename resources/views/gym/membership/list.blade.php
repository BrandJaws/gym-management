@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
        @include('_layouts.flash-message')
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head" style="align-items: center">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                List of Memberships
                            </h3>
                        </div>
                        <div class="dropdown dropdown-inline">
                            <a href="{{route('membership.create')}}" type="button" class="btn btn-brand btn-icon-sm">
                                <i class="flaticon2-plus"></i> Add New
                            </a>
                        </div>
                    </div>
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
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="name" style="cursor: pointer">Name <span
                                                        id="id_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="duration" style="cursor: pointer">Duration <span
                                                        id="post_title_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="amount" style="cursor: pointer">Amount <span
                                                        id="post_title_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="includedMember" style="cursor: pointer">Included Member <span
                                                        id="post_title_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="monthlyFee" style="cursor: pointer">Monthly Fee <span
                                                        id="post_title_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="detail" style="cursor: pointer">Detail <span
                                                        id="post_title_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="gym_id" style="cursor: pointer">Gym <span
                                                        id="post_title_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name=" " style="cursor: pointer">Actions <span
                                                        id="post_title_icon"></span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @include('gym.membership.pagination_data')
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
                    url: "gym/membership?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
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
