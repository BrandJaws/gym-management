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
                                    List of Licenses
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline">
                                <a href="{{route('gym.licenseCreate')}}" type="button" class="btn btn-brand btn-icon-sm">
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
                                                <th>Gym</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Driving Car</td>
                                                <td>Gold's Gym</td>
                                                <td>01-13-2010</td>
                                                <td>11-04-2009</td>
                                                <td>3,000</td>
                                                <td>
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Driving Bike</td>
                                                <td>Yoga Works</td>
                                                <td>22-01-1982</td>
                                                <td>26-11-2014</td>
                                                <td>10,000</td>
                                                <td>
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Driving Van</td>
                                                <td>Planet Fitness</td>
                                                <td>18-09-2015</td>
                                                <td>10-12-2004</td>
                                                <td>2,000</td>
                                                <td>
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
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

