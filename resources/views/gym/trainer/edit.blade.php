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
                                    Update Trainer
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('trainer.edit')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" name="gym_id" class="form-control" disabled
                                   value="{{ Auth::guard('employee')->user()->gym_id }}"/>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-8 ">
                                        <div class="form-group row">
                                            <div class="col-lg-4 ">
                                                <label class="">Gym:</label>
                                                <input type="text" name="name" class="form-control" disabled
                                                       value="{{ Auth::guard('employee')->user()->gym->name }}"/>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>First Name:</label>
                                                <input type="text" maxlength="25" name="firstName" class="form-control"
                                                       placeholder="Enter First Name"/>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Last Name:</label>
                                                <input type="text" maxlength="25" name="lastName" class="form-control"
                                                       placeholder="Enter Last Name"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Date Of Birth:</label>
                                                <input type="date" name="dob" class="form-control"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Gender:</label>
                                                <div class="kt-radio-inline">
                                                    <label class="kt-radio kt-radio--solid">
                                                        <input type="radio" name="gender" value="Male"> Male
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--solid">
                                                        <input type="radio" name="gender" value="Female"> Female
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Phone #</label>
                                                <input type="number" name="email" class="form-control"
                                                       placeholder="Enter Phone Number "/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Email:</label>
                                                <input type="text" name="email" class="form-control"
                                                       placeholder="Enter full email"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Password:</label>
                                                <input type="text" name="password" class="form-control"
                                                       placeholder="Enter Password"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Re-Password:</label>
                                                <input type="text" name="re-password" class="form-control"
                                                       placeholder="Enter Re-Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Qualification:</label>
                                                <input type="text" name="qualification" class="form-control"
                                                       placeholder="Enter Your Qualification"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Specialites:</label>
                                                <input type="text" name="speciality" class="form-control"
                                                       placeholder="Enter Your Specialites"/>
                                                <span class="help-block m-b-none" style="font-style: italic">Each separated with a comma.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>Note:</label>
                                                <textarea type="text" name="note" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="profileImageSide">
                                                    <label class="col-form-label">Trainer Image</label>
                                                    <div class="profileImage">
                                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                             id="kt_user_avatar_3">
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset('assets/media/users/avatar.png')}})">
                                                            </div>
                                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip"
                                                                   title=""
                                                                   data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="image"
                                                                       accept=".png, .jpg, .jpeg">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                                  title=""
                                                                  data-original-title="Cancel avatar">
                                                                <i class="fa fa-times"></i>
                                                            </span>
                                                        </div>
                                                        <span
                                                            class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('trainer.list')}}" class="btn btn-secondary">Cancel</a>
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

@section('custom-script')
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{asset('js/input-mask.js')}}"></script>
@endsection
