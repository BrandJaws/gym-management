@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor p-0" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    List Of Members
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>#id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Jhon</td>
                                            <td>Stone</td>
                                            <td>Male</td>
                                            <td>28</td>
                                            <td>jhonstone@gmail.com</td>
                                            <td class="p-0">
                                                <span class="dropdown">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                      <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Lisa</td>
                                            <td>Nilson</td>
                                            <td>Female</td>
                                            <td>24</td>
                                            <td>lisanilson@gmail.com</td>
                                            <td class="p-0">
                                                <span class="dropdown">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                      <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>Female</td>
                                            <td>26</td>
                                            <td>larrybird@gmail.com</td>
                                            <td class="p-0">
                                                <span class="dropdown">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                      <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="float-right" style="width: 100%;">
                                <a href="{{url('/createmember')}}" class="btn btn-primary float-right mt-2" role="button">
                                    <i class="flaticon2-plus"></i> Create New
                                </a>
                            </div>
                            <!--end::Section-->
                        </div>
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
@endsection
