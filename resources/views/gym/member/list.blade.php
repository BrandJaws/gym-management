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
                                    List of Members
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline">
                                <a href="{{route('member.create')}}" type="button" class="btn btn-brand btn-icon-sm">
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
                                                <th>Date of Birth</th>
                                                <th style="width: 200px;">Gender</th>
                                                <th>Merital Status</th>
                                                <th>Cnic</th>
                                                <th>Phone</th>
                                                <th>Date of Joining</th>
                                                <th style="width: 200px;">Gym</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Zuhair Ahmad</td>
                                                <td>zuhairahmad@gmail.com</td>
                                                <td>14-05-1990</td>
                                                <td>Male</td>
                                                <td>Un-Married</td>
                                                <td>35000-2343243-4</td>
                                                <td>+920329439049</td>
                                                <td>10-02-2013</td>
                                                <td>.......</td>
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
                                                <td>Fahad Khalid</td>
                                                <td>fahadkhalid192@gmail.com</td>
                                                <td>14-05-2002</td>
                                                <td>Male</td>
                                                <td>Un-Married</td>
                                                <td>35000-2343243-4</td>
                                                <td>+920329439049</td>
                                                <td>20-07-2018</td>
                                                <td>.......</td>
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
