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
                                    List of Services
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline">
                                <a href="{{route('service.create')}}" type="button" class="btn btn-brand btn-icon-sm">
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
                                                <th>Code</th>
                                                <th>Fee</th>
                                                <th>Status</th>
                                                <th>Gym</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($gymServices as $row)
                                                <tr>
                                                    <td>{{ $row->id}}</td>
                                                    <td>{{ $row->duration }}</td>
                                                    <td>{{ $row->amount }}</td>
                                                    <td>{{ $row->monthlyFee }}</td>
                                                    <td>{{ $row->detail }}</td>
                                                    <td>
                                                        <a href="{{url('gym/membership/edit', $row->id)}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a> &nbsp; | &nbsp;
                                                        <a href="{{url('gym/membership/destroy', $row->id)}}"
                                                           onclick="return confirm('Are you sure you want to delete it?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Muhammad Bilal</td>
                                                <td>9Y78G6T5&y*</td>
                                                <td>50$</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Inactive</span>
                                                </td>
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
                                                <th scope="row">3</th>
                                                <td>Arslan Aslam</td>
                                                <td>$r^y&y*u%TT6y</td>
                                                <td>300$</td>
                                                <td data-field="Status" class="kt-datatable__cell">
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Warning</span>
                                                </td>
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
