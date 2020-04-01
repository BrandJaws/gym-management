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
                                    Update Supplier
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('supplier.edit')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{  $supplier->id }}"/>
                            <input type="hidden" class="form-control" name="gym_id" value="{{  Auth::guard('employee')->user()->gym->id }}"/>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-6 countryDropdown">
                                        <label class="">Gym:</label>
                                        <input type="text" class="form-control" disabled
                                               value="{{  Auth::guard('employee')->user()->gym->name }}"/>
                                        @if($errors->has('gym_id'))
                                            <div class="error">{{ $errors->first('gym_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Status:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="status" value="Active"
                                                       @if( $supplier->status == "Active" ) checked @endif required>
                                                Active
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="status" value="In-Active"
                                                       @if( $supplier->status == "In-Active" ) checked @endif required>
                                                In-Active
                                                <span></span>
                                            </label>
                                        </div>
                                        @if($errors->has('status'))
                                            <div class="error">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" required
                                               value="{{  $supplier->name }}"
                                               placeholder="Enter Supplier Name"/>
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email:</label>
                                        <input type="text" name="email" class="form-control"
                                               value="{{  $supplier->email }}"
                                               placeholder="Enter Supplier Email"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class="form-control" required
                                               value="{{  $supplier->phone }}"
                                               placeholder="Enter Supplier Phone"/>
                                        @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Note:</label>
                                        <textarea name="note" class="form-control"
                                                  placeholder="Enter Note">{{  $supplier->note }}</textarea>
                                        @if($errors->has('note'))
                                            <div class="error">{{ $errors->first('note') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('supplier.list')}}" class="btn btn-secondary">Cancel</a>
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
@endsection
