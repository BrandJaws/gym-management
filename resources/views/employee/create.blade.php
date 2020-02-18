@extends('_layouts.index')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Create A Employee
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="#" method="POST" enctype="multipart/form-data" class="kt-form kt-form--label-right">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter your name" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter your email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Code:</label>
                                        <input type="text" name="code" class="form-control" placeholder="Enter your code">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Password:</label>
                                        <input type="text" name="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Gender:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="2"> Male
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="2"> Female
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="2"> Other
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Cnic:</label>
                                        <input type="text" name="cnic" class="form-control" placeholder="Enter Your Cnic" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Phone:</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Your Contact">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Salary:</label>
                                        <input type="text" name="salary" class="form-control" placeholder="Enter Your Salary" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Specialization:</label>
                                        <input type="text" name="specialization" class="form-control" placeholder="Enter Your Specialization">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter Your Address" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Gym:</label>
                                        <input type="text" name="gym" class="form-control" placeholder="Enter Your Gym">
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('employee.list')}}" class="btn btn-secondary">Cancel</a>
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
