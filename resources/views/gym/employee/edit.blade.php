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
                                    Update Employee
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{ route('employee.edit') }}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$employee->id}}" name="id">
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-4 countryDropdown">
                                        <label>Gym:</label>
                                        @if(count($gym) > 1)
                                            <select class="form-control kt-select2" id="kt_select2_1" name="gym_id"
                                                    autofocus required>
                                                <option
                                                    value="{{$employee->gym_id}}">{{$employee->gym->name}}</option>
                                                @foreach ($gym as $gymList)
                                                    <option value="{{$gymList->id}}">{{$gymList->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <input type="hidden" name="gym_id" class="form-control"
                                                   value="{{$employee->gym_id}}"/>
                                            <input type="text" class="form-control"
                                                   value="{{ $employee->gym->name }}"
                                                   disabled/>
                                        @endif
                                        @if($errors->has('gym_id'))
                                            <div class="error">{{ $errors->first('gym_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" required
                                               value="{{$employee->name}}"/>
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Gender:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="Male"
                                                       {{ ($employee->gender=="Male")? "checked" : "" }} required> Male
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="Female"
                                                       {{ ($employee->gender=="Female")? "checked" : "" }} required>
                                                Female
                                                <span></span>
                                            </label>
                                            @if($errors->has('gender'))
                                                <div class="error">{{ $errors->first('gender') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" required
                                               value="{{$employee->email}}"/>
                                        @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Password:</label>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Enter password">
                                        @if($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Re-Password:</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                               placeholder="Enter re-password">
                                        @if($errors->has('password_confirmation'))
                                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Time In:</label>
                                        <input type="time" name="timeIn" class="form-control"
                                               value="{{$employee->timeIn}}" required>
                                        @if($errors->has('timeIn'))
                                            <div class="error">{{ $errors->first('timeIn') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Time Out:</label>
                                        <input type="time" name="timeOut" class="form-control"
                                               value="{{$employee->timeOut}}" required/>
                                        @if($errors->has('timeOut'))
                                            <div class="error">{{ $errors->first('timeOut') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Phone:</label>
                                        <input type="text" name="phone" class="form-control" required
                                               value="{{$employee->phone}}" placeholder="Enter Phone No.">
                                        @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>CNIC:</label>
                                        <input type="text" name="cnic" class="form-control" required
                                               value="{{$employee->cnic}}" placeholder="Enter CNIC">
                                        @if($errors->has('cnic'))
                                            <div class="error">{{ $errors->first('cnic') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Salary:</label>
                                        <input type="number" name="salary" class="form-control" required
                                               value="{{$employee->salary}}" placeholder="Enter Salary">
                                        @if($errors->has('salary'))
                                            <div class="error">{{ $errors->first('salary') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Specialization:</label>
                                        <input type="text" name="specialization" class="form-control" required
                                               value="{{$employee->specialization}}" placeholder="Enter Specialization">
                                        @if($errors->has('specialization'))
                                            <div class="error">{{ $errors->first('specialization') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Address:</label>
                                        <input type="text" name="address" class="form-control" required
                                               value="{{$employee->address}}" placeholder="Enter Address"/>
                                        @if($errors->has('address'))
                                            <div class="error">{{ $errors->first('address') }}</div>
                                        @endif
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
        </div>
        <!-- end:: Content -->
    </div>
@endsection
@section('custom-script')
    <script src="{{asset('js/select2.js')}}"></script>
@endsection
