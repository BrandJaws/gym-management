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
                                    Create A Treasury
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('treasury.create')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="form-group row mb-15">
                                    <div class="col-lg-4">
                                        <label>Type:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" id="employee" value="Employee" required
                                                       onclick="changeDiv()"> Employee
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" id="member" value="Member" required
                                                       onclick="changeDiv()"> Member
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" id="supplier" value="Supplier" required
                                                       onclick="changeDiv()"> Supplier
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" id="trainer" value="Trainer" required
                                                       onclick="changeDiv()"> Trainer
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" id="other" value="Other" required
                                                       onclick="changeDiv()"> Other
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Flow:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="In" required> In
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="Out" required> Out
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="Extra" required> Extra
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="Discount" required> Discount
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-15">
                                    <div class="col-lg-4 countryDropdown">
                                        <label class="">Gym:</label>
                                        <input type="text" value="{{ Auth::guard('employee')->user()->gym->name }}"
                                               class="form-control" disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Name:</label>
                                        <select class="form-control" name="employee_id">
                                            @foreach($employee as $row)
                                                <option value="{{ $row->id }}"
                                                        @if($row->id == Auth::guard('employee')->user()->id ) selected @endif>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Date:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="date" class="form-control"
                                                   placeholder="Enter your Date" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-15">
                                    <div class="col-lg-4 employeeField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="employeePurpose">
                                            <option disabled>Please select one . . . !</option>
                                            <option value="Salary">Salary</option>
                                            <option value="Bonus">Bonus</option>
                                            <option value="Loan">Loan</option>
                                            <option value="Commission">Commission</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 employeeField" style="display: none">
                                        <label>Employee:</label>
                                        <select class="form-control" name="employeeId">
                                            <option disabled>Please select one . . . !</option>
                                            @foreach($employee as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 trainerField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="trainerPurpose">
                                            <option disabled>Please select one . . . !</option>
                                            <option value="Salary">Salary</option>
                                            <option value="Bonus">Bonus</option>
                                            <option value="Loan">Loan</option>
                                            <option value="Commission">Commission</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 trainerField" style="display: none">
                                        <label>Trainer:</label>
                                        <select class="form-control" name="trainer_id">
                                            <option disabled>Please select one . . . !</option>
                                            @foreach($trainer as $row)
                                                <option value="{{ $row->id }}">{{ $row->firstName }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 memberField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="memberPurpose">
                                            <option disabled>Please select one . . . !</option>
                                            <option value="Membership">Membership Fee</option>
                                            <option value="Trainer Fee">Trainer Fee</option>
                                            <option value="Fine">Fine</option>
                                            <option value="Extra Charges">Extra Charges</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 memberField" style="display: none">
                                        <label>Member:</label>
                                        <select class="form-control" name="member_id">
                                            <option disabled>Please select one . . . !</option>
                                            @foreach($member as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 supplierField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="supplierPurpose">
                                            <option disabled>Please select one . . . !</option>
                                            <option value="Products Bill">Products Bill</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 supplierField" style="display: none">
                                        <label>Supplier:</label>
                                        <select class="form-control" name="supplier_id">
                                            <option disabled>Please select one . . . !</option>
                                            @foreach($supplier as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 otherField" style="display: none">
                                        <label>Purpose:</label>
                                        <input type="text" name="otherPurpose" class="form-control"
                                               placeholder="Enter your Value"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Value:</label>
                                        <input type="text" name="value" class="form-control" required
                                               placeholder="Enter your Value"/>
                                    </div>
                                </div>

                                <div class="form-group row mb-15">
                                    <div class="col-lg-6">
                                        <label>Note:</label>
                                        <textarea class="form-control" name="note" required
                                                  placeholder="Enter Your Note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('treasury.list')}}" class="btn btn-secondary">Cancel</a>
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
        function changeDiv() {
            var employeeField = document.getElementById('employee');
            if (employeeField.checked === true) {
                var div = document.getElementsByClassName('employeeField');
                for (var i = 0; i < div.length; i++) {
                    $(div[i]).show();
                }
            } else {
                var div = document.getElementsByClassName('employeeField');
                for (var i = 0; i < div.length; i++) {
                    $(div[i]).hide();
                }
            }
            var memberField = document.getElementById('member');
            if (memberField.checked === true) {
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
            var supplierField = document.getElementById('supplier');
            if (supplierField.checked === true) {
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
            var trainerField = document.getElementById('trainer');
            if (trainerField.checked === true) {
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
            var otherField = document.getElementById('other');
            if (otherField.checked === true) {
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
