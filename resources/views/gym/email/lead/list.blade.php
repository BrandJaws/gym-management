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
                                    Lead <small>(Send Notification Via Email)</small>
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('email.sendMail')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" class="form-control" name="gym_id"
                                   value="{{  Auth::guard('employee')->user()->gym->id }}"/>
                            <input type="hidden" class="form-control" name="status"
                                   value="Lead"/>
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-12 countryDropdown">
                                                <label class="">Gym:</label>
                                                <input type="text" class="form-control" disabled
                                                       value="{{  Auth::guard('employee')->user()->gym->name }}"/>
                                                @if($errors->has('gym_id'))
                                                    <div class="error">{{ $errors->first('gym_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-12">
                                                <label>Lead:</label>
                                                <select class="form-control kt-select2" id="kt_select2_3"
                                                        name="lead_id[]"
                                                        required
                                                        multiple="multiple">
                                                    @foreach ($lead as $list)
                                                        <option value="{{$list->id}}" selected>{{$list->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-12 countryDropdown">
                                                <label class="">Subject:</label>
                                                <input type="text" name="subject" class="form-control"
                                                       placeholder="Subject" value=""/>
                                                @if($errors->has('subject'))
                                                    <div class="error">{{ $errors->first('subject') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-12 countryDropdown">
                                                <label class="">Message:</label>
                                                <textarea type="text" name="message" placeholder="Message"
                                                          class="form-control"></textarea>
                                                @if($errors->has('message'))
                                                    <div class="error">{{ $errors->first('message') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-12">
                                                <div class="profileImageSide">
                                                    <div class="profileImage">
                                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                             id="kt_user_avatar_3">
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset('assets/media/users/email.jpg')}})">
                                                            </div>
                                                            {{--                                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip"--}}
                                                            {{--                                                                   title=""--}}
                                                            {{--                                                                   data-original-title="Change avatar">--}}
                                                            {{--                                                                <i class="fa fa-pen"></i>--}}
                                                            {{--                                                                <input type="file" name="image"--}}
                                                            {{--                                                                       accept=".png, .jpg, .jpeg">--}}
                                                            {{--                                                            </label>--}}
                                                            {{--                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip"--}}
                                                            {{--                                                                  title=""--}}
                                                            {{--                                                                  data-original-title="Cancel avatar">--}}
                                                            {{--                                                                <i class="fa fa-times"></i>--}}
                                                            {{--                                                            </span>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script src="{{asset('js/ktavatar.js')}}"></script>
@endsection
