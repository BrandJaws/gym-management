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
                                    Update Member
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{ route('member.edit') }}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" value="{{$lead->id}}" name="id">
                            <div class="form-group row">
                                <div class="col-lg-8 ">
                                    <div class="kt-portlet__body">
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
                                                <input type="number" name="phone" class="form-control" required
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
                                                <select class="form-control" id="sel1" name="type"
                                                        onchange="changeDiv(this.value)">
                                                    <option value="Lead" @if($lead->type == "Lead" ) selected @endif>
                                                        Lead
                                                    </option>
                                                    <option value="Member"
                                                            @if($lead->type == "Member" ) selected @endif>Member
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
                                            <div class="col-lg-6 textField" style="display: none">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control"
                                                       placeholder="Enter your password  ">
                                                @if($errors->has('password'))
                                                    <div class="error">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 textField" style="display: none">
                                                <label>Re-Password</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                       placeholder="Enter your password again ">
                                                @if($errors->has('password_confirmation'))
                                                    <div
                                                        class="error">{{ $errors->first('password_confirmation') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 textField" style="display: none">
                                                <label>Membership :</label>
                                                <select class="form-control" name="membership_id">
                                                    @foreach($membership as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
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
                                                            @if($lead->status == "Not Joined" ) selected @endif>Not
                                                        Joined
                                                    </option>
                                                    <option value="Active"
                                                            @if($lead->status == "Active" ) selected @endif>Active
                                                    </option>
                                                    <option value="In-Active"
                                                            @if($lead->status == "In-Active" ) selected @endif>In-Active
                                                    </option>
                                                    <option value="Expired"
                                                            @if($lead->status == "Expired" ) selected @endif>Expired
                                                    </option>
                                                </select>
                                            </div>
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
                                <div class="col-lg-4 ">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <div class="profileImageSide">
                                                <label class="col-form-label">Profile Image</label>
                                                <div class="profileImage">
                                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
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
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('employee.member')}}" class="btn btn-secondary">Cancel</a>
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
                                            <td colspan="8" align="center">
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
        <!-- end:: Content -->
    </div>
@endsection
@section('custom-script')
    <script src="{{asset('js/select2.js')}}"></script>
    <script src="{{asset('js/ktavatar.js')}}"></script>
    <script type="text/javascript">
        function changeDiv(value) {
            if (value == "Member") {
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
