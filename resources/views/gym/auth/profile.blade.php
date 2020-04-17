@extends('_layouts.index')
@section('content')
    <!-- end:: Header -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    @include('_layouts.flash-message')
    <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!--Begin::App-->
            <form action="{{route('gym.profile')}}" method="POST" enctype="multipart/form-data"
                  class="kt-form kt-form--label-right">
                {{csrf_field()}}
                <input type="hidden" value="{{ Auth::guard('employee')->user()->id }}" name="user_id">
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <!--End:: App Aside Mobile Toggle-->
                <!--Begin:: App Aside-->
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                    <!--begin:: Widgets/Applications/User/Profile1-->
                    <div class="kt-portlet ">
                        <div class="kt-portlet__head  kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        @if(Auth::guard('employee')->user()->userImage != "")
                                            <img src="{{asset(Auth::guard('employee')->user()->userImage->path)}}" alt="image">
                                        @endif
                                        @if(Auth::guard('employee')->user()->userImage == "")
                                            <img src="{{asset('assets/media/users/avatar.png')}}" alt="image">
                                        @endif
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                {{ Auth::guard('employee')->user()->name }}
                                                <i class="flaticon2-correct kt-font-success"></i>
                                            </a>
                                            <span class="kt-widget__subtitle">
                                                Head of System
                                            </span>
                                        </div>
                                        <div class="kt-widget__action">
                                            <button type="button" class="btn btn-info btn-sm">{{ Auth::guard('employee')->user()->gym->name }}</button>&nbsp;
                                            <button type="button" class="btn btn-success btn-sm">Active</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Email:</span>
                                            <a href="#" class="kt-widget__data">{{ Auth::guard('employee')->user()->email }}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Phone:</span>
                                            <a href="#" class="kt-widget__data">{{ Auth::guard('employee')->user()->phone }}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Location:</span>
                                            <span class="kt-widget__data">{{ Auth::guard('employee')->user()->address }}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__items">
                                        <h3 class="kt-section__title kt-section__title-sm mb-4">Gym Info:</h3>
                                        <div class="profileImage">
                                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                 id="kt_user_avatar_1">
                                                @if(Auth::guard('employee')->user()->userImage != "")
                                                    <div class="kt-avatar__holder"
                                                         style="background-image: url('{{ URL::to('/') }}/{{ Auth::guard('employee')->user()->gym->gymImage->path }}')">
                                                    </div>
                                                @endif
                                                @if(Auth::guard('employee')->user()->userImage == "")
                                                    <div class="kt-avatar__holder"
                                                         style="background-image: url({{asset('assets/media/logos/gymLogo.jpg')}})">
                                                    </div>
                                                @endif
                                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                       data-original-title="Change avatar">
                                                    <i class="fa fa-pen"></i>
                                                    <input type="file" name="gymImage" accept=".png, .jpg, .jpeg">
                                                </label>
                                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                      data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                            </div>
                                            <span
                                                class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Gym:</span>
                                            <a href="#" class="kt-widget__data">{{ Auth::guard('employee')->user()->gym->name }}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Status:</span>
                                            <span class="kt-widget__data">{{ Auth::guard('employee')->user()->gym->status }}</span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Type:</span>
                                            <span class="kt-widget__data">{{ Auth::guard('employee')->user()->gym->gymType }}</span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">City:</span>
                                            <a href="#" class="kt-widget__data">{{ Auth::guard('employee')->user()->gym->city }}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Location:</span>
                                            <span class="kt-widget__data">{{ Auth::guard('employee')->user()->gym->address }}</span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Country:</span>
                                            <span class="kt-widget__data">{{ Auth::guard('employee')->user()->gym->country }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Widget -->
                        </div>
                    </div>
                    <!--end:: Widgets/Applications/User/Profile1-->
                </div>
                <!--End:: App Aside-->
                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col-lg-12">
                                <!--begin::Portlet-->
                                <div class="kt-portlet">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">Update Your Profile</h3>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">Employee Info:</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                             id="kt_user_avatar_3">
                                                            @if(Auth::guard('employee')->user()->userImage != "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url('{{ URL::to('/') }}/{{ Auth::guard('employee')->user()->userImage->path }}')">
                                                                </div>
                                                            @endif
                                                            @if(Auth::guard('employee')->user()->userImage == "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url({{asset('assets/media/users/avatar.png')}})">

                                                                </div>
                                                            @endif
                                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                                   data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                                  data-original-title="Cancel avatar">
                                                                <i class="fa fa-times"></i>
                                                            </span>
                                                        </div>
                                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="text" name="name" class="form-control"
                                                               value="{{ Auth::guard('employee')->user()->name }}"
                                                               placeholder="Enter full name" required/>
                                                        @if($errors->has('name'))
                                                            <div class="error">{{ $errors->first('name') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone No:</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="number" name="phone" class="form-control"
                                                               value="{{ Auth::guard('employee')->user()->phone }}"
                                                               placeholder="Enter Phone No." required/>
                                                        @if($errors->has('phone'))
                                                            <div class="error">{{ $errors->first('phone') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="email" name="email" class="form-control"
                                                               value="{{ Auth::guard('employee')->user()->email }}"
                                                               placeholder="Enter full email" required/>
                                                        @if($errors->has('email'))
                                                            <div class="error">{{ $errors->first('email') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="password" name="password" class="form-control"
                                                               placeholder="Enter New Password"/>
                                                        @if($errors->has('password'))
                                                            <div class="error">{{ $errors->first('password') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Re-Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="password" name="re-password" class="form-control"
                                                               placeholder="Enter New Re-Password"/>
                                                        @if($errors->has('re-password'))
                                                            <div class="error">{{ $errors->first('re-password') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-3 col-xl-3">
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="form-group">
                                                            <input type="submit" value="Update" class="btn btn-primary">
                                                            <a href="{{route('gym.home')}}"
                                                               class="btn btn-secondary">Cancel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <!--end::Portlet-->
                                <!-- end:: Content -->

                        </div>
                    </div>
                </div>

            </div>

            <!--End::App-->

        </form>
        <!-- end:: Content -->
    </div>

@endsection

@section('custom-script')
    <script src="{{asset('js/ktavatar.js')}}"></script>
@endsection
