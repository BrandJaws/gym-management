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
                                    Edit A Membership
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
                                        <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{$gym->name}}"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Duration:</label>
                                        <input type="text" name="duration" class="form-control" placeholder="Enter your duration" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Amount:</label>
                                        <input type="text" name="amount" class="form-control" placeholder="Enter your Amount">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Included Member:</label>
                                        <input type="number" name="includedMember" class="form-control" placeholder="Enter your member">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Monthly Fee:</label>
                                        <input type="text" name="monthlyFee" class="form-control" placeholder="Enter your monthly fee" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Detail:</label>
                                        <input type="text" name="detail" class="form-control" placeholder="Enter Your Detail" />
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Update" class="btn btn-primary" />
                                            <a href="{{route('membership.list')}}" class="btn btn-secondary">Cancel</a>
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