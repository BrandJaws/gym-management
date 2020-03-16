@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        @include('_layouts.flash-message')
        <form action="{{ url('admin/gym/branch/add') }}" method="POST" enctype="multipart/form-data"
              class="kt-form kt-form--label-right">
            {{csrf_field()}}
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        <small> Create </small> &nbsp; {{ $gym->name }} <small> Branch </small>
                                        <input type="hidden" value="{{$gym->id }}" name="gym_id">
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Enter full name" required/>
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <label>Trial In:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="1" required> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="0" required> No
                                                <span></span>
                                            </label>
                                            @if($errors->has('inTrial'))
                                                <div class="error">{{ $errors->first('inTrial') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 trialEndsAt" style="display: none;">
                                        <label>Trial Ends At:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="trialEndsAt" class="form-control"
                                                   placeholder="Enter your Date">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                            @if($errors->has('trialEndsAt'))
                                                <div class="error">{{ $errors->first('trialEndsAt') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 countryDropdown">
                                        <label class="">Country:</label>
                                        <select class="form-control kt-select2" id="kt_select2_1" name="country">
                                            @if(count($countries) >= 0)
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            @else
                                                <p>None</p>
                                            @endif
                                        </select>
                                        @if($errors->has('country'))
                                            <div class="error">{{ $errors->first('country') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>State:</label>
                                        <input type="text" name="state" id="state" class="form-control"
                                               placeholder="Enter your state" required/>
                                        @if($errors->has('state'))
                                            <div class="error">{{ $errors->first('state') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>City:</label>
                                        <input type="text" name="city" id="city" class="form-control"
                                               placeholder="Enter your city" required/>
                                        @if($errors->has('city'))
                                            <div class="error">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                               placeholder="Enter your address" required/>
                                        @if($errors->has('address'))
                                            <div class="error">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Create A License
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Cost:</label>
                                        <input type="number" name="amount" class="form-control"
                                               placeholder="Enter Cost"/>
                                        @if($errors->has('amount'))
                                            <div class="error">{{ $errors->first('amount') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Starting Date:</label>
                                        <input type="date" name="startDate" class="form-control"/>
                                        @if($errors->has('startDate'))
                                            <div class="error">{{ $errors->first('startDate') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Closing Date:</label>
                                        <input type="date" name="endDate" class="form-control"/>
                                        @if($errors->has('endDate'))
                                            <div class="error">{{ $errors->first('endDate') }}</div>
                                        @endif
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
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Create Facilities
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="kt-checkbox-list">
                                        <div class="row">
                                            @if(count($facilities) >= 0)
                                                @foreach ($facilities as $facility)
                                                    <div class="col-md-4">
                                                        <label class="kt-checkbox">
                                                            <input type="checkbox" name="facilities[]"
                                                                   value="{{$facility->id}}"
                                                                {{in_array("$facility->id",$facilityList)?"checked":""}}>
                                                            {{$facility->name}}
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
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="submit" value="Save" class="btn btn-primary">
                                                <a href="{{route('gym.list')}}"
                                                   class="btn btn-secondary">Cancel</a>
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
        </form>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function () {
            $('input[type="radio"]').click(function () {
                if ($(this).attr("value") == "0") {
                    $(".trialEndsAt").css('display', 'none');
                }
                if ($(this).attr("value") == "1") {
                    $(".trialEndsAt").css('display', 'block');
                }
            });
        });
    </script>
    <script src="{{asset('js/select2.js')}}"></script>
@endsection

