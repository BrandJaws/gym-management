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
                            <div class="float-right" style="display: flex;justify-content: center;align-items: center;">
                                <a href="{{url('/createmember')}}" class="btn btn-primary" role="button">
                                    <i class="flaticon2-plus"></i> Create New
                                </a>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <div class="row" style="margin-bottom: 30px;">
                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile align-items-end" style="display: flex;">
                                            <div class="kt-input-icon kt-input-icon--left">
                                                <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                                    <span><i class="la la-search"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                            <div class="kt-form__group kt-form__group--inline">
                                                <div class="kt-form__label">
                                                    <label>Status:</label>
                                                </div>
                                                <div class="kt-form__control">
                                                    <div class="dropdown bootstrap-select form-control">
                                                        <select class="form-control bootstrap-select" id="kt_form_status" tabindex="-98">
                                                            <option value="">All</option>
                                                            <option value="1">Pending</option>
                                                            <option value="2">Delivered</option>
                                                            <option value="3">Canceled</option>
                                                            <option value="4">Success</option>
                                                            <option value="5">Info</option>
                                                            <option value="6">Danger</option>
                                                        </select>
                                                        <button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" data-id="kt_form_status" title="All">
                                                            <div class="filter-option">
                                                                <div class="filter-option-inner">
                                                                    <div class="filter-option-inner-inner">All</div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                        <div class="dropdown-menu" style="max-height: 318.813px; overflow: hidden; min-height: 144px;">
                                                            <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1" aria-activedescendant="bs-select-1-0" style="max-height: 292.813px; overflow-y: auto; min-height: 118px;">
                                                                <ul class="dropdown-menu inner show" role="presentation" style="margin-top: 0px; margin-bottom: 0px;">
                                                                    <li class="selected active">
                                                                        <a role="option" class="dropdown-item active selected" id="bs-select-1-0" tabindex="0" aria-setsize="7" aria-posinset="1" aria-selected="true">
                                                                            <span class="text">All</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-1" tabindex="0" aria-setsize="7" aria-posinset="2">
                                                                            <span class="text">Pending</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-2" tabindex="0" aria-setsize="7" aria-posinset="3">
                                                                            <span class="text">Delivered</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-3" tabindex="0" aria-setsize="7" aria-posinset="4">
                                                                            <span class="text">Canceled</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-4" tabindex="0" aria-setsize="7" aria-posinset="5">
                                                                            <span class="text">Success</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-5" tabindex="0" aria-setsize="7" aria-posinset="6">
                                                                            <span class="text">Info</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-6" tabindex="0" aria-setsize="7" aria-posinset="7">
                                                                            <span class="text">Danger</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                            <div class="kt-form__group kt-form__group--inline">
                                                <div class="kt-form__label">
                                                    <label>Type:</label>
                                                </div>
                                                <div class="kt-form__control">
                                                    <div class="dropdown bootstrap-select form-control">
                                                        <select class="form-control bootstrap-select" id="kt_form_type" tabindex="-98">
                                                            <option value="">All</option>
                                                            <option value="1">Online</option>
                                                            <option value="2">Retail</option>
                                                            <option value="3">Direct</option>
                                                        </select>
                                                        <button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" data-id="kt_form_type" title="All">
                                                            <div class="filter-option">
                                                                <div class="filter-option-inner">
                                                                    <div class="filter-option-inner-inner">All</div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                        <div class="dropdown-menu ">
                                                            <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                                                                <ul class="dropdown-menu inner show" role="presentation">
                                                                    <li class="selected active">
                                                                        <a role="option" class="dropdown-item active selected" id="bs-select-1-0" tabindex="0" aria-setsize="7" aria-posinset="1" aria-selected="true">
                                                                            <span class="text">All</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-1" tabindex="0" aria-setsize="7" aria-posinset="2">
                                                                            <span class="text">Pending</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-2" tabindex="0" aria-setsize="7" aria-posinset="3">
                                                                            <span class="text">Delivered</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-3" tabindex="0" aria-setsize="7" aria-posinset="4">
                                                                            <span class="text">Canceled</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-4" tabindex="0" aria-setsize="7" aria-posinset="5">
                                                                            <span class="text">Success</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-5" tabindex="0" aria-setsize="7" aria-posinset="6">
                                                                            <span class="text">Info</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a role="option" class="dropdown-item" id="bs-select-1-6" tabindex="0" aria-setsize="7" aria-posinset="7">
                                                                            <span class="text">Danger</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                            <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell" style="padding: 5px;">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Lisa</td>
                                            <td>Nilson</td>
                                            <td>Female</td>
                                            <td>24</td>
                                            <td>lisanilson@gmail.com</td>
                                            <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell" style="padding: 5px;">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>Female</td>
                                            <td>26</td>
                                            <td>larrybird@gmail.com</td>
                                            <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell" style="padding: 5px;">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
