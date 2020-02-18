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
                                    List of Trainers
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline">
                                <a href="{{route('trainer.create')}}" type="button" class="btn btn-brand btn-icon-sm">
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
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Qualification</th>
                                                <th>Speciality</th>
                                                <th>Status</th>
                                                <th style="width: 200px">Note</th>
                                                <th>Gym</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mohsin Ikram</td>
                                                <td>mohsinikram1999@gmail.com</td>
                                                <td>1q2w3e4r5t</td>
                                                <td>Male</td>
                                                <td>+923094940999</td>
                                                <td>Bachelors</td>
                                                <td>Web Designing</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Active</span>
                                                </td>
                                                <td>Hi, Guys I'm not Available at the time.</td>
                                                <td>.......</td>
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
                                                <td>Muhammad Bilal</td>
                                                <td>muhammadbilal092@gmail.com</td>
                                                <td>1q7y6we3eg6dg</td>
                                                <td>Male</td>
                                                <td>+923094328674</td>
                                                <td>Master</td>
                                                <td>Web Developer Backend.</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Active</span>
                                                </td>
                                                <td>Hi, Guys I'm Available at the time.</td>
                                                <td>.......</td>
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
                                                <td>Arslan Aslam</td>
                                                <td>arslanaslam289@gmail.com</td>
                                                <td>6t5r3rw8e3e</td>
                                                <td>Male</td>
                                                <td>+923094328674</td>
                                                <td>Master</td>
                                                <td>Web Developer Backend.</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Active</span>
                                                </td>
                                                <td>Hi, Guys I'm Available at the time.</td>
                                                <td>.......</td>
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
