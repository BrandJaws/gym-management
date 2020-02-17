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
                            <div class="dropdown dropdown-inline">
                                <a href="{{route('gym.create')}}" type="button" class="btn btn-brand btn-icon-sm">
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
                                                <th>In Trial</th>
                                                <th>Trial Ends At</th>
                                                <th>City</th>
                                                <th style="width: 200px;">Address</th>
                                                <th>State</th>
                                                <th>License</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Gold Gym's</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">True</span>
                                                </td>
                                                <td>02-06-2018</td>
                                                <td>Lahore</td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                <td>.......</td>
                                                <td>
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">True</span>
                                                </td>
                                                <td>
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Canceled</span>
                                                </td>
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
                                                <td>Planet Fitness</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">False</span>
                                                </td>
                                                <td>26-11-2014</td>
                                                <td>Peshawer</td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                <td>.......</td>
                                                <td>
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">False</span>
                                                </td>
                                                <td>
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">Active</span>
                                                </td>
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
                                                <td>Yoga Works</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">True</span>
                                                </td>
                                                <td>09-10-2005</td>
                                                <td>Rawalpindi</td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                <td>.......</td>
                                                <td>
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">False</span>
                                                </td>
                                                <td>
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Canceled</span>
                                                </td>
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

