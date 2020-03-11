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
                                        Update Gym
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" value="{{ $gym->name }}"
                                               placeholder="Enter full name" required/>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Trial In:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="1"
                                                       {{ ($gym->inTrial=="1")? "checked" : "" }} required> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="0"
                                                       {{ ($gym->inTrial=="0")? "checked" : "" }} required> No
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 trialEndsAt" style="display: none;">
                                        <label>Trial Ends At:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="trialEndsAt" class="form-control"
                                                   value="{{ \Carbon\Carbon::parse($gym->trialEndsAt)->format('yy-m-d')}}">
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
                                            <option value="{{ $gym->country }}" disabled>{{ $gym->country }}</option>
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
                                        <input type="text" name="state" class="form-control" value="{{ $gym->state }}"
                                               placeholder="Enter your state" required/>
                                    </div>
                                    <div class="col-md-4">
                                        <label>City:</label>
                                        <input type="text" name="city" class="form-control" value="{{ $gym->city }}"
                                               placeholder="Enter your city" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="address" class="form-control"
                                               value="{{ $gym->address }}"
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
                                        Update License
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Cost:</label>
                                        <input type="number" name="amount" class="form-control"
                                               value="{{ $gym->gymLicense->amount }}"
                                               placeholder="Enter Cost"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Starting Date:</label>
                                        <input type="date" name="startDate" class="form-control"
                                               value="{{ \Carbon\Carbon::parse($gym->gymLicense->startDate)->format('yy-m-d')}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Closing Date:</label>
                                        <input type="date" name="endDate" class="form-control"
                                               value="{{ \Carbon\Carbon::parse($gym->gymLicense->endDate)->format('yy-m-d')}}"/>
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
                                        Update Super Admin
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="employeeName" class="form-control" required
                                               value="{{ $gym->employee->name}}"
                                               placeholder="Enter your name"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ $gym->employee->email}}"
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
                                                <input type="radio" name="gender" value="Male"
                                                       {{ ($gym->employee->gender=="Male")? "checked" : "" }}  required>
                                                Male
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="Female"
                                                       {{ ($gym->employee->gender=="Female")? "checked" : "" }}  required>
                                                Female
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Cnic:</label>
                                        <input type="text" name="cnic" class="form-control"
                                               value="{{ $gym->employee->cnic }}"
                                               placeholder="Enter Your Cnic" required/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class="form-control"
                                               value="{{ $gym->employee->phone }}"
                                               placeholder="Enter Your Contact" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Salary:</label>
                                        <input type="number" name="salary" class="form-control"
                                               value="{{ $gym->employee->salary }}"
                                               placeholder="Enter Your Salary" required/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Specialization:</label>
                                        <input type="text" name="specialization" class="form-control"
                                               value="{{ $gym->employee->specialization }}"
                                               placeholder="Enter Your Specialization" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="empAddress" class="form-control"
                                               value="{{ $gym->employee->address }}"
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
                                        Update Facilities
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
                                                    <input type="checkbox" name="facilities[]"
                                                           value="AROMATHERAPY" @if($gym->services[0]->name=="0") {{ ($gym->services[0]->name=="0")? "checked" : "" }} @else @endif >
                                                    AROMATHERAPY
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="ATHLETICS" @if($gym->services[1]->name=="1") {{ ($gym->services[1]->name=="1")? "checked" : "" }}  @else @endif>
                                                    ATHLETICS
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="BEAT" @if($gym->services[2]->name=="2") {{ ($gym->services[2]->name=="2")? "checked" : "" }}  @else @endif>
                                                    BEAT
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="BEAUTY ROOM" @if($gym->services[3]->name=="3") {{ ($gym->services[3]->name=="3")? "checked" : "" }}  @else @endif>
                                                    BEAUTY ROOM
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="GYM WITH CRECHE" @if($gym->services[4]->name=="4") {{ ($gym->services[4]->name=="4")? "checked" : "" }}  @else @endif>
                                                    GYM WITH CRECHE
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="LOUNGE AREA" @if($gym->services[5]->name=="5") {{ ($gym->services[5]->name=="5")? "checked" : "" }}  @else @endif>
                                                    LOUNGE AREA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="FITNESS FRIDAYS" @if($gym->services[6]->name=="6") {{ ($gym->services[6]->name=="6")? "checked" : "" }}  @else @endif>
                                                    FITNESS FRIDAYS
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="FREE PARKING" @if($gym->services[7]->name=="7") {{ ($gym->services[7]->name=="7")? "checked" : "" }}  @else @endif>
                                                    FREE PARKING
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="FREE WEIGHTS" @if($gym->services[8]->name=="8") {{ ($gym->services[8]->name=="8")? "checked" : "" }}  @else @endif>
                                                    FREE WEIGHTS
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="FUNCTIONAL AREA" @if($gym->services[9]->name=="9") {{ ($gym->services[9]->name=="9")? "checked" : "" }}  @else @endif>
                                                    FUNCTIONAL AREA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="GROUP EXERCISE" @if($gym->services[10]->name=="10") {{ ($gym->services[10]->name=="10")? "checked" : "" }}  @else @endif>
                                                    GROUP EXERCISE
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="HAIRDRESSING" @if($gym->services[11]->name=="11") {{ ($gym->services[11]->name=="11")? "checked" : "" }}  @else @endif>
                                                    HAIRDRESSING
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="IPAD BAR" @if($gym->services[12]->name=="12") {{ ($gym->services[12]->name=="12")? "checked" : "" }}  @else @endif>
                                                    IPAD
                                                    BAR
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="IPOINT" @if($gym->services[13]->name=="13") {{ ($gym->services[13]->name=="13")? "checked" : "" }}  @else @endif>
                                                    IPOINT
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           @if($gym->services[14]->name=="14") {{ ($gym->services[14]->name=="14")? "checked" : "" }}  @else @endif
                                                           value="DM SPORTS STORE ON-SITE"> DM SPORTS STORE ON-SITE
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           @if($gym->services[15]->name=="15") {{ ($gym->services[15]->name=="15")? "checked" : "" }}  @else @endif
                                                           value="MIND AND BODY STUDIO"> MIND AND BODY STUDIO
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="MOVE STUDIO" @if($gym->services[16]->name=="16") {{ ($gym->services[16]->name=="16")? "checked" : "" }}  @else @endif>
                                                    MOVE
                                                    STUDIO
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="PHYSIOTHERAPY"  @if($gym->services[17]->name=="17") {{ ($gym->services[17]->name=="17")? "checked" : "" }}  @else @endif>
                                                    PHYSIOTHERAPY
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           @if($gym->services[18]->name=="18") {{ ($gym->services[18]->name=="18")? "checked" : "" }}  @else @endif
                                                           value="OUTDOOR GROUP EXERCISE"> OUTDOOR GROUP EXERCISE
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           @if($gym->services[19]->name=="19") {{ ($gym->services[19]->name=="19")? "checked" : "" }}  @else @endif
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
                                                           @if($gym->services[20]->name=="20") {{ ($gym->services[20]->name=="20")? "checked" : "" }}  @else @endif
                                                           value="PERSONAL TRAINING"> PERSONAL TRAINING
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="RELAXATION AREA" @if($gym->services[21]->name=="21") {{ ($gym->services[21]->name=="21")? "checked" : "" }} @else @endif >
                                                    RELAXATION AREA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           @if($gym->services[22]->name=="22") {{ ($gym->services[22]->name=="22")? "checked" : "" }} @else @endif
                                                           value="RESISTANCE EQUIPMENT"> RESISTANCE EQUIPMENT
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="SAUNA" @if($gym->services[23]->name=="23") {{ ($gym->services[23]->name=="23")? "checked" : "" }} @else @endif >
                                                    SAUNA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="SPA POOL" @if($gym->services[24]->name=="24") {{ ($gym->services[24]->name=="24")? "checked" : "" }} @else @endif >
                                                    SPA
                                                    POOL
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="SPIN STUDIO" @if($gym->services[25]->name=="25") {{ ($gym->services[25]->name=="25")? "checked" : "" }} @else @endif >
                                                    SPIN
                                                    STUDIO
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="SQUASH COURTS" @if($gym->services[26]->name=="26") {{ ($gym->services[26]->name=="26")? "checked" : "" }} @else @endif >
                                                    SQUASH COURTS
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="STEAM ROOM" @if($gym->services[27]->name=="27") {{ ($gym->services[27]->name=="27")? "checked" : "" }} @else @endif >
                                                    STEAM
                                                    ROOM
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="SUNBED" @if($gym->services[28]->name=="28") {{ ($gym->services[28]->name=="28")? "checked" : "" }} @else @endif >
                                                    SUNBED
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="SWIMMING LESSONS" @if($gym->services[29]->name=="29") {{ ($gym->services[29]->name=="29")? "checked" : "" }} @else @endif >
                                                    SWIMMING LESSONS
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="SWIMMING POOL" @if($gym->services[30]->name=="30") {{ ($gym->services[30]->name=="30")? "checked" : "" }} @else @endif >
                                                    SWIMMING POOL
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="TOWELS" @if($gym->services[31]->name=="31") {{ ($gym->services[31]->name=="31")? "checked" : "" }} @else @endif >
                                                    TOWELS
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="WIFI" @if($gym->services[32]->name=="32") {{ ($gym->services[32]->name=="32")? "checked" : "" }} @else @endif>
                                                    WIFI
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="X-LIFT AREA" @if($gym->services[33]->name=="33") {{ ($gym->services[33]->name=="33")? "checked" : "" }} @else @endif>
                                                    X-LIFT AREA
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           value="CARDIO EQUIPMENT" @if($gym->services[34]->name=="34") {{ ($gym->services[34]->name=="34")? "checked" : "" }} @else @endif>
                                                    CARDIO EQUIPMENT
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="facilities[]"
                                                           @if( $gym->services && $gym->services[35]->name=="35" ? $gym->services[35]->name : '' ) {{ ($gym->services[35]->name=="35")? "checked" : "" }} @else @endif
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
