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
                                    Edit Treasury {{  $treasury->treasuryType }}
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{ route('treasury.edit') }}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" value="{{ $treasury->id }}" name="id">
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Type:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="Employee" required
                                                       @if($treasury->type == "Employee") checked @endif
                                                       onchange="changeDiv(this.value)"> Employee
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="Member" required
                                                       @if($treasury->type == "Member") checked @endif
                                                       onchange="changeDiv(this.value)"> Member
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="Supplier" required
                                                       @if($treasury->type == "Supplier") checked @endif
                                                       onchange="changeDiv(this.value)"> Supplier
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="Trainer" required
                                                       @if($treasury->type == "Trainer") checked @endif
                                                       onchange="changeDiv(this.value)"> Trainer
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="type" value="Other" required
                                                       @if($treasury->type == "Other") checked @endif
                                                       onchange="changeDiv(this.value)"> Other
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Flow:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="In" required
                                                       @if($treasury->cashFlow == "In") checked @endif> In
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="Out" required
                                                       @if($treasury->cashFlow == "Out") checked @endif> Out
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="Extra" required
                                                       @if($treasury->cashFlow == "Extra") checked @endif> Extra
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="cashFlow" value="Discount" required
                                                       @if($treasury->cashFlow == "Discount") checked @endif> Discount
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
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
                                                        @if($row->id == $treasury->employee_id ) selected @endif>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Date:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="date" class="form-control"
                                                   value="{{ \Carbon\Carbon::parse($treasury->date)->format('yy-m-d')}}"
                                                   placeholder="Enter your Date" required>
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
                                        <select class="form-control" name="employeePurpose">
                                            <option value="Salary"  @if('Salary' == $treasury->purpose ) selected @endif>Salary</option>
                                            <option value="Bonus" @if('Bonus' == $treasury->purpose ) selected @endif>Bonus</option>
                                            <option value="Loan" @if('Loan' == $treasury->purpose ) selected @endif>Loan</option>
                                            <option value="Commission" @if('Commission' == $treasury->purpose ) selected @endif>Commission</option>
                                            <option value="Others" @if('Others' == $treasury->purpose ) selected @endif>Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 employeeField" style="display: none">
                                        <label>Employee:</label>
                                        <select class="form-control" name="employeeId">
                                            @foreach($employee as $row)
                                                <option value="{{ $row->id }}" @if($row->id == $treasury->employeeId ) selected @endif>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 trainerField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="trainerPurpose">
                                            <option value="Salary"  @if('Salary' == $treasury->purpose ) selected @endif>Salary</option>
                                            <option value="Bonus" @if('Bonus' == $treasury->purpose ) selected @endif>Bonus</option>
                                            <option value="Loan" @if('Loan' == $treasury->purpose ) selected @endif>Loan</option>
                                            <option value="Commission" @if('Commission' == $treasury->purpose ) selected @endif>Commission</option>
                                            <option value="Others" @if('Others' == $treasury->purpose ) selected @endif>Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 trainerField" style="display: none">
                                        <label>Trainer:</label>
                                        <select class="form-control" name="trainer_id">
                                            @foreach($trainer as $row)
                                                <option value="{{ $row->id }}"  @if($row->id == $treasury->trainer_id ) selected @endif>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 memberField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="memberPurpose">
                                            <option value="Membership" @if('Membership' == $treasury->purpose ) selected @endif>Membership Fee</option>
                                            <option value="Trainer Fee" @if('Trainer Fee' == $treasury->purpose ) selected @endif>Trainer Fee</option>
                                            <option value="Fine" @if('Fine' == $treasury->purpose ) selected @endif>Fine</option>
                                            <option value="Extra Charges" @if('Extra Charges' == $treasury->purpose ) selected @endif>Extra Charges</option>
                                            <option value="Others" @if('Others' == $treasury->purpose ) selected @endif>Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 memberField" style="display: none">
                                        <label>Member:</label>
                                        <select class="form-control" name="member_id">
                                            @foreach($member as $row)
                                                <option value="{{ $row->id }}" @if($row->id == $treasury->member_id ) selected @endif>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 supplierField" style="display: none">
                                        <label>Purpose:</label>
                                        <select class="form-control" name="supplierPurpose">
                                            <option value="Products Bill" @if('Products Bill' == $treasury->purpose ) selected @endif>Products Bill</option>
                                            <option value="Others" @if('Others' == $treasury->purpose ) selected @endif>Others</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 supplierField" style="display: none">
                                        <label>Supplier:</label>
                                        <select class="form-control" name="supplier_id">
                                            @foreach($supplier as $row)
                                                <option value="{{ $row->id }}" @if($row->id == $treasury->supplier_id ) selected @endif>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 otherField" style="display: none">
                                        <label>Purpose:</label>
                                        <input type="text" name="otherPurpose" class="form-control" value="{{ $treasury->purpose }}"
                                               placeholder="Enter your Value"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Value:</label>
                                        <input type="text" name="value" class="form-control" required value="{{ $treasury->value }}"
                                               value="{{ $treasury->value }}"
                                               placeholder="Enter your Value"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Note:</label>
                                        <textarea class="form-control" name="note" required
                                                  placeholder="Enter Your Note">{{ $treasury->note }}</textarea>
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
