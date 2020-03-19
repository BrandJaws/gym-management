@extends('_layouts.index')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    @include('_layouts.flash-message')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Create A Member
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{ route('member.create') }}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-8 ">
                                    <div class="kt-portlet__body">
                                        <div class="form-group row">
                                            <div class="col-lg-6 ">
                                                <label>Name :</label>
                                                <input type="text" name="name" class="form-control" required
                                                       placeholder="Enter name"/>
                                                @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Phone :</label>
                                                <input type="number" name="phone" class="form-control" required
                                                       placeholder="Enter phone"/>
                                                @if($errors->has('phone'))
                                                    <div class="error">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Source :</label>
                                                <select class="form-control" required>
                                                    <option name="None">None</option>
                                                    <option name="NewsPaper">NewsPaper</option>
                                                    <option name="TV">TV</option>
                                                    <option name="Radio">Radio</option>
                                                    <option name="Friends">Friends</option>
                                                    <option name="Magazine">Magazine</option>
                                                    <option name="Social Media">Social Media</option>

                                                </select>
                                                @if($errors->has('source'))
                                                    <div class="error">{{ $errors->first('source') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Email :</label>
                                                <input type="email" name="email" class="form-control"
                                                       placeholder="Enter email"/>
                                                @if($errors->has('email'))
                                                    <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Remarks :</label>
                                                <textarea name="remarks" class="form-control" required
                                                          placeholder="Enter Remarks"></textarea>
                                                @if($errors->has('remarks'))
                                                    <div class="error">{{ $errors->first('remarks') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Address:</label>
                                                <textarea name="address" class="form-control" required
                                                          placeholder="Enter Address"></textarea>
                                                @if($errors->has('address'))
                                                    <div class="error">{{ $errors->first('address') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <div class="profileImageSide">
                                                <label class="col-form-label">Profile Image</label>
                                                <div class="profileImage">
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
                                                    <span
                                                        class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
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
@section('custom-script')
    <script src="{{asset('js/select2.js')}}"></script>
    <script src="{{asset('js/ktavatar.js')}}"></script>
@endsection
