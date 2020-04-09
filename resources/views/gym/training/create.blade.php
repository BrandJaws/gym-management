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
                                    Create A Training
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('training.create')}}" method="POST" enctype="multipart/form-data"
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
                                            <div class="col-lg-6 ">
                                                <label class="">Gym:</label>
                                                <input type="text" class="form-control" disabled
                                                       value="{{ Auth::guard('employee')->user()->gym->name }}"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Training Name:</label>
                                                <input type="text" maxlength="25" name="name" class="form-control"
                                                       required placeholder="Enter Training Name"/>
                                                @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Number of seats available:</label>
                                                <input type="number" maxlength="25" name="seats" class="form-control"
                                                       required placeholder="Enter Number of seats available"/>
                                                @if($errors->has('seats'))
                                                    <div class="error">{{ $errors->first('seats') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Number of Sessions:</label>
                                                <input type="number" maxlength="25" name="sessions" class="form-control"
                                                       required placeholder="Enter Number of Sessions"/>
                                                @if($errors->has('sessions'))
                                                    <div class="error">{{ $errors->first('sessions') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Start Date:</label>
                                                <input type="date" name="startDate" class="form-control" required/>
                                                @if($errors->has('startDate'))
                                                    <div class="error">{{ $errors->first('startDate') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>End Date:</label>
                                                <input type="date" name="endDate" class="form-control" required/>
                                                @if($errors->has('endDate'))
                                                    <div class="error">{{ $errors->first('endDate') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Price:</label>
                                                <input type="number" name="price" class="form-control"
                                                       placeholder="Enter Price"/>
                                                @if($errors->has('price'))
                                                    <div class="error">{{ $errors->first('price') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Status:</label>
                                                <select name="status" class="form-control">
                                                    <option value="Active">Active</option>
                                                    <option value="Block">Block</option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <div class="error">{{ $errors->first('status') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Description:</label>
                                                <textarea type="text" name="description" class="form-control"
                                                          placeholder="Enter Description"></textarea>
                                                @if($errors->has('description'))
                                                    <div class="error">{{ $errors->first('description') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>Trainer Name:</label>
                                                <select name="trainer_id" class="form-control">
                                                    @foreach($trainer as $value)
                                                        <option
                                                            value="{{ $value->id }}">{{ $value->firstName }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('trainer_id'))
                                                    <div class="error">{{ $errors->first('trainer_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Select Training Media:</label>
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio" name="promotionType" value="Image" id="Image"
                                                           onclick="changeDiv()" required> Image
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio" name="promotionType" value="Video" id="Video"
                                                           onclick="changeDiv()" required> Video
                                                    <span></span>
                                                </label>
                                                @if($errors->has('promotionType'))
                                                    <div class="error">{{ $errors->first('promotionType') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 imageField m-5" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Select Image
                                                    File</label>
                                                <div class="col-lg-11">
                                                    <div class="col-lg-9 col-xl-6">
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
                                                            <span class="kt-avatar__cancel"
                                                                  data-toggle="kt-tooltip" title=""
                                                                  data-original-title="Cancel avatar">
														<i class="fa fa-times"></i>
													</span>
                                                        </div>
                                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                    </div>
                                                    <span></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 videoField m-5" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-xl-6 col-lg-6 col-form-label">Link to Youtube/Vimeo
                                                    Video</label>
                                                <div class="col-lg-11">
                                                    <input type="url" name="promotionContent" class="form-control"
                                                           placeholder="Paste Url">
                                                    <span></span>
                                                </div>

                                            </div>
                                        </div>
                                        @if($errors->has('image'))
                                            <div class="error">{{ $errors->first('image') }}</div>
                                        @endif
                                        @if($errors->has('promotionContent'))
                                            <div class="error">{{ $errors->first('promotionContent') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('training.list')}}" class="btn btn-secondary">Cancel</a>
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
    <script type="text/javascript">
        function changeDiv() {
            var imageField = document.getElementById('Image');
            if (imageField.checked === true) {
                var div = document.getElementsByClassName('imageField');
                for (var i = 0; i < div.length; i++) {
                    $(div[i]).show();
                }
            } else {
                var div = document.getElementsByClassName('imageField');
                for (var i = 0; i < div.length; i++) {
                    $(div[i]).hide();
                }
            }
            var videoField = document.getElementById('Video');
            if (videoField.checked === true) {
                var div = document.getElementsByClassName('videoField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "block";
                }
            } else {
                var div = document.getElementsByClassName('videoField');
                for (var i = 0; i < div.length; i++) {
                    div[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
