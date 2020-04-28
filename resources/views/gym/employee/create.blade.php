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
                                    Create A Employee
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{ route('employee.create') }}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6 countryDropdown">
                                                <label>Gym:</label>
                                                @if(count($gym) > 1)
                                                    <select class="form-control kt-select2" id="kt_select2_1"
                                                            name="gym_id"
                                                            autofocus required>
                                                        @foreach ($gym as $gymList)
                                                            <option value="{{$gymList->id}}">{{$gymList->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select class="form-control kt-select2" id="kt_select2_1"
                                                            name="gym_id"
                                                            autofocus required>
                                                        @foreach ($gym as $gymList)
                                                            <option value="{{$gymList->id}}"
                                                                    selected>{{$gymList->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                @if($errors->has('gym_id'))
                                                    <div class="error">{{ $errors->first('gym_id') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Name:</label>
                                                <input type="text" name="name" maxlength="55" class="form-control"
                                                       required
                                                       placeholder="Enter name"/>
                                                @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
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
                                            <div class="col-lg-6">
                                                <label>Date Of Joining:</label>
                                                <input type="date" name="dateOfJoining" class="form-control" required />
                                                @if($errors->has('dateOfJoining'))
                                                    <div class="error">{{ $errors->first('dateOfJoining') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Phone:</label>
                                                <input type="text" name="phone" class="form-control" maxlength="14"
                                                       required
                                                       placeholder="Enter Phone No.">
                                                @if($errors->has('phone'))
                                                    <div class="error">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Email:</label>
                                                <input type="text" name="email" class="form-control"
                                                       maxlength="65"
                                                       required
                                                       placeholder="Enter email"/>
                                                @if($errors->has('email'))
                                                    <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Password:</label>
                                                <input type="password" name="password" class="form-control" required
                                                       maxlength="14"
                                                       placeholder="Enter password">
                                                @if($errors->has('password'))
                                                    <div class="error">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Re-Password:</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                       maxlength="14"
                                                       required
                                                       placeholder="Enter re-password">
                                                @if($errors->has('password_confirmation'))
                                                    <div
                                                        class="error">{{ $errors->first('password_confirmation') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Time In:</label>
                                                <input type="time" name="timeIn" class="form-control" required>
                                                @if($errors->has('timeIn'))
                                                    <div class="error">{{ $errors->first('timeIn') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Time Out:</label>
                                                <input type="time" name="timeOut" class="form-control" required/>
                                                @if($errors->has('timeOut'))
                                                    <div class="error">{{ $errors->first('timeOut') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>CNIC:</label>
                                                <input type="text" name="cnic" class="form-control" required
                                                       maxlength="21"
                                                       placeholder="Enter CNIC">
                                                @if($errors->has('cnic'))
                                                    <div class="error">{{ $errors->first('cnic') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Salary:</label>
                                                <input type="number" name="salary" class="form-control" required
                                                       maxlength="30"
                                                       placeholder="Enter Salary">
                                                @if($errors->has('salary'))
                                                    <div class="error">{{ $errors->first('salary') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Specialization:</label>
                                                <input type="text" name="specialization" class="form-control"
                                                       maxlength="55"
                                                       required
                                                       placeholder="Enter Specialization">
                                                @if($errors->has('specialization'))
                                                    <div class="error">{{ $errors->first('specialization') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Address:</label>
                                                <textarea name="address" class="form-control" required maxlength="155"
                                                          placeholder="Enter Address"></textarea>
                                                @if($errors->has('address'))
                                                    <div class="error">{{ $errors->first('address') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-12">
                                                <div class="profileImageSide">
                                                    <label class="col-form-label">Employee Image</label>
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
                                                                <input type="file" name="image" accept=".png, .jpg, .jpeg">
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
                                        <div class="kt-portlet">
                                            <div class="kt-portlet__head">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        Update Permissions
                                                    </h3>
                                                </div>
                                            </div>
                                            <!--begin::Form-->
                                            <div class="kt-portlet__body">
                                                <div class="form-group row">
                                                    <div class="kt-checkbox-list">
                                                        <div class="row">
                                                            @if(count($gymModule) >= 0)
                                                                @foreach ($gymModule as $module)
                                                                    <div class="col-md-5">
                                                                        <label class="kt-checkbox">
                                                                            <input type="checkbox" name="modules[]" value="{{$module->gym_module_id}}">{{$module->gymModules->name}}
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <p>None</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Form-->
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
    <script src="{{asset('js/input-mask.js')}}"></script>
    <script src="{{asset('js/ktavatar.js')}}"></script>
@endsection
