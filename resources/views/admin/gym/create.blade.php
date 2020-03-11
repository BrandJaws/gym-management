@extends('_layouts.index')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <form action=" " method="POST" enctype="multipart/form-data" class="kt-form kt-form--label-right">
            @csrf
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Create A Gym
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Enter full name" required/>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Trial In:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="yes" required> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="no" required> No
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 trialEndsAt" style="display: none;">
                                        <label>Trial Ends At:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="trialEndsAt" class="form-control"
                                                   placeholder="Enter your Date" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label class="">Country:</label>
                                        <select class="form-control kt-selectpicker" name="country" tabindex="-98"
                                                required>
                                            <option value="mustard">Pakistan</option>
                                            <option value="ketchup">Malaysia</option>
                                            <option value="relish">England</option>
                                            <option value="relish">America</option>
                                            <option value="relish">India</option>
                                            <option value="relish">China</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>State:</label>
                                        <input type="text" name="state" id="state" class="form-control"
                                               placeholder="Enter your state" required/>
                                    </div>
                                    <div class="col-md-4">
                                        <label>City:</label>
                                        <input type="text" name="city" id="city" class="form-control"
                                               placeholder="Enter your city" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                               placeholder="Enter your address" required/>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Create A License
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                                <div class="kt-portlet__body">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label>Cost:</label>
                                            <input type="number" name="amount" class="form-control"
                                                   placeholder="Enter Cost"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label>Starting Date:</label>
                                            <input type="date" name="endDate" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label>Closing Date:</label>
                                            <input type="date" name="city" id="city" class="form-control"
                                                   placeholder="Enter your city"/>
                                        </div>
                                    </div>
                                </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>
                </div>
            </div>
            <!-- end:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Create A Super Admin
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Enter your name"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Enter your email" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Password:</label>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Enter your password required ">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Gender:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="Male" required> Male
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="Female" required> Female
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Cnic:</label>
                                        <input type="text" name="cnic" class="form-control"
                                               placeholder="Enter Your Cnic" required/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class="form-control"
                                               placeholder="Enter Your Contact" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Salary:</label>
                                        <input type="number" name="salary" class="form-control"
                                               placeholder="Enter Your Salary" required/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Specialization:</label>
                                        <input type="text" name="specialization" class="form-control"
                                               placeholder="Enter Your Specialization" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="address" class="form-control"
                                               placeholder="Enter Your Address" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('adminEmployee.list')}}"
                                               class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Portlet-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Create Facilities
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="kt-checkbox-list">
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> AROMATHERAPY
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> ATHLETICS
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> BEAT
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> BEAUTY ROOM
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> CARDIO EQUIPMENT
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> COOL DOWN AIR SHOWERS
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> GYM WITH CRECHE
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> DM SPORTS STORE ON-SITE
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> FITNESS FRIDAYS
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> FREE PARKING
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> FREE WEIGHTS
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> FUNCTIONAL AREA
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> GROUP EXERCISE
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> HAIRDRESSING
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> IPAD BAR
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> IPOINT
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> LOUNGE AREA
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> MIND AND BODY STUDIO
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> MOVE STUDIO
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> OLYMPIC RINGS / PULL UP BAR
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> OUTDOOR GROUP EXERCISE
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> PHYSIOTHERAPY
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> PERSONAL TRAINING
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> RELAXATION AREA
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> RESISTANCE EQUIPMENT
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> SAUNA
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> SPA POOL
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> SPIN STUDIO
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> SQUASH COURTS
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> STEAM ROOM
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> SUNBED
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> SWIMMING LESSONS
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> SWIMMING POOL
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> TOWELS
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> WIFI
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox"> X-LIFT AREA
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('custom-script')
    <script>
        $(document).ready(function () {
            $('input[type="radio"]').click(function () {
                if ($(this).attr("value") == "no") {
                    $(".trialEndsAt").css('display', 'none');
                }
                if ($(this).attr("value") == "yes") {
                    $(".trialEndsAt").css('display', 'block');
                }
            });
        });
    </script>
@endsection
