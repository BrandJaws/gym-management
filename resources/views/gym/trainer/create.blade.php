@extends('_layouts.index')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @include('_layouts.flash-message')
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Create A Trainer
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('trainer.create')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" name="gym_id" class="form-control" value="{{ Auth::guard('employee')->user()->gym_id }}"/>
                            @if($errors->has('gym_id'))
                                <div class="error">{{ $errors->first('gym_id') }}</div>
                            @endif
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-8 ">
                                        <div class="form-group row">
                                            <div class="col-lg-4 ">
                                                <label class="">Gym:</label>
                                                <input type="text" class="form-control" disabled
                                                       value="{{ Auth::guard('employee')->user()->gym->name }}"/>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>First Name:</label>
                                                <input type="text" maxlength="25" name="firstName" class="form-control"
                                                       required
                                                       placeholder="Enter First Name"/>
                                                @if($errors->has('firstName'))
                                                    <div class="error">{{ $errors->first('firstName') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Last Name:</label>
                                                <input type="text" maxlength="25" name="lastName" class="form-control"
                                                       required placeholder="Enter Last Name"/>
                                                @if($errors->has('lastName'))
                                                    <div class="error">{{ $errors->first('lastName') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Date Of Birth:</label>
                                                <input type="date" name="dob" class="form-control" required/>
                                                @if($errors->has('dob'))
                                                    <div class="error">{{ $errors->first('dob') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Gender:</label>
                                                <div class="kt-radio-inline">
                                                    <label class="kt-radio kt-radio--solid">
                                                        <input type="radio" name="gender" value="Male" required> Male
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--solid">
                                                        <input type="radio" name="gender" value="Female" required>
                                                        Female
                                                        <span></span>
                                                    </label>
                                                    @if($errors->has('gender'))
                                                        <div class="error">{{ $errors->first('gender') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Phone #</label>
                                                <input type="number" name="phone" class="form-control"
                                                       placeholder="Enter Phone Number "/>
                                                @if($errors->has('phone'))
                                                    <div class="error">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Email:</label>
                                                <input type="text" name="email" class="form-control" required
                                                       placeholder="Enter full email"/>
                                                @if($errors->has('email'))
                                                    <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Password:</label>
                                                <input type="password" name="password" class="form-control"
                                                       placeholder="Enter password"/>
                                                @if($errors->has('password'))
                                                    <div class="error">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Re-Password:</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                       placeholder="Enter Password Confirmation"/>
                                                @if($errors->has('password_confirmation'))
                                                    <div
                                                        class="error">{{ $errors->first('password_confirmation') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Qualification:</label>
                                                <input type="text" name="qualification" class="form-control"
                                                       placeholder="Enter Your Qualification"/>
                                                @if($errors->has('qualification'))
                                                    <div class="error">{{ $errors->first('qualification') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Specialites:</label>
                                                <input type="text" name="specialities" class="form-control"
                                                       placeholder="Enter Your Specialites"/>
                                                @if($errors->has('specialities'))
                                                    <div class="error">{{ $errors->first('specialities') }}</div>
                                                @endif
                                                <span class="help-block m-b-none" style="font-style: italic">Each separated with a comma.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Status:</label>
                                                <select name="status" class="form-control">
                                                    <option value="Active">Active</option>
                                                    <option value="Block">Block</option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <div class="error">{{ $errors->first('status') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Note:</label>
                                                <textarea type="text" name="note" class="form-control"
                                                          placeholder="Enter Note"></textarea>
                                                @if($errors->has('note'))
                                                    <div class="error">{{ $errors->first('note') }}</div>
                                                @endif
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
                                                                   title="" data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="image"
                                                                       accept=".png, .jpg, .jpeg">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                                  title="" data-original-title="Cancel avatar">
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
    <script src="{{asset('js/ktavatar.js')}}"></script>
@endsection
