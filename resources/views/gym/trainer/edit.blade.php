@extends('_layouts.index')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-iconbox kt-iconbox--brand kt-iconbox--animate-slower">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon"></div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                                        <div class="kt-widget kt-widget--user-profile-4">
                                            <div class="kt-widget__head">
                                                <div class="kt-widget__media">
                                                    <div class="kt-iconbox__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z" fill="#000000" opacity="0.3"/>
                                                                <path d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z" fill="#000000"/>
                                                                <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="kt-widget__content">
                                                    <div class="kt-widget__section">
                                                        <a href="#" class="kt-widget__username">
                                                            Total Cash-In
                                                        </a>
                                                        <div class="kt-widget__button">
                                                            <h4>{{ $treasuryCashIn }}</h4>
                                                        </div>
                                                        <div class="kt-widget__button">
                                                            <span class="btn btn-label-warning btn-sm">Active</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon"></div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                                        <div class="kt-widget kt-widget--user-profile-4">
                                            <div class="kt-widget__head">
                                                <div class="kt-widget__media">
                                                    <div class="kt-iconbox__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
                                                                <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="kt-widget__content">
                                                    <div class="kt-widget__section">
                                                        <a href="#" class="kt-widget__username">
                                                            Total Cash-Out
                                                        </a>
                                                        <div class="kt-widget__button">
                                                            <h2>{{ $treasuryCashOut }}</h2>
                                                        </div>
                                                        <div class="kt-widget__button">
                                                            <span class="btn btn-label-warning btn-sm">Active</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-iconbox kt-iconbox--warning kt-iconbox--animate-fast">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon"></div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                                        <div class="kt-widget kt-widget--user-profile-4">
                                            <div class="kt-widget__head">
                                                <div class="kt-widget__media">
                                                    <div class="kt-iconbox__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                                <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="kt-widget__content">
                                                    <div class="kt-widget__section">
                                                        <a href="#" class="kt-widget__username">
                                                            Total Cash-Discount
                                                        </a>
                                                        <div class="kt-widget__button">
                                                            <h2>{{ $treasuryCashDiscount }}</h2>
                                                        </div>
                                                        <div class="kt-widget__button">
                                                            <span class="btn btn-label-warning btn-sm">Active</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-iconbox kt-iconbox--danger kt-iconbox--animate-faster">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon"></div>
                                <div class="kt-iconbox__desc">
                                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                                        <div class="kt-widget kt-widget--user-profile-4">
                                            <div class="kt-widget__head">
                                                <div class="kt-widget__media">
                                                    <div class="kt-iconbox__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="kt-widget__content">
                                                    <div class="kt-widget__section">
                                                        <a href="#" class="kt-widget__username">
                                                            Total Cash-Extra
                                                        </a>
                                                        <div class="kt-widget__button">
                                                            <h2>{{ $treasuryCashExtra }}</h2>
                                                        </div>
                                                        <div class="kt-widget__button">
                                                            <span class="btn btn-label-warning btn-sm">Active</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('_layouts.flash-message')
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
                            <input type="hidden" name="gym_id" class="form-control"
                                   value="{{ Auth::guard('employee')->user()->gym_id }}"/>
                            @if($errors->has('gym_id'))
                                <div class="error">{{ $errors->first('gym_id') }}</div>
                            @endif
                            <input type="hidden" name="id" class="form-control"
                                   value="{{ $trainer->id }}"/>
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <div class="col-lg-8 ">
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-4 ">
                                                <label class="">Gym:</label>
                                                <input type="text" class="form-control" disabled
                                                       value="{{ Auth::guard('employee')->user()->gym->name }}"/>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>First Name:</label>
                                                <input type="text" maxlength="25" name="firstName" class="form-control"
                                                       value="{{ $trainer->firstName }}"
                                                       required
                                                       placeholder="Enter First Name"/>
                                                @if($errors->has('firstName'))
                                                    <div class="error">{{ $errors->first('firstName') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Last Name:</label>
                                                <input type="text" maxlength="25" name="lastName" class="form-control"
                                                       value="{{ $trainer->lastName }}"
                                                       required placeholder="Enter Last Name"/>
                                                @if($errors->has('lastName'))
                                                    <div class="error">{{ $errors->first('lastName') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Date Of Birth:</label>
                                                <input type="date" name="dob" value="{{ $trainer->dob }}"
                                                       class="form-control" required/>
                                                @if($errors->has('dob'))
                                                    <div class="error">{{ $errors->first('dob') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Gender:</label>
                                                <div class="kt-radio-inline">
                                                    <label class="kt-radio kt-radio--solid">
                                                        <input type="radio" name="gender" value="Male"
                                                               {{ ($trainer->gender=="Male")? "checked" : "" }}  required>
                                                        Male
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--solid">
                                                        <input type="radio" name="gender" value="Female"
                                                               {{ ($trainer->gender=="Female")? "checked" : "" }} required>
                                                        Female
                                                        <span></span>
                                                    </label>
                                                    @if($errors->has('gender'))
                                                        <div class="error">{{ $errors->first('gender') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Phone #</label>
                                                <input type="number" name="phone" class="form-control"
                                                       value="{{ $trainer->phone }}"
                                                       placeholder="Enter Phone Number "/>
                                                @if($errors->has('phone'))
                                                    <div class="error">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Email:</label>
                                                <input type="text" name="email" class="form-control" required
                                                       value="{{ $trainer->email }}"
                                                       placeholder="Enter full email"/>
                                                @if($errors->has('email'))
                                                    <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
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
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Qualification:</label>
                                                <input type="text" name="qualification" class="form-control"
                                                       value="{{ $trainer->qualification }}"
                                                       placeholder="Enter Your Qualification"/>
                                                @if($errors->has('qualification'))
                                                    <div class="error">{{ $errors->first('qualification') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Specialites:</label>
                                                <input type="text" name="specialities" class="form-control"
                                                       value="{{ $trainer->specialities }}"
                                                       placeholder="Enter Your Specialites"/>
                                                @if($errors->has('specialities'))
                                                    <div class="error">{{ $errors->first('specialities') }}</div>
                                                @endif
                                                <span class="help-block m-b-none" style="font-style: italic">Each separated with a comma.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Status:</label>
                                                <select name="status" class="form-control">
                                                    <option value="Active" @if( $trainer->status == "Active" ) selected @endif >Active
                                                    </option>
                                                    <option value="Block" @if( $trainer->status == "Block" ) selected @endif>Block</option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <div class="error">{{ $errors->first('status') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Note:</label>
                                                <textarea type="text" name="note" class="form-control"
                                                          placeholder="Enter Note">{{ $trainer->note }}</textarea>
                                                @if($errors->has('note'))
                                                    <div class="error">{{ $errors->first('note') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row mb-15">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="profileImageSide">
                                                    <div class="profileImage">
                                                        <div
                                                            class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                            id="kt_user_avatar_3">
                                                            @if($trainer->userImage != "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url('{{ URL::to('/') }}/{{ $trainer->userImage->path }}')">
                                                                </div>
                                                            @endif
                                                            @if($trainer->userImage == "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url({{asset('assets/media/users/avatar.png')}})">
                                                                </div>
                                                            @endif
                                                            <label class="kt-avatar__upload"
                                                                   data-toggle="kt-tooltip" title=""
                                                                   data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="image"
                                                                       accept=".png, .jpg, .jpeg">
                                                            </label>
                                                            <span class="kt-avatar__cancel"
                                                                  data-toggle="kt-tooltip" title=""
                                                                  data-original-title="Cancel avatar">
                                                                        <i class="fa fa-times"></i>
                                                                        </span>
                                                        </div>
                                                        <p>Allowed file types: png, jpg, jpeg.</p>
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
                                            <input type="submit" value="Update" class="btn btn-primary">
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
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Account History
                                </h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 ">
                                <div class="kt-portlet__body">
                                    <table
                                        class="table table-striped- table-bordered table-hover table-checkable">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Trainer</th>
                                            <th>Cash Flow</th>
                                            <th>Type</th>
                                            <th>Value</th>
                                            <th>Date</th>
                                            <th>Purpose</th>
                                            <th>Note</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($treasuryDetail as $row)
                                            <tr>
                                                <th>{{$i}}</th>
                                                <td>{{ $row->trainer->firstName }}</td>
                                                <td>{{ $row->cashFlow }}</td>
                                                <td>{{ $row->type }}</td>
                                                <td>{{ $row->value }}</td>
                                                <td>{{ $row->date }}</td>
                                                <td>{{ $row->purpose }}</td>
                                                <td>{{ $row->note }}</td>
                                            </tr>
                                            <?php  $i++; ?>
                                        @endforeach
                                        <tr>
                                            <td colspan="8" align="center">
                                                {{ $treasuryDetail->links() }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
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
