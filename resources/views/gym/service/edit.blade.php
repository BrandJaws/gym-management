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
                                    Update Service
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('service.edit')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" name="id" required class="form-control" value="{{$gymServices->id}}"/>
                            <div class="kt-portlet__body">
                                <div class="form-group row mb-15">
                                    <div class="col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" required class="form-control"
                                               value="{{$gymServices->name}}"
                                               placeholder="Enter Service Name"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Fee:</label>
                                        <input type="text" name="fee" required class="form-control"
                                               value="{{$gymServices->fee}}"
                                               placeholder="Enter Service Fee"/>
                                    </div>
                                </div>
                                <div class="form-group row mb-15">
                                    <div class="col-lg-6">
                                        <label>Status:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="status"
                                                       @if($gymServices->status == "Active") checked
                                                       @endif value="Active" required> Active
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="status"
                                                       @if($gymServices->status == "In-Active") checked
                                                       @endif value="In-Active" required> In-Active
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 gymDropdown">
                                        <label>Gym:</label>
                                        @if(count($gym) > 1)
                                            <select class="form-control kt-select2" id="kt_select2_3" name="gym_id[]"
                                                    required
                                                    multiple="multiple">
                                                @foreach ($gym as $gymList)
                                                    <option
                                                        value="{{$gymList->id}}" {{in_array("$gymList->id",$gymSelectedList)?"selected":""}}>{{$gymList->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="form-control kt-select2" id="kt_select2_3" name="gym_id[]"
                                                    required
                                                    multiple="multiple">
                                                @foreach ($gym as $gymList)
                                                    <option value="{{$gymList->id}}"
                                                            selected>{{$gymList->name}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <a href="{{route('service.list')}}" class="btn btn-secondary">Cancel</a>
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
