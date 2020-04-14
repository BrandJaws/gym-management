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
                                    Update Membership
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('membership.edit')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" value="{{$membership->id}}" name="id">
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-4 gymDropdown ">
                                        <label>Gym:</label>
                                        @if(count($gym) > 1)
                                            <select class="form-control kt-select2" id="kt_select2_3" name="gym_id[]"
                                                    required value="{{$membership->gym_id}}"
                                                    multiple="multiple">
                                                @foreach ($gym as $gymList)
                                                    <option
                                                        value="{{$gymList->id}}" {{in_array("$gymList->id",$gymSelectedList)?"selected":""}} >{{$gymList->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="form-control kt-select2" id="kt_select2_3" name="gym_id[]"
                                                    required value="{{$membership->gym_id}}"
                                                    multiple="multiple">
                                                @foreach ($gym as $gymList)
                                                    <option
                                                        value="{{$gymList->id}}" {{in_array("$gymList->id",$gymSelectedList)?"selected":""}} >{{$gymList->name}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" required maxlength="55"
                                               value="{{$membership->name}}"/>
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Duration:</label>
                                        <input type="number" name="duration" class="form-control" required
                                               maxlength="55" placeholder="Enter Total Days"
                                               value="{{$membership->duration}}"/>
                                        @if($errors->has('duration'))
                                            <div class="error">{{ $errors->first('duration') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Amount:</label>
                                        <input type="number" name="amount" class="form-control" required maxlength="55"
                                               value="{{$membership->amount}}">
                                        @if($errors->has('amount'))
                                            <div class="error">{{ $errors->first('amount') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Monthly Fee:</label>
                                        <input type="number" name="monthlyFee" class="form-control" required
                                               maxlength="55"
                                               value="{{$membership->monthlyFee}}"/>
                                        @if($errors->has('monthlyFee'))
                                            <div class="error">{{ $errors->first('monthlyFee') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Detail:</label>
                                        <textarea name="detail" class="form-control" required maxlength="155"
                                                  placeholder="Enter Detail">{{$membership->detail}}</textarea>
                                        @if($errors->has('detail'))
                                            <div class="error">{{ $errors->first('detail') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <a href="{{route('membership.list')}}"
                                               class="btn btn-secondary">Cancel</a>
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
