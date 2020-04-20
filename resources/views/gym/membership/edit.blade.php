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
                                    Update Membership
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('membership.edit')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" value="{{$membership->id}}" name="id">
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-6 gymDropdown ">
                                        <label>Gym:</label>
                                        @if(count($gym) > 1)
                                            <select class="form-control kt-select2" id="kt_select2_3" name="gym_id[]"
                                                    required value="{{$membership->gym_id}}"
                                                    multiple="multiple">
                                                @foreach ($gym as $gymList)
                                                    <option
                                                        value="{{$gymList->id}}" {{in_array("$gymList->id",$gymSelectedList)?"selected":""}} >{{$gymList->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="form-control kt-select2" id="kt_select2_3" name="gym_id[]"
                                                    required value="{{$membership->gym_id}}"
                                                    multiple="multiple">
                                                @foreach ($gym as $gymList)
                                                    <option
                                                        value="{{$gymList->id}}" {{in_array("$gymList->id",$gymSelectedList)?"selected":""}} >{{$gymList->name}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" maxlength="55" class="form-control" required
                                               value="{{$membership->name}}" placeholder="Enter your name"/>
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Registration Fee:</label>
                                        <input type="number" name="registrationFee" maxlength="55" class="form-control"
                                               value="{{$membership->registrationFee}}"
                                               required placeholder="Enter Registration Fee">
                                        @if($errors->has('registrationFee'))
                                            <div class="error">{{ $errors->first('registrationFee') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Monthly Fee:</label>
                                        <input type="number" name="monthlyFee" maxlength="55" class="form-control"
                                               value="{{$membership->monthlyFee}}"
                                               required placeholder="Enter Monthly fee"/>
                                        @if($errors->has('monthlyFee'))
                                            <div class="error">{{ $errors->first('monthlyFee') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Affiliate Status:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--brand" >
                                                <input type="radio" name="affiliateStatus"
                                                       @if( $membership->affiliateStatus == "Yes") checked
                                                       @endif value="Yes" required> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--brand" >
                                                <input type="radio" name="affiliateStatus"
                                                       @if( $membership->affiliateStatus == "No") checked
                                                       @endif value="No" required>
                                                No
                                                <span></span>
                                            </label>
                                            @if($errors->has('affiliateStatus'))
                                                <div class="error">{{ $errors->first('affiliateStatus') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3 includeOthers" style="display: none;">
                                        <label>Include Members:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                <input type="checkbox" name="spouse"
                                                       @if( $membership->spouse == "Spouse") checked
                                                       @endif value="Spouse"> Spouse
                                                <span></span>
                                            </label>
                                            <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                <input type="checkbox" name="children"
                                                       @if( $membership->children == "Children") checked
                                                       @endif value="Children">
                                                Children
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>No. Of Members:</label>
                                        <input type="number" name="noOfMembers" maxlength="55" class="form-control"
                                               value="{{$membership->noOfMembers}}"
                                               placeholder="Enter No. Of Members"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Detail:</label>
                                        <textarea name="detail" class="form-control" required maxlength="155"
                                                  placeholder="Enter Detail">{{$membership->detail}}</textarea>
                                        @if($errors->has('detail'))
                                            <div class="error">{{ $errors->first('detail') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <a href="{{route('membership.list')}}"
                                               class="btn btn-secondary">Cancel</a>
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
    <script>
        $(document).ready(function () {
            $('input[type="radio"]').click(function () {
                if ($(this).attr("value") == "No") {
                    $(".includeOthers").css('display', 'none');
                }
                if ($(this).attr("value") == "Yes") {
                    $(".includeOthers").css('display', 'block');
                }
            });
        });
    </script>
@endsection
