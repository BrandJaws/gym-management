@extends('_layouts.index')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Create A Treasury
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="#" method="POST" enctype="multipart/form-data" class="kt-form kt-form--label-right">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-4 countryDropdown">
                                        <label class="">Gym:</label>
                                        <select class="form-control kt-select2" id="kt_select2_1" name="gym">
                                            @if(count($gyms) >= 0)
                                                @foreach ($gyms as $gym)
                                                    <option value="{{$gym->id}}">{{$gym->name}}</option>
                                                @endforeach
                                            @else
                                                <p>None</p>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter your Name" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Cash:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="2"> In
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="2"> Out
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="2"> Extra
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="2"> Discount
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Type:</label>
                                        <input type="text" name="type" class="form-control" placeholder="Enter your Type" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Value:</label>
                                        <input type="text" name="value" class="form-control" placeholder="Enter your Value"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Date:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="date" class="form-control" placeholder="Enter your Date">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Purpose:</label>
                                        <input type="text" name="purpose" class="form-control" placeholder="Enter your Purpose"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Note:</label>
                                        <input type="text" name="note" class="form-control" placeholder="Enter Your Note" />
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('treasury.member')}}" class="btn btn-secondary">Cancel</a>
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
@endsection
