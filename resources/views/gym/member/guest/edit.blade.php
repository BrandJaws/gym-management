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
                                    Action <small> {{$breadcrumbs}} </small>
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{ route('member.pipelineUpdate') }}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" class="form-control" value="{{ $pipeline->id }}" name="pipeline_id"/>
                            <input type="hidden" class="form-control" value="{{ $pipeline->gym_id }}" name="gym_id"/>
                            <div class="form-group row">
                                <div class="col-lg-8 ">
                                    <div class="kt-portlet__body">
                                        <div class="form-group row">
                                            <div class="col-lg-6 form-group">
                                                <label>Customer Name :</label>
                                                <input type="text" class="form-control"
                                                       value="{{ $pipeline->member->name }}"
                                                       disabled/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Phone :</label>
                                                <input type="text" class="form-control"
                                                       value="{{ $pipeline->member->phone }}"
                                                       disabled/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Source :</label>
                                                <input type="text" class="form-control"
                                                       value="{{ $pipeline->member->source }}"
                                                       disabled/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Email :</label>
                                                <input type="text" class="form-control"
                                                       value="{{ $pipeline->member->email }}"
                                                       disabled/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Employee Name :</label>
                                                <select class="form-control" name="employee_id">
                                                    @foreach($employee as $row)
                                                        <option value="{{ $row->id }}"
                                                                @if($row->id == $pipeline->employee_id ) selected @endif>{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('employee_id'))
                                                    <div class="error">{{ $errors->first('employee_id') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Type :</label>
                                                <select class="form-control" name="type">
                                                    <option value="For Demo"
                                                            @if($breadcrumbs == "For Demo" ) selected @endif >
                                                        For Demo
                                                    </option>
                                                    <option value="For Call"
                                                            @if($breadcrumbs == "Edit Call" || $breadcrumbs == "Edit Failed Call" ||  $breadcrumbs == "Edit Transfer Call" ) selected @endif >
                                                        For Call
                                                    </option>
                                                </select>
                                                @if($errors->has('type'))
                                                    <div class="error">{{ $errors->first('type') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Schedule Date :</label>
                                                <input type="date" name="scheduleDate" class="form-control"
                                                       value="{{ \Carbon\Carbon::parse($pipeline->joiningDate)->format('yy-m-d')}}"
                                                       required/>
                                                @if($errors->has('scheduleDate'))
                                                    <div class="error">{{ $errors->first('scheduleDate') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Status :</label>
                                                <select class="form-control" name="status">
                                                    <option value="Pending"
                                                            @if($pipeline->status == "Pending" ) selected @endif >
                                                        Pending
                                                    </option>
                                                    <option value="Success"
                                                            @if($pipeline->status == "Success" ) selected @endif >
                                                        Success
                                                    </option>
                                                    <option value="Failed Call"
                                                            @if($pipeline->status == "Failed Calls" ) selected @endif >
                                                        Failed Calls
                                                    </option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <div class="error">{{ $errors->first('status') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label for="sel1">Transfer Status:</label>
                                                <select class="form-control" id="transferStatus" name="transferStatus"
                                                        onclick="changeDiv()">
                                                    <option value="None"
                                                            @if($pipeline->type == "None" ) selected @endif>None
                                                    </option>
                                                    <option value="For Call"
                                                            @if($pipeline->type == "For Calls" ) selected @endif>For
                                                        Call
                                                    </option>
                                                    <option value="For Demo"
                                                            @if($pipeline->type == "For Demo" ) selected @endif>For Demo
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 form-group textField" style="display: none">
                                                <label>Transfer Employee :</label>
                                                <select class="form-control" name="transfer_id">
                                                    <option value=" ">Please Select</option>
                                                    @foreach($employee as $row)
                                                        <option value="{{ $row->id }}"
                                                                @if($row->id == $pipeline->transfer_id ) selected @endif>{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 form-group textField" style="display: none">
                                                <label>Re-Schedule Date :</label>
                                                <input type="date" name="reScheduleDate"
                                                       value="{{ \Carbon\Carbon::parse($pipeline->reScheduleDate)->format('yy-m-d')}}"
                                                       class="form-control"/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Interested Packages : </label>
                                                @if(count($membership) > 0)
                                                    <select class="form-control kt-select2" id="kt_select2_3"
                                                            name="intersetedPackages[]"
                                                            multiple="multiple">
                                                        @foreach ($membership as $list)
                                                            <option
                                                                value="{{$list->id}}" {{in_array("$list->id",$packageList)?"selected":""}}>{{$list->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Remarks :</label>
                                                <textarea name="remarks" class="form-control"
                                                          placeholder="Enter Remarks">{{ $pipeline->remarks }}</textarea>
                                                @if($errors->has('remarks'))
                                                    <div class="error">{{ $errors->first('remarks') }}</div>
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
                                                        @if($pipeline->employee->userImage != "")
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url('{{ URL::to('/') }}/{{ $pipeline->employee->userImage->path }}')">
                                                            </div>
                                                        @endif
                                                        @if($pipeline->employee->userImage == "")
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset('assets/media/users/avatar.png')}})">
                                                            </div>
                                                        @endif
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
                                            <a href="{{route('member.pipelineUpdate')}}" class="btn btn-secondary">Cancel</a>
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
    <script type="text/javascript">
        $(document).ready(function () {
            var value = document.getElementById('transferStatus').value;
            if (value === "For Call" || value === "For Demo") {
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
            var value = document.getElementById('transferStatus').value;
            if (value === "For Call" || value === "For Demo") {
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
