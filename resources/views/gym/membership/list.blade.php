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
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>#id</th>
                                            <th>Name</th>
                                            <th>Duration</th>
                                            <th>Amount</th>
                                            <th>Included Member</th>
                                            <th>Monthly Fee</th>
                                            <th style="width: 200px">Detail</th>
                                            <th>Gym</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td data-field="Status" class="kt-datatable__cell">
                                                <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Silver</span>
                                            </td>
                                            <td>30</td>
                                            <td>15,000</td>
                                            <td>08</td>
                                            <td>2,000</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                            <td>........</td>
                                            <td>
                                                <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md kt_sweetalert_demo_8">
                                                    <i class="la la-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td data-field="Status" class="kt-datatable__cell">
                                                <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">Platinum</span>
                                            </td>
                                            <td>60</td>
                                            <td>25,000</td>
                                            <td>12</td>
                                            <td>5,000</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                            <td>........</td>
                                            <td>
                                                <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md kt_sweetalert_demo_8">
                                                    <i class="la la-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td data-field="Status" class="kt-datatable__cell">
                                                <span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill">Gold</span>
                                            </td>
                                            <td>20</td>
                                            <td>45,000</td>
                                            <td>4</td>
                                            <td>10,000</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                            <td>........</td>
                                            <td>
                                                <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md kt_sweetalert_demo_8">
                                                    <i class="la la-trash"></i>
                                                </a>
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
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>
@endsection
@section('custom-script')
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
@endsection
