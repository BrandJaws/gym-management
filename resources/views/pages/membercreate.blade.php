@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor p-0" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Create Member
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-0">
                                            <label for="firstname">First Name:</label>
                                            <input type="text" name="firstname" class="form-control" placeholder="Enter first name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-0">
                                            <label for="lastname">Last Name:</label>
                                            <input type="text" name="lastname" class="form-control" placeholder="Enter last name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mt-3">
                                            <label for="gender">Gender</label>
                                            <div class="kt-radio-inline pt-1">
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio" name="example_2" checked="" value="2"> Male
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio" name="example_2" value="2"> Female
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio" name="example_2" value="2"> Other
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group mt-3">
                                            <label for="age">Age:</label>
                                            <input type="number" name="age" class="form-control" placeholder="Enter your age">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-3">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-12 kt-align-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
@endsection
