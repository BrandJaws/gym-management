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

                                    <div class="col-lg-4">
                                        <label>Type:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="person" value="Employee"  onchange="changeDiv(this.value)"> Employee
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="person" value="Member" onchange="changeDiv(this.value)"> Member
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="person" value="Supplier" onchange="changeDiv(this.value)"> Supplier
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="person" value="Trainer" onchange="changeDiv(this.value)"> Trainer
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="person" value="Other" onchange="changeDiv(this.value)"> Other
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Flow:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="In"> In
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="Out"> Out
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="Extra"> Extra
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="Discount"> Discount
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4 countryDropdown">
                                        <label class="">Gym:</label>
                                        <input type="text" value="{{ Auth::guard('employee')->user()->gym->name }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Name:</label>
                                        <select class="form-control">
                                        @foreach($employee as $row)
                                            <option value="{{ $row->id }}" @if($row->id == Auth::guard('employee')->user()->id ) selected @endif>{{ $row->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Date:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="text" name="date" id="kt_inputmask_1" class="form-control" placeholder="Enter your Date">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4 employeeField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="purpose">
                                            <option value="Salary">Salary</option>
                                            <option value="Bonus">Bonus</option>
                                            <option value="Loan">Loan</option>
                                            <option value="Commission">Commission</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 employeeField" style="display: none">
                                        <label>Employee:</label>
                                        <select class="form-control">
                                            @foreach($employee as $row)
                                                <option value="{{ $row->id }}" >{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 trainerField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="purpose">
                                            <option value="Salary">Salary</option>
                                            <option value="Bonus">Bonus</option>
                                            <option value="Loan">Loan</option>
                                            <option value="Commission">Commission</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 trainerField" style="display: none">
                                        <label>Trainer:</label>
                                        <select class="form-control">
                                            @foreach($trainer as $row)
                                                <option value="{{ $row->id }}" >{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 memberField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="purpose">
                                            <option value="Membership">Membership Fee</option>
                                            <option value="Trainer Fee">Trainer Fee </option>
                                            <option value="Fine">Fine</option>
                                            <option value="Extra Charges">Extra Charges</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 memberField" style="display: none">
                                        <label>Member:</label>
                                        <select class="form-control">
                                            @foreach($member as $row)
                                                <option value="{{ $row->id }}" >{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 supplierField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="purpose">
                                            <option value="Products Bill">Products Bill</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 supplierField" style="display: none">
                                        <label>Supplier:</label>
                                        <select class="form-control">
                                            @foreach($supplier as $row)
                                                <option value="{{ $row->id }}" >{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 otherField" style="display: none">
                                        <label>Purpose:</label>
                                        <input type="text" name="purpose" class="form-control" placeholder="Enter your Value"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Value:</label>
                                        <input type="text" name="value" class="form-control" placeholder="Enter your Value"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Note:</label>
                                        <textarea class="form-control" name="note" placeholder="Enter Your Note"></textarea>
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
    <script src="{{asset('js/input-mask.js')}}"></script>
    <script type="text/javascript">
        function changeDiv(value) {
            if (value === "Employee") {
                var div = document.getElementsByClassName('employeeField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "block";
                }
            } else {
                var div = document.getElementsByClassName('employeeField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "none";
                }
            }

            if (value === "Member") {
                var div = document.getElementsByClassName('memberField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "block";
                }
            } else {
                var div = document.getElementsByClassName('memberField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "none";
                }
            }

            if (value === "Supplier") {
                var div = document.getElementsByClassName('supplierField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "block";
                }
            } else {
                var div = document.getElementsByClassName('supplierField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "none";
                }
            }
            if (value === "Trainer") {
                var div = document.getElementsByClassName('trainerField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "block";
                }
            } else {
                var div = document.getElementsByClassName('trainerField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "none";
                }
            }
            if (value === "Other") {
                var div = document.getElementsByClassName('otherField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "block";
                }
            } else {
                var div = document.getElementsByClassName('otherField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
