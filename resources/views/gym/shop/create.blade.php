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
                                    Create A Trainer
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('trainer.create')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" name="gym_id" class="form-control"
                                   value="{{ Auth::guard('employee')->user()->gym_id }}"/>
                            @if($errors->has('gym_id'))
                                <div class="error">{{ $errors->first('gym_id') }}</div>
                            @endif
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-8 ">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Name:</label>
                                                <input type="text" maxlength="25" name="name" class="form-control"
                                                       required placeholder="Enter Name"/>
                                                @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Category:</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="Active">Active</option>
                                                </select>
                                                @if($errors->has('category_id'))
                                                    <div class="error">{{ $errors->first('category_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Price:</label>
                                                <input type="number" name="price" class="form-control" required/>
                                                @if($errors->has('price'))
                                                    <div class="error">{{ $errors->first('price') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>In Stock:</label>
                                                <select name="in_stock" class="form-control">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                @if($errors->has('in_stock'))
                                                    <div class="error">{{ $errors->first('in_stock') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Note:</label>
                                                <textarea type="text" name="description" class="form-control"
                                                          placeholder="Enter Description"></textarea>
                                                @if($errors->has('description'))
                                                    <div class="error">{{ $errors->first('description') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>In Stock:</label>
                                                <select name="visible" class="form-control">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                @if($errors->has('visible'))
                                                    <div class="error">{{ $errors->first('visible') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-4 col-lg-4 col-form-label">Select Image File</label>
                                                    <div class="col-lg-12">
                                                        <div class="kt-avatar" id="kt_user_avatar_2">
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset('assets/media/users/trainingImg.png')}})"></div>
                                                            <label class="kt-avatar__upload"
                                                                   data-toggle="kt-tooltip" title=""
                                                                   data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="image"
                                                                       accept=".png, .jpg, .jpeg">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar"><i class="fa fa-times"></i></span>
                                                        </div>
                                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                        <span></span>
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
                                            <a href="{{route('trainer.list')}}" class="btn btn-secondary">Cancel</a>
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
