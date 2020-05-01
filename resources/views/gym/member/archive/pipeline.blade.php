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
                        <form action="{{ route('member.pipelineStore') }}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" class="form-control" value="{{ $member->id }}" name="customer_id"/>
                            <input type="hidden" class="form-control" value="{{ $member->gym_id }}" name="gym_id"/>
                            <div class="form-group row">
                                <div class="col-lg-8 ">
                                    <div class="kt-portlet__body">
                                        <div class="form-group row">
                                            <div class="col-lg-6 form-group">
                                                <label>Lead Name :</label>
                                                <input type="text" class="form-control" value="{{ $member->name }}"
                                                       disabled/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Phone :</label>
                                                <input type="text" class="form-control" value="{{ $member->phone }}"
                                                       disabled/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Source :</label>
                                                <input type="text" class="form-control" value="{{ $member->source }}"
                                                       disabled/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Email :</label>
                                                <input type="text" class="form-control" value="{{ $member->email }}"
                                                       disabled/>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Employee Name :</label>
                                                <select class="form-control" name="employee_id">
                                                    @foreach($employee as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('employee_id'))
                                                    <div class="error">{{ $errors->first('employee_id') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Deal Stage :</label>
                                                <select class="form-control" name="stage">
                                                    <option value="Call Scheduled"
                                                            @if( $breadcrumbs == "Call Scheduled") selected @endif>Call
                                                        Scheduled
                                                    </option>
                                                    <option value="Appointment Scheduled"
                                                            @if( $breadcrumbs == "Appointment Scheduled") selected @endif>
                                                        Appointment Scheduled
                                                    </option>
                                                    <option value="Presentation Scheduled"
                                                            @if( $breadcrumbs == "Presentation Scheduled") selected @endif>
                                                        Presentation Scheduled
                                                    </option>
                                                    <option value="Contract Sent"
                                                            @if( $breadcrumbs == "Contract Sent") selected @endif>
                                                        Contract Sent
                                                    </option>
                                                    <option value="Qualified To Buy"
                                                            @if( $breadcrumbs == "Qualified To Buy") selected @endif>
                                                        Qualified To Buy
                                                    </option>
                                                    <option value="Closed Won"
                                                            @if( $breadcrumbs == "Closed Won") selected @endif>Closed
                                                        Won
                                                    </option>
                                                    <option value="Closed Lost"
                                                            @if( $breadcrumbs == "Closed Lost") selected @endif>Closed
                                                        Lost
                                                    </option>
                                                </select>
                                                @if($errors->has('stage'))
                                                    <div class="error">{{ $errors->first('stage') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Status :</label>
                                                <select class="form-control" name="status">
                                                    <option value="Pending">Pending</option>
                                                    <option value="Success">Success</option>
                                                    <option value="Absent">Absent</option>
                                                    <option value="Un-Answered">Un-Answered</option>
                                                    <option value="Failed Call">Failed Call</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Schedule Date & Time :</label>
                                                <input type="datetime-local" name="scheduleDate" class="form-control"/>
                                                @if($errors->has('scheduleDate'))
                                                    <div class="error">{{ $errors->first('scheduleDate') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Transfer Stage :</label>
                                                <select class="form-control" id="sel1" name="transferStage"
                                                        onchange="changeDiv(this.value)">
                                                    <option value="None">None</option>
                                                    <option value="Call Scheduled">Call Scheduled</option>
                                                    <option value="Appointment Scheduled">Appointment Scheduled</option>
                                                    <option value="Presentation Scheduled">Presentation Scheduled
                                                    </option>
                                                    <option value="Contract Sent">Contract Sent</option>
                                                    <option value="Qualified To Buy">Qualified To Buy</option>
                                                    <option value="Closed Won">Closed Won</option>
                                                    <option value="Closed Lost">Closed Lost</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 form-group textField" style="display: none">
                                                <label>Transfer Employee :</label>
                                                <select class="form-control" name="transfer_id">
                                                    <option value=" ">Please Select</option>
                                                    @foreach($employee as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 form-group textField" style="display: none">
                                                <label>Re-Status :</label>
                                                <select class="form-control" name="reStatus">
                                                    <option value="Pending">Pending</option>
                                                    <option value="Success">Success</option>
                                                    <option value="Absent">Absent</option>
                                                    <option value="Un-Answered">Un-Answered</option>
                                                    <option value="Failed Call">Failed Call</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 form-group textField" style="display: none">
                                                <label>Re-Schedule Date & Time :</label>
                                                <input type="datetime-local" name="reScheduleDate"
                                                       class="form-control"/>
                                            </div>
                                            <div class="col-lg-6 form-group gymDropdown">
                                                <label>Interested Packages :</label>
                                                @if(count($membership) > 0)
                                                    <select class="form-control kt-select2" id="kt_select2_3"
                                                            name="intersetedPackages[]"
                                                            multiple="multiple">
                                                        @foreach ($membership as $list)
                                                            <option value="{{$list->id}}">{{$list->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label>Remarks :</label>
                                                <textarea name="remarks" class="form-control"
                                                          placeholder="Enter Remarks"></textarea>
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
                                                        @if($member->userImage != "")
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url('{{ URL::to('/') }}/{{ $member->userImage->path }}')">
                                                            </div>
                                                        @endif
                                                        @if($member->userImage == "")
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
    <script type="text/javascript">
        function changeDiv(value) {
            if (value === "Call Scheduled" || value === "Appointment Scheduled" || value === "Presentation Scheduled" || value === "Contract Sent" || value === "Qualified To Buy" || value === "Closed Won" || value === "Closed Lost") {
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
