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
                                    Shop
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline">
                                <a href="{{route('shop.create')}}" type="button" class="btn btn-brand btn-icon-sm">
                                    <i class="flaticon2-plus"></i> Add Product
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
                                            <div class="col-md-3">
                                                <div class="dropdown dropdown-inline">
                                                    <a href="#" type="button" class="btn btn-brand btn-icon-sm">
                                                        <i class="flaticon2-plus"></i> Add Category
                                                    </a>
                                                </div>

                                                <div class="table-responsive m-2">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($shopCategory as $row)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $row->name}}</td>
                                                                <td>{{ $row->name}}</td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="3" align="center">
                                                                {!! $shopCategory->links() !!}
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-9">

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <div class="kt-input-icon kt-input-icon--right">
                                                                <input type="text" name="search" id="search"
                                                                       class="form-control" placeholder="Search..."
                                                                       id="generalSearch">
                                                                <span
                                                                    class="kt-input-icon__icon kt-input-icon__icon--right">
                                                            <span><i class="la la-search"></i></span>
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th class="sorting" data-sorting_type="asc"
                                                                data-column_name="category_id" style="cursor: pointer">Category <span id="id_icon"></span></th>
                                                            <th class="sorting" data-sorting_type="asc"
                                                                data-column_name="name" style="cursor: pointer">Name <span id="id_icon"></span></th>
                                                            <th class="sorting" data-sorting_type="asc"
                                                                data-column_name="description" style="cursor: pointer">Description
                                                                <span id="post_title_icon"></span></th>
                                                            <th class="sorting" data-sorting_type="asc"
                                                                data-column_name="price" style="cursor: pointer">Price
                                                                <span id="post_title_icon"></span></th>
                                                            <th class="sorting" data-sorting_type="asc"
                                                                data-column_name="in_stock" style="cursor: pointer">In Stock
                                                                <span id="post_title_icon"></span></th>
                                                            <th class="sorting" data-sorting_type="asc"
                                                                data-column_name="visible"
                                                                style="cursor: pointer">Visible <span id="post_title_icon"></span></th>
                                                            <th class="sorting" data-sorting_type="asc"
                                                                data-column_name=" " style="cursor: pointer">Actions
                                                                <span id="post_title_icon"></span></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @include('gym.shop.pagination_data')
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1"/>
                                                    <input type="hidden" name="hidden_column_name"
                                                           id="hidden_column_name"
                                                           value="id"/>
                                                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type"
                                                           value="asc"/>
                                                </div>
                                            </div>
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
                    url: "/gym/shop?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
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
