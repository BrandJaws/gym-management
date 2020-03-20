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
                                    Create A Trainer
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
                                        <input type="text" name="name" class="form-control" placeholder="Enter full name" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter full email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Password:</label>
                                        <input type="text" name="password" class="form-control" placeholder="Enter Your Password"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Gender:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="2"> Male
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="2"> Female
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Phone:</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Qualification:</label>
                                        <input type="text" name="qualification" class="form-control" placeholder="Enter Your Qualification" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Speciality:</label>
                                        <input type="text" name="speciality" class="form-control" placeholder="Enter Your Speciality"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Note:</label>
                                        <input type="text" name="note" class="form-control" placeholder="Enter Your Note" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Status:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="status" value="2"> Active
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="status" value="2"> Inactive
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('trainer.member')}}" class="btn btn-secondary">Cancel</a>
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
