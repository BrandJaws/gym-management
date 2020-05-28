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
                        <form action="{{route('training.edit')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{ $training->id }}"/>
                            <input type="hidden" name="gym_id" class="form-control"
                                   value="{{ Auth::guard('employee')->user()->gym_id }}"/>
                            @if($errors->has('gym_id'))
                                <div class="error">{{ $errors->first('gym_id') }}</div>
                            @endif
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <div class="col-lg-8 ">
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6 ">
                                                <label class="">Gym:</label>
                                                <input type="text" class="form-control" disabled
                                                       value="{{ Auth::guard('employee')->user()->gym->name }}"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Training Name:</label>
                                                <input type="text" maxlength="25" name="name" class="form-control"
                                                       value="{{ $training->name }}"
                                                       required placeholder="Enter Training Name"/>
                                                @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Number of seats available:</label>
                                                <input type="number" maxlength="25" name="seats" class="form-control"
                                                       value="{{ $training->seats }}"
                                                       required placeholder="Enter Number of seats available"/>
                                                @if($errors->has('seats'))
                                                    <div class="error">{{ $errors->first('seats') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Number of Sessions:</label>
                                                <input type="number" maxlength="25" name="sessions" class="form-control"
                                                       value="{{ $training->sessions }}"
                                                       required placeholder="Enter Number of Sessions"/>
                                                @if($errors->has('sessions'))
                                                    <div class="error">{{ $errors->first('sessions') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Start Date:</label>
                                                <input type="date" name="startDate" value="{{ $training->startDate }}"
                                                       class="form-control" required/>
                                                @if($errors->has('startDate'))
                                                    <div class="error">{{ $errors->first('startDate') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>End Date:</label>
                                                <input type="date" name="endDate" class="form-control"
                                                       value="{{ $training->endDate }}" required/>
                                                @if($errors->has('endDate'))
                                                    <div class="error">{{ $errors->first('endDate') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Price:</label>
                                                <input type="number" name="price" class="form-control"
                                                       value="{{ $training->price }}"
                                                       placeholder="Enter Price"/>
                                                @if($errors->has('price'))
                                                    <div class="error">{{ $errors->first('price') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Status:</label>
                                                <select name="status" class="form-control">
                                                    <option value="Active"
                                                            @if($training->status == "Active") selected @endif >Active
                                                    </option>
                                                    <option value="Block"
                                                            @if($training->status == "Block") selected @endif >Block
                                                    </option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <div class="error">{{ $errors->first('status') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-6">
                                                <label>Description:</label>
                                                <textarea type="text" name="description" class="form-control"
                                                          placeholder="Enter Description">{{ $training->description }}</textarea>
                                                @if($errors->has('description'))
                                                    <div class="error">{{ $errors->first('description') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-12">
                                                <label>Trainer Name:</label>
                                                <select name="trainer_id" class="form-control">
                                                    @foreach($trainer as $value)
                                                        <option
                                                            value="{{ $value->id }}"
                                                            @if($value->id == $training->trainer_id) selected @endif >{{ $value->firstName }}</option>
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
                                                    <input type="radio" name="promotionType"
                                                           {{ ($training->promotionType=="Image")? "checked" : "" }}  value="Image"
                                                           id="Image" onclick="changeDiv()" required> Image
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio" name="promotionType"
                                                           {{ ($training->promotionType=="Video")? "checked" : "" }}  value="Video"
                                                           id="Video" onclick="changeDiv()" required> Video
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
                                                            @if($training->userImage != "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url('{{ URL::to('/') }}/{{ $training->userImage->path }}')">
                                                                </div>
                                                            @endif
                                                            @if($training->userImage == "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url({{asset('assets/media/users/trainingImg.png')}})">
                                                                </div>
                                                            @endif
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
                                            <div class="form-group row mb-15">
                                                <label class="col-xl-6 col-lg-6 col-form-label">Link to Youtube/Vimeo
                                                    Video</label>
                                                <div class="col-lg-11">
                                                    <iframe width="460" height="315"
                                                            src="{{((strtolower($training->promotionType) == 'video')?$training->promotionContent:'')}}"
                                                            frameborder="0" allowfullscreen></iframe>
                                                    <input type="url" name="promotionContent"
                                                           value="{{ $training->promotionContent }}"
                                                           class="form-control" placeholder="Paste Url">
                                                    <span></span>
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
                                            <input type="submit" value="Update" class="btn btn-primary">
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
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div>
                        <div class="row" style="clear: both;margin-top: 18px;">
                            <div class="col-12">
                                <div class="kt-portlet__body">
                                    <!--begin::Section-->
                                    <div class="kt-section">
                                        <div class="kt-section">
                                            <div class="kt-section__content">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="kt-portlet__head-label">
                                                                <h5 class="kt-portlet__head-title">
                                                                    {{ $training->seats  }}&nbsp;
                                                                    Persons Taking this Training
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-5">
                                                            <div class="form-group">
                                                                <div class="kt-input-icon kt-input-icon--right">
                                                                    @if($trainingMember == "")
                                                                        <button type="button"
                                                                                class="btn btn-bold btn-label-brand btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#kt_modal_3">Add
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4>Add Members</h4>
                                                    <form action="{{ route('training.editTrainingGroup') }}"
                                                          method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $training->id }}"
                                                               name="training_id">
                                                        @if($errors->has('training_id'))
                                                            <div class="error">{{ $errors->first('training_id') }}</div>
                                                        @endif
                                                        <input type="hidden" value="{{ $training->id }}"
                                                               name="training_id">
                                                        @if($errors->has('training_id'))
                                                            <div class="error">{{ $errors->first('training_id') }}</div>
                                                        @endif
                                                        <input type="hidden" value="{{$trainingMember->id}}" name="id">
                                                        <div class="row">
                                                            <div class="col-lg-12 form-group gymDropdown">
                                                                @if(count($memberList) > 0)
                                                                    <select class="form-control kt-select2"
                                                                            id="kt_select2_3"
                                                                            name="members[]"
                                                                            multiple="multiple">
                                                                        @foreach ($member as $list)
                                                                            <option
                                                                                value="{{$list->id}}" {{in_array("$list->id",$memberList)?"selected":""}} >{{$list->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary"
                                                                       value="Update">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Section-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="kt_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form action="{{ route('training.createTrainingGroup') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $training->id }}" name="training_id">
                            @if($errors->has('training_id'))
                                <div class="error">{{ $errors->first('training_id') }}</div>
                            @endif
                            <div class="col-lg-12 form-group gymDropdown">
                                <label>Members :</label>
                                @if(count($member) > 0)
                                    <select class="form-control kt-select2" id="kt_select2_3"
                                            name="members[]"
                                            multiple="multiple">
                                        @foreach ($member as $list)
                                            <option value="{{$list->id}}">{{$list->name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                            @if($errors->has('members'))
                                <div class="error">{{ $errors->first('members') }}</div>
                            @endif
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
@endsection
<style>
    .alert-message {
        color: red;
    }

    blink {
        -webkit-animation: 2s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
        animation: 2s linear infinite condemned_blink_effect;
        color: #f00000;
        font-size: 25px;
    }

    /* for Safari 4.0 - 8.0 */
    @-webkit-keyframes condemned_blink_effect {
        0% {
            visibility: hidden;
        }
        50% {
            visibility: hidden;
        }
        100% {
            visibility: visible;
        }
    }

    @keyframes condemned_blink_effect {
        0% {
            visibility: hidden;
        }
        50% {
            visibility: hidden;
        }
        100% {
            visibility: visible;
        }
    }
</style>
@section('custom-script')
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{asset('js/input-mask.js')}}"></script>
    <script src="{{asset('js/ktavatar.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var imageField = document.getElementById('Image');
            if (imageField.checked == true) {
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
        });

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
