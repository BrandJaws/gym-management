@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        @include('_layouts.flash-message')
        <form action="{{ url('admin/gym/create') }}" method="POST" enctype="multipart/form-data"
              class="kt-form kt-form--label-right">
            {{csrf_field()}}
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
                                                <input type="radio" name="inTrial" value="1" required> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="0" required> No
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 trialEndsAt" style="display: none;">
                                        <label>Trial Ends At:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="trialEndsAt" class="form-control"
                                                   placeholder="Enter your Date">
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
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="England">England</option>
                                            <option value="America">America</option>
                                            <option value="India">India</option>
                                            <option value="China">China</option>
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
                                        <input type="date" name="startDate" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Closing Date:</label>
                                        <input type="date" name="endDate" class="form-control"/>
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
                                        <input type="text" name="employeeName" class="form-control" required
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
                                        <input type="password" name="password" class="form-control" required
                                               placeholder="Enter your password  ">
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
                                        <input type="text" name="empAddress" class="form-control"
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
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="AROMATHERAPY">
                                                    AROMATHERAPY
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="ATHLETICS">
                                                    ATHLETICS
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="BEAT"> BEAT
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="BEAUTY ROOM">
                                                    BEAUTY ROOM
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="GYM WITH CRECHE">
                                                    GYM WITH CRECHE
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="LOUNGE AREA">
                                                    LOUNGE AREA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="FITNESS FRIDAYS">
                                                    FITNESS FRIDAYS
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="FREE PARKING">
                                                    FREE PARKING
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="FREE WEIGHTS">
                                                    FREE WEIGHTS
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="FUNCTIONAL AREA">
                                                    FUNCTIONAL AREA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="GROUP EXERCISE">
                                                    GROUP EXERCISE
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="HAIRDRESSING">
                                                    HAIRDRESSING
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="IPAD BAR"> IPAD
                                                    BAR
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="IPOINT"> IPOINT
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="DM SPORTS STORE ON-SITE"> DM SPORTS STORE ON-SITE
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="MIND AND BODY STUDIO"> MIND AND BODY STUDIO
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="MOVE STUDIO"> MOVE
                                                    STUDIO
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="PHYSIOTHERAPY">
                                                    PHYSIOTHERAPY
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="OUTDOOR GROUP EXERCISE"> OUTDOOR GROUP EXERCISE
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="OLYMPIC RINGS / PULL UP BAR"> OLYMPIC RINGS / PULL UP
                                                    BAR
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="PERSONAL TRAINING"> PERSONAL TRAINING
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="RELAXATION AREA">
                                                    RELAXATION AREA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="RESISTANCE EQUIPMENT"> RESISTANCE EQUIPMENT
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="SAUNA"> SAUNA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="SPA POOL"> SPA
                                                    POOL
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="SPIN STUDIO"> SPIN
                                                    STUDIO
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="SQUASH COURTS">
                                                    SQUASH COURTS
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="STEAM ROOM"> STEAM
                                                    ROOM
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="SUNBED"> SUNBED
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="SWIMMING LESSONS">
                                                    SWIMMING LESSONS
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="SWIMMING POOL">
                                                    SWIMMING POOL
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="TOWELS"> TOWELS
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="WIFI"> WIFI
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="X-LIFT AREA">
                                                    X-LIFT AREA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]" value="CARDIO EQUIPMENT">
                                                    CARDIO EQUIPMENT
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="COOL DOWN AIR SHOWERS"> COOL DOWN AIR SHOWERS
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
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
                if ($(this).attr("value") == "0") {
                    $(".trialEndsAt").css('display', 'none');
                }
                if ($(this).attr("value") == "1") {
                    $(".trialEndsAt").css('display', 'block');
                }
            });
        });
    </script>
@endsection
