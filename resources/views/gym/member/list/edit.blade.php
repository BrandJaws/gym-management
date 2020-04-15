@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body kt-portlet__body--fit-y">
                                <!--begin::Widget -->
                                <div class="kt-widget kt-widget--user-profile-4">
                                    <div class="kt-widget__head">
                                        <div class="kt-widget__media">
                                            <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/in.jpg')}}" alt="image" style="height: 100%;">
                                        </div>
                                        <div class="kt-widget__content">
                                            <div class="kt-widget__section">
                                                <a href="#" class="kt-widget__username">
                                                    Total Cash-In
                                                </a>
                                                <div class="kt-widget__button">
                                                    <h2>{{ $treasuryCashIn }}</h2>
                                                </div>
                                                <div class="kt-widget__button">
                                                    <span class="btn btn-label-warning btn-sm">Active</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end::Widget -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body kt-portlet__body--fit-y">
                                <!--begin::Widget -->
                                <div class="kt-widget kt-widget--user-profile-4">
                                    <div class="kt-widget__head">
                                        <div class="kt-widget__media">
                                            <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/out.jpg')}}" alt="image" style="height: 100%;">
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
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end::Widget -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body kt-portlet__body--fit-y">
                                <!--begin::Widget -->
                                <div class="kt-widget kt-widget--user-profile-4">
                                    <div class="kt-widget__head">
                                        <div class="kt-widget__media">
                                            <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/discount.jpg')}}" alt="image" style="height: 100%;">
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
                                <!--end::Widget -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body kt-portlet__body--fit-y">
                                <!--begin::Widget -->
                                <div class="kt-widget kt-widget--user-profile-4">
                                    <div class="kt-widget__head">
                                        <div class="kt-widget__media">
                                            <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/extra.png')}}" alt="image" style="height: 100%;">
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
                                <!--end::Widget -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        @include('_layouts.flash-message')
                    </div>
                </div>
                <!--Begin::App-->
                <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                    <!--Begin:: App Aside Mobile Toggle-->
                    <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                        <i class="la la-close"></i>
                    </button>
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
                                            @if($lead->userImage != "")
                                                <img src="{{ URL::to('/') }}/{{ $lead->userImage->path }}" alt="image">
                                            @endif
                                            @if($lead->userImage == "")
                                                <img src="{{  asset('assets/media/users/avatar.png') }}" alt="image">
                                            @endif
                                        </div>
                                        <div class="kt-widget__content">
                                            <div class="kt-widget__section">
                                                <a href="#" class="kt-widget__username">
                                                    {{$lead->name}}
                                                    <i class="flaticon2-correct kt-font-success"></i>
                                                </a>
                                                <span class="kt-widget__subtitle">
																{{$lead->type}}
															</span>
                                            </div>
                                            <div class="kt-widget__action">
                                                <button type="button"
                                                        class="btn btn-info btn-sm">{{$lead->status}}</button>&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget__body">
                                        <div class="kt-widget__content">
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label">Email:</span>
                                                <a href="#" class="kt-widget__data">{{$lead->email}}</a>
                                            </div>
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label">Phone:</span>
                                                <a href="#" class="kt-widget__data">{{$lead->phone}}</a>
                                            </div>
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label">Code For Login:</span>
                                                <a href="#" class="kt-widget__data">{{$lead->code}}</a>
                                            </div>
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label">Location:</span>
                                                <span class="kt-widget__data">{{$lead->address}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if($lead->membership  != "" )
                                        <div class="kt-widget__body">
                                            <h6>Membership Detail</h6>
                                            <div class="kt-widget__content">
                                                <div class="kt-widget__info">
                                                    <span class="kt-widget__label">Membership Name:</span>
                                                    <a href="#"
                                                       class="kt-widget__data">   {{ $lead->membership->name }}</a>
                                                </div>
                                                <div class="kt-widget__info">
                                                    <span class="kt-widget__label">Monthly Fee:</span>
                                                    <a href="#"
                                                       class="kt-widget__data"> {{ $lead->membership->monthlyFee }}</a>
                                                </div>
                                                <div class="kt-widget__info">
                                                    <span class="kt-widget__label">Duration:</span>
                                                    <span class="kt-widget__data"> {{ $lead->membership->duration }} Days</span>
                                                </div>
                                                <hr>
                                                <div class="kt-widget__info">
                                                    <p> {{ $lead->membership->detail }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                        <form action="{{ route('member.edit') }}" method="POST"
                              enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="kt-portlet">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
                                                <h3 class="kt-portlet__head-title">{{$lead->type}} Information
                                                    <small>update {{$lead->type}} informaiton</small></h3>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$lead->id}}" name="id">
                                        <div class="kt-portlet__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Profile
                                                            Image</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="profileImageSide">
                                                                <div class="profileImage">
                                                                    <div
                                                                        class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                                        id="kt_user_avatar_3">
                                                                        @if($lead->userImage != "")
                                                                            <div class="kt-avatar__holder"
                                                                                 style="background-image: url('{{ URL::to('/') }}/{{ $lead->userImage->path }}')">
                                                                            </div>
                                                                        @endif
                                                                        @if($lead->userImage == "")
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
                                                    <div class="form-group row">
                                                        <div class="col-lg-6 ">
                                                            <label>Name :</label>
                                                            <input type="text" name="name" class="form-control" required
                                                                   value="{{$lead->name}}"
                                                                   placeholder="Enter name"/>
                                                            @if($errors->has('name'))
                                                                <div class="error">{{ $errors->first('name') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Phone :</label>
                                                            <input type="number" name="phone" class="form-control"
                                                                   required
                                                                   value="{{$lead->phone}}"
                                                                   placeholder="Enter phone"/>
                                                            @if($errors->has('phone'))
                                                                <div class="error">{{ $errors->first('phone') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Source :</label>
                                                            <select class="form-control" name="source">
                                                                <option value="{{$lead->source}}"
                                                                        disabled>{{$lead->source}}</option>
                                                                <option value="None">None</option>
                                                                <option value="NewsPaper">NewsPaper</option>
                                                                <option value="TV">TV</option>
                                                                <option value="Radio">Radio</option>
                                                                <option value="Friends">Friends</option>
                                                                <option value="Magazine">Magazine</option>
                                                                <option value="Social Media">Social Media</option>
                                                            </select>
                                                            @if($errors->has('source'))
                                                                <div class="error">{{ $errors->first('source') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Email :</label>
                                                            <input type="email" name="email" class="form-control"
                                                                   value="{{$lead->email}}"
                                                                   placeholder="Enter email"/>
                                                            @if($errors->has('email'))
                                                                <div class="error">{{ $errors->first('email') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Type :</label>
                                                            <select class="form-control" id="typeMember" name="type"
                                                                    onclick="changeDiv()">
                                                                <option value="Lead"
                                                                        @if($lead->type == "Lead" ) selected @endif>
                                                                    Lead
                                                                </option>
                                                                <option value="Member"
                                                                        @if($lead->type == "Member" ) selected @endif>
                                                                    Member
                                                                </option>
                                                            </select>
                                                            @if($errors->has('source'))
                                                                <div class="error">{{ $errors->first('source') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-6 textField" style="display: none">
                                                            <label>Joining Date</label>
                                                            <input type="date" name="joiningDate"
                                                                   value="{{ \Carbon\Carbon::parse($lead->joiningDate)->format('yy-m-d')}}"
                                                                   class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6 textField" style="display: none">
                                                            <label>Password</label>
                                                            <input type="password" name="password" class="form-control"
                                                                   placeholder="Enter your password  ">
                                                            @if($errors->has('password'))
                                                                <div
                                                                    class="error">{{ $errors->first('password') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-6 textField" style="display: none">
                                                            <label>Re-Password</label>
                                                            <input type="password" name="password_confirmation"
                                                                   class="form-control"
                                                                   placeholder="Enter your password again ">
                                                            @if($errors->has('password_confirmation'))
                                                                <div
                                                                    class="error">{{ $errors->first('password_confirmation') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6 textField" style="display: none">
                                                            <label>Membership :</label>
                                                            <select class="form-control" name="membership_id">
                                                                <option value="">Select one . . . !</option>
                                                                @foreach($membership as $row)
                                                                    <option value="{{ $row->id }}"
                                                                            @if($row->id == $lead->membership_id) selected @endif>{{ $row->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('source'))
                                                                <div class="error">{{ $errors->first('source') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-6 textField" style="display: none">
                                                            <label>Status :</label>
                                                            <select class="form-control" name="status">
                                                                <option value="Not Joined"
                                                                        @if($lead->status == "Not Joined" ) selected @endif>
                                                                    Not
                                                                    Joined
                                                                </option>
                                                                <option value="Active"
                                                                        @if($lead->status == "Active" ) selected @endif>
                                                                    Active
                                                                </option>
                                                                <option value="In-Active"
                                                                        @if($lead->status == "In-Active" ) selected @endif>
                                                                    In-Active
                                                                </option>
                                                                <option value="Expired"
                                                                        @if($lead->status == "Expired" ) selected @endif>
                                                                    Expired
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Remarks :</label>
                                                            <textarea name="remarks" class="form-control" required
                                                                      placeholder="Enter Remarks">{{$lead->remarks}}</textarea>
                                                            @if($errors->has('remarks'))
                                                                <div class="error">{{ $errors->first('remarks') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Address:</label>
                                                            <textarea name="address" class="form-control" required
                                                                      placeholder="Enter Address">{{$lead->address}}</textarea>
                                                            @if($errors->has('address'))
                                                                <div class="error">{{ $errors->first('address') }}</div>
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
                                                        <button type="submit" class="btn btn-success">Submit</button>&nbsp;
                                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
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
                                                    <th>Employee</th>
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
                                                        <td>{{ $row->employee->name }}</td>
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
                    <div class="col-lg-12">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Call & Demo History
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 ">
                                    <div class="kt-portlet__body">
                                        <table class="table table-striped- table-bordered table-hover table-checkable">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Type</th>
                                                <th>Employee</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Transfer Status</th>
                                                <th>Transfer Employee</th>
                                                <th>Re-Schedule Date</th>
                                                <th>Remarks</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            @foreach($callHistory as $row)
                                                <tr>
                                                    <th>{{$i}}</th>
                                                    <td>{{ $row->type }}</td>
                                                    <td>{{ $row->employee->name }}</td>
                                                    <td>{{ $row->scheduleDate }}</td>
                                                    <td>{{ $row->status }}</td>
                                                    <td>{{ $row->transferStatus }}</td>
                                                    <td>@if($row->transferEmployee != NULL) {{ $row->transferEmployee->name }} @else
                                                            --- @endif</td>
                                                    <td>@if($row->reScheduleDate != NULL) {{ $row->reScheduleDate }} @else
                                                            --- @endif</td>
                                                    <td>{{ $row->remarks }}</td>
                                                </tr>
                                                <?php  $i++; ?>
                                            @endforeach
                                            <tr>
                                                <td colspan="9" align="center">
                                                    {{ $callHistory->links() }}
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


        </div>
        @endsection
        @section('custom-script')
            <script src="{{asset('js/select2.js')}}"></script>
            <script src="{{asset('js/ktavatar.js')}}"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    var typeMemberValue = document.getElementById('typeMember').value;
                    if (typeMemberValue === "Member") {
                        var div = document.getElementsByClassName('textField');
                        for (var i = 0; i < div.length; i++) {
                            div[i].style.display = "block";
                        }
                    } else {
                        var div = document.getElementsByClassName('textField');
                        for (var i = 0; i < div.length; i++) {
                            div[i].style.display = "none";
                        }
                    }
                });
                function changeDiv() {
                    var typeMemberValue = document.getElementById('typeMember').value;
                    if (typeMemberValue === "Member") {
                        var div = document.getElementsByClassName('textField');
                        for (var i = 0; i < div.length; i++) {
                            div[i].style.display = "block";
                        }
                    } else {
                        var div = document.getElementsByClassName('textField');
                        for (var i = 0; i < div.length; i++) {
                            div[i].style.display = "none";
                        }
                    }
                }
            </script>
@endsection
