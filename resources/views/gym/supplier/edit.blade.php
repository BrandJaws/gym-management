@extends('_layouts.index')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->

        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-4">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/in.jpg')}}" alt="image" style="height: 100%;">
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                Total Cash-In
                                            </a>
                                            <div class="kt-widget__button">
                                                <h2>{{ $treasuryCashIn }}</h2>
                                            </div>
                                            <div class="kt-widget__button">
                                                <span class="btn btn-label-warning btn-sm">Active</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-4">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/out.jpg')}}" alt="image" style="height: 100%;">
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                Total Cash-Out
                                            </a>
                                            <div class="kt-widget__button">
                                                <h2>{{ $treasuryCashOut }}</h2>
                                            </div>
                                            <div class="kt-widget__button">
                                                <span class="btn btn-label-warning btn-sm">Active</span>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-4">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/discount.jpg')}}" alt="image" style="height: 100%;">
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                Total Cash-Discount
                                            </a>
                                            <div class="kt-widget__button">
                                                <h2>{{ $treasuryCashDiscount }}</h2>
                                            </div>
                                            <div class="kt-widget__button">
                                                <span class="btn btn-label-warning btn-sm">Active</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Widget -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-4">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/extra.png')}}" alt="image" style="height: 100%;">
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                Total Cash-Extra
                                            </a>
                                            <div class="kt-widget__button">
                                                <h2>{{ $treasuryCashExtra }}</h2>
                                            </div>
                                            <div class="kt-widget__button">
                                                <span class="btn btn-label-warning btn-sm">Active</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Widget -->
                        </div>
                    </div>
                </div>
            </div>
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
                            <input type="hidden" class="form-control" name="gym_id"
                                   value="{{  Auth::guard('employee')->user()->gym->id }}"/>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-8">
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
                                                               @if( $supplier->status == "Active" ) checked
                                                               @endif required>
                                                        Active
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--solid">
                                                        <input type="radio" name="status" value="In-Active"
                                                               @if( $supplier->status == "In-Active" ) checked
                                                               @endif required>
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
                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="profileImageSide">
                                                    <div class="profileImage">
                                                        <div
                                                            class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                            id="kt_user_avatar_3">
                                                            @if($supplier->userImage != "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url('{{ URL::to('/') }}/{{ $supplier->userImage->path }}')">
                                                                </div>
                                                            @endif
                                                            @if($supplier->userImage == "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url({{asset('assets/media/users/avatar.png')}})">
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
                                                        <p>Allowed file types: png, jpg, jpeg.</p>
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
                                            <input type="submit" value="Update" class="btn btn-primary">
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
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Account History
                                </h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 ">
                                <div class="kt-portlet__body">
                                    <table
                                        class="table table-striped- table-bordered table-hover table-checkable">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Employee</th>
                                            <th>Cash Flow</th>
                                            <th>Type</th>
                                            <th>Value</th>
                                            <th>Date</th>
                                            <th>Purpose</th>
                                            <th>Note</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($treasuryDetail as $row)
                                            <tr>
                                                <th>{{$i}}</th>
                                                <td>{{ $row->employee->name }}</td>
                                                <td>{{ $row->cashFlow }}</td>
                                                <td>{{ $row->type }}</td>
                                                <td>{{ $row->value }}</td>
                                                <td>{{ $row->date }}</td>
                                                <td>{{ $row->purpose }}</td>
                                                <td>{{ $row->note }}</td>
                                            </tr>
                                            <?php  $i++; ?>
                                        @endforeach
                                        <tr>
                                            <td colspan="8" align="center">
                                                {{ $treasuryDetail->links() }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
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
