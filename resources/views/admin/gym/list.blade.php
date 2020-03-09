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
                        <div class="kt-portlet__body">
                            <div class="row" style="margin-bottom: 18px">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="kt_table_1_length">
                                        <label class="entitiesShow">Show
                                            <select name="kt_table_1_length" aria-controls="kt_table_1" class="entitiesDropdown custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="kt_table_1_filter" class="dataTables_filter">
                                        <label class="searchLabel">Search:
                                            <input type="search" class="searchField form-control form-control-sm" placeholder="" aria-controls="kt_table_1">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>#id</th>
                                                <th>Name</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th style="width: 200px;">Address</th>
                                                <th>Branches</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Gold Gym's</td>
                                                <td>Pakistan</td>
                                                <td>Lahore</td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">10</span>
                                                    <a title="Branches" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-external-link"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="kt-switch kt-switch--sm kt-switch--icon" style="float: left;margin-right: 10px;padding-top: 2px;">
                                                        <label>
                                                            <input type="checkbox" name="">
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#kt_modal_6">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Planet Fitness</td>
                                                <td>Pakistan</td>
                                                <td>Peshawer</td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">20</span>
                                                    <a title="Branches" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-external-link"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="kt-switch kt-switch--sm kt-switch--icon" style="float: left;margin-right: 10px;padding-top: 2px;">
                                                        <label>
                                                            <input type="checkbox" name="">
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#kt_modal_6">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Yoga Works</td>
                                                <td>Pakistan</td>
                                                <td>Rawalpindi</td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">13</span>
                                                    <a title="Branches" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-external-link"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="kt-switch kt-switch--sm kt-switch--icon" style="float: left;margin-right: 10px;padding-top: 2px;">
                                                        <label>
                                                            <input type="checkbox" name="">
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#kt_modal_6">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-custom" id="kt_sweetalert_demo_8"> Show me</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Form-->
                        <div class="kt-portlet__foot" style="padding: 10px 25px;">
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12 col-md-6">--}}
{{--                                    <div class="dataTables_info" id="kt_table_1_info" role="status" aria-live="polite">Showing 1 to 10 of 40 entries</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12 col-md-6">--}}
{{--                                    <div class="dataTables_paginate paging_simple_numbers" id="kt_table_1_paginate">--}}
{{--                                        <ul class="pagination">--}}
{{--                                            <li class="paginate_button page-item previous disabled" id="kt_table_1_previous">--}}
{{--                                                <a href="#" aria-controls="kt_table_1" data-dt-idx="0" tabindex="0" class="page-link">--}}
{{--                                                    <i class="la la-angle-left"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="paginate_button page-item active">--}}
{{--                                                <a href="#" aria-controls="kt_table_1" data-dt-idx="1" tabindex="0" class="page-link">1</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="paginate_button page-item ">--}}
{{--                                                <a href="#" aria-controls="kt_table_1" data-dt-idx="2" tabindex="0" class="page-link">2</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="paginate_button page-item ">--}}
{{--                                                <a href="#" aria-controls="kt_table_1" data-dt-idx="3" tabindex="0" class="page-link">3</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="paginate_button page-item ">--}}
{{--                                                <a href="#" aria-controls="kt_table_1" data-dt-idx="4" tabindex="0" class="page-link">4</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="paginate_button page-item next" id="kt_table_1_next">--}}
{{--                                                <a href="#" aria-controls="kt_table_1" data-dt-idx="5" tabindex="0" class="page-link">--}}
{{--                                                    <i class="la la-angle-right"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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

{{--    modal Content--}}

{{--    <div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


@endsection

