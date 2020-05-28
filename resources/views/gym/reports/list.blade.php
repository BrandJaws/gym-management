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
                                    List of Training
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline">
                                <a href="{{route('training.create')}}" type="button" class="btn btn-brand btn-icon-sm">
                                    <i class="flaticon2-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                        @include('_layouts.flash-message')
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <div class="  ">
                                        <div class="row">
                                            <div class="col-md-9">

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="kt-input-icon kt-input-icon--right">
                                                        <input type="text" name="search" id="search"
                                                               class="form-control" placeholder="Search..."
                                                               id="generalSearch">
                                                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                                            <span><i class="la la-search"></i></span>
                                                        </span>
                                                    </div>
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



@endsection
@section('custom-script')
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
@endsection
