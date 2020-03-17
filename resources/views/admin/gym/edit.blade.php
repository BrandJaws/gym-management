@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <form action="{{ url('admin/gym/edit') }}" method="POST" enctype="multipart/form-data"
              class="kt-form kt-form--label-right">
            {{csrf_field()}}
            <input type="hidden" value="{{$gym->id }}" name="gym_id">
            @include('_layouts.flash-message')
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Update Gym
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" value="{{ $gym->name }}"
                                               placeholder="Enter full name" required/>
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <label>Trial In:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="1"
                                                       {{ ($gym->inTrial=="1")? "checked" : "" }} required> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="inTrial" value="0"
                                                       {{ ($gym->inTrial=="0")? "checked" : "" }} required> No
                                                <span></span>
                                            </label>
                                            @if($errors->has('inTrial'))
                                                <div class="error">{{ $errors->first('inTrial') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 trialEndsAt" style="display: none;">
                                        <label>Trial Ends At:</label>
                                        <div class="kt-input-icon input-group">
                                            <input type="date" name="trialEndsAt" class="form-control"
                                                   value="{{ \Carbon\Carbon::parse($gym->trialEndsAt)->format('yy-m-d')}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                            @if($errors->has('trialEndsAt'))
                                                <div class="error">{{ $errors->first('trialEndsAt') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 countryDropdown">
                                        <label>Country:</label>
                                        <select class="form-control kt-select2" id="kt_select2_1" name="country">
                                            @if(count($countries) >= 0)
                                                <option value="{{ $gym->country }}">{{ $gym->country }}</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            @else
                                                <p>None</p>
                                            @endif
                                        </select>
                                        @if($errors->has('country'))
                                            <div class="error">{{ $errors->first('country') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>State:</label>
                                        <input type="text" name="state" class="form-control" value="{{ $gym->state }}"
                                               placeholder="Enter your state" required/>
                                        @if($errors->has('state'))
                                            <div class="error">{{ $errors->first('state') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>City:</label>
                                        <input type="text" name="city" class="form-control" value="{{ $gym->city }}"
                                               placeholder="Enter your city" required/>
                                        @if($errors->has('city'))
                                            <div class="error">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="address" class="form-control"
                                               value="{{ $gym->address }}"
                                               placeholder="Enter your address" required/>
                                        @if($errors->has('address'))
                                            <div class="error">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Update Permissions
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="kt-checkbox-list">
                                        <div class="row">
                                            @if(count($gymModule) >= 0)
                                                @foreach ($gymModule as $module)
                                                    <div class="col-md-5">
                                                        <label class="kt-checkbox">
                                                            <input type="checkbox" name="modules[]"
                                                                   value="{{$module->id}}"
                                                                {{in_array("$module->id",$moduleList)?"checked":""}}>
                                                            {{$module->name}}
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>None</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>
                </div>
            </div>
            <!-- end:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Update Super Admin
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="employeeName" class="form-control" required
                                               value="{{ $gym->employee->name}}"
                                               placeholder="Enter your name"/>
                                        @if($errors->has('employeeName'))
                                            <div class="error">{{ $errors->first('employeeName') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ $gym->employee->email}}"
                                               placeholder="Enter your email" required/>
                                        @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Password:</label>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Enter your password  ">
                                        @if($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Gender:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="Male"
                                                       {{ ($gym->employee->gender=="Male")? "checked" : "" }}  required>
                                                Male
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--solid">
                                                <input type="radio" name="gender" value="Female"
                                                       {{ ($gym->employee->gender=="Female")? "checked" : "" }}  required>
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
                                    <div class="col-lg-6">
                                        <label>Cnic:</label>
                                        <input type="text" name="cnic" class="form-control"
                                               value="{{ $gym->employee->cnic }}"
                                               placeholder="Enter Your Cnic" required/>
                                        @if($errors->has('cnic'))
                                            <div class="error">{{ $errors->first('cnic') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class="form-control"
                                               value="{{ $gym->employee->phone }}"
                                               placeholder="Enter Your Contact" required>
                                        @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Salary:</label>
                                        <input type="number" name="salary" class="form-control"
                                               value="{{ $gym->employee->salary }}"
                                               placeholder="Enter Your Salary" required/>
                                        @if($errors->has('salary'))
                                            <div class="error">{{ $errors->first('salary') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Specialization:</label>
                                        <input type="text" name="specialization" class="form-control"
                                               value="{{ $gym->employee->specialization }}"
                                               placeholder="Enter Your Specialization" required>
                                        @if($errors->has('specialization'))
                                            <div class="error">{{ $errors->first('specialization') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" name="empAddress" class="form-control"
                                               value="{{ $gym->employee->address }}"
                                               placeholder="Enter Your Address" required/>
                                        @if($errors->has('empAddress'))
                                            <div class="error">{{ $errors->first('empAddress') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="{{route('gym.list')}}"
                                               class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Portlet-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Update Facilities
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="kt-checkbox-list">
                                        <div class="row">
                                            @if(count($facilities) >= 0)
                                                @foreach ($facilities as $facility)
                                                    <div class="col-md-5">
                                                        <label class="kt-checkbox">
                                                            <input type="checkbox" name="facilities[]"
                                                                   value="{{$facility->id}}"
                                                                {{in_array("$facility->id",$facilityList)?"checked":""}}>
                                                            {{$facility->name}}
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>None</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    {{--                    <div class="col-lg-4">--}}
                    {{--                        <!--begin::Portlet-->--}}
                    {{--                        <div class="kt-portlet">--}}
                    {{--                            <div class="kt-portlet__head">--}}
                    {{--                                <div class="kt-portlet__head-label">--}}
                    {{--                                    <h3 class="kt-portlet__head-title">--}}
                    {{--                                        Update License--}}
                    {{--                                    </h3>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!--begin::Form-->--}}
                    {{--                            <div class="kt-portlet__body">--}}
                    {{--                                <div class="form-group row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label>Cost:</label>--}}
                    {{--                                        <input type="number" name="amount" class="form-control"--}}
                    {{--                                               value="{{ $gym->gymLicense->amount }}"--}}
                    {{--                                               placeholder="Enter Cost"/>--}}
                    {{--                                        @if($errors->has('amount'))--}}
                    {{--                                            <div class="error">{{ $errors->first('amount') }}</div>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label>Starting Date:</label>--}}
                    {{--                                        <input type="date" name="startDate" class="form-control"--}}
                    {{--                                               value="{{ \Carbon\Carbon::parse($gym->gymLicense->startDate)->format('yy-m-d')}}"/>--}}
                    {{--                                        @if($errors->has('startDate'))--}}
                    {{--                                            <div class="error">{{ $errors->first('startDate') }}</div>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label>Closing Date:</label>--}}
                    {{--                                        <input type="date" name="endDate" class="form-control"--}}
                    {{--                                               value="{{ \Carbon\Carbon::parse($gym->gymLicense->endDate)->format('yy-m-d')}}"/>--}}
                    {{--                                        @if($errors->has('endDate'))--}}
                    {{--                                            <div class="error">{{ $errors->first('endDate') }}</div>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!--end::Form-->--}}
                    {{--                        </div>--}}
                    {{--                        <!--end::Portlet-->--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </form>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Gym Branches
                                </h3>
                            </div>
                            <div class="dropdown">
                                <a href="{{url('/admin/gym/branch/add', $gym->id)}}" type="button"
                                   class="btn btn-brand btn-icon-sm">
                                    <i class="flaticon2-plus"></i> Add New Branch
                                </a>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="serach" id="serach" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="name" style="cursor: pointer">Name <span
                                                            id="id_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="city" style="cursor: pointer">City <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="country" style="cursor: pointer">Country <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="address" style="cursor: pointer">Address <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="status" style="cursor: pointer">Status <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name=" " style="cursor: pointer">Actions <span
                                                            id="post_title_icon"></span></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @include('admin.gym.branch.pagination_data')
                                                </tbody>
                                            </table>
                                            <input type="hidden" name="hidden_page" id="hidden_page" value="1"/>
                                            <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                                   value="id"/>
                                            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type"
                                                   value="asc"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function () {
            $('input[type="radio"]').click(function () {
                if ($(this).attr("value") == "0") {
                    $(".trialEndsAt").css('display', 'none');
                }
                if ($(this).attr("value") == "1") {
                    $(".trialEndsAt").css('display', 'block');
                }
            });
        });
        $(document).ready(function () {
            function clear_icon() {
                $('#id_icon').html('');
                $('#post_title_icon').html('');
            }

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "/admin/gym?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                    success: function (data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                })
            }

            $(document).on('keyup', '#serach', function () {
                var query = $('#serach').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                fetch_data(page, sort_type, column_name, query);
            });
            $(document).on('click', '.sorting', function () {
                var column_name = $(this).data('column_name');
                var order_type = $(this).data('sorting_type');
                var reverse_order = '';
                if (order_type == 'asc') {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    clear_icon();
                    $('#' + column_name + '_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
                }
                if (order_type == 'desc') {
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    clear_icon
                    $('#' + column_name + '_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#serach').val();
                fetch_data(page, reverse_order, column_name, query);
            });
            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#serach').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });
        });
    </script>
    <script src="{{asset('js/select2.js')}}"></script>
@endsection
