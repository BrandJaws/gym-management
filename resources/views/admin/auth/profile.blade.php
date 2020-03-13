@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        @include('_layouts.flash-message')
        <form action="{{route('admin.profile')}}" method="POST" enctype="multipart/form-data"
              class="kt-form kt-form--label-right">
            {{csrf_field()}}
            <input type="hidden" value="{{ Auth::guard('admin')->user()->id }}" name="user_id">
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Update Profile
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ Auth::guard('admin')->user()->name }}"
                                                   placeholder="Enter full name" required/>
                                            @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Phone No.</label>
                                            <input type="number" name="phone" class="form-control"
                                                   value="{{ Auth::guard('admin')->user()->phone }}"
                                                   placeholder="Enter Phone No." required/>
                                            @if($errors->has('phone'))
                                                <div class="error">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" name="email" class="form-control"
                                                   value="{{ Auth::guard('admin')->user()->email }}"
                                                   placeholder="Enter full email" required/>
                                            @if($errors->has('email'))
                                                <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="Enter New Password" />
                                            @if($errors->has('password'))
                                                <div class="error">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Re-Password :</label>
                                            <input type="password" name="re-password" class="form-control"
                                                   placeholder="Enter New Re-Password" />
                                            @if($errors->has('re-password'))
                                                <div class="error">{{ $errors->first('re-password') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('admin.home')}}"
                                               class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="profileImageSide">
                                            <label class="col-form-label">Circle Style</label>
                                            <div class="profileImage">
                                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_user_avatar_3">
                                                    <div class="kt-avatar__holder" style="background-image: url(assets/media/users/100_3.jpg)"></div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                                </div>
                                                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
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
            <!-- end:: Content -->
        </form>
    </div>
@endsection

@section('custom-script')
    <script src="{{asset('js/ktavatar.js')}}"></script>
@endsection
