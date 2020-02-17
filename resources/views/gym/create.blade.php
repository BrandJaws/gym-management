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
                                    Create A Gym
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
                                        <input type="text" name="name" class="form-control" placeholder="Enter full name" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Trial In:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="2"> True
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="2"> False
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Trial Ends At:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="trialEndsAt" class="form-control" placeholder="Enter your Date">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="">City:</label>
                                        <select class="form-control kt-selectpicker" name="city" tabindex="-98">
                                            <option value="mustard">Lahore</option>
                                            <option value="ketchup">Islamabad</option>
                                            <option value="relish">Karachi</option>
                                            <option value="relish">Peshawer</option>
                                            <option value="relish">Multan</option>
                                            <option value="relish">Quetta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Status:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="status" value="2"> Active
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="status" value="2"> Inactive
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>State:</label>
                                        <input type="text" name="state" id="state" class="form-control" placeholder="Enter your state" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>License:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="license" value="2"> True
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="license" value="2"> False
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('gym.list')}}" class="btn btn-secondary">Cancel</a>
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
