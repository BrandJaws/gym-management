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
                                    Create A Member
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="#" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                        @csrf
                        <!--form panels-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <form class="pick-animation">
                                            <input type="hidden" value="scaleOut" selected="selected">
                                        </form>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="multisteps-form">
                                            <!--progress bar-->
                                            <div class="multisteps-form__progress">
                                                <button class="multisteps-form__progress-btn js-active" type="button"
                                                        title="User Info">User Info
                                                </button>
                                                <button class="multisteps-form__progress-btn" type="button"
                                                        title="Address">Contact
                                                </button>
                                                <button class="multisteps-form__progress-btn" type="button"
                                                        title="Order Info">Package
                                                </button>
                                                <button class="multisteps-form__progress-btn" type="button"
                                                        title="Comments">Comments
                                                </button>
                                            </div>
                                            <form class="multisteps-form__form">
                                                <!--single form panel-->
                                                <div class="multisteps-form__panel js-active" data-animation="scaleOut">
                                                    <h3 class="multisteps-form__title">Your User Info</h3>
                                                    <div class="multisteps-form__content">
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6">
                                                                <label>Name:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="text" placeholder="Name"/>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Email:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="email" placeholder="Email"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Phone:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="number" placeholder="Phone"/>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Source:</label>
                                                                <select class="multisteps-form__input form-control">
                                                                    <option name="Newspaper">Newspaper</option>
                                                                    <option name="Radio">Radio</option>
                                                                    <option name="Tv">Tv</option>
                                                                    <option name="Website">Website</option>
                                                                    <option name="Megazine">Megazine</option>
                                                                    <option name="Friend">Friend</option>
                                                                    <option name="Social Media">Social Media</option>
                                                                    <option name="None">None</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6">
                                                                <label>Status:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="text" placeholder="status"/>
                                                            </div>
                                                        </div>
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary ml-auto js-btn-next"
                                                                    type="button" title="Next">Next
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single form panel-->
                                                <div class="multisteps-form__panel" data-animation="scaleOut">
                                                    <h3 class="multisteps-form__title">Contact</h3>
                                                    <div class="multisteps-form__content">
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Employee:</label>
                                                                <select class="multisteps-form__input form-control">
                                                                    <option name="Newspaper">Ali</option>
                                                                    <option name="Radio">Ahmad</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Schedule Date:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="date" placeholder="Select"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Status:</label>
                                                                <select class="multisteps-form__input form-control">
                                                                    <option name="Call">Call</option>
                                                                    <option name="Demo">Demo</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Transfer:</label>
                                                                <select class="multisteps-form__input form-control">
                                                                    <option name="Call">None</option>
                                                                    <option name="Call">Waqas</option>
                                                                    <option name="Demo">Waheed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Re-Schedule Status:</label>
                                                                <select class="multisteps-form__input form-control">
                                                                    <option name="Call">Call</option>
                                                                    <option name="Demo">Demo</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Re-Schedule Date:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="date" placeholder="Select"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Interseted Packeges:</label>
                                                                <select class=" form-control gymDropdown"
                                                                        id="kt_select2_3" name="gym_id[]" required
                                                                        multiple="multiple">
                                                                    <option name="Call">Golden</option>
                                                                    <option name="Demo">Silver</option>
                                                                    <option name="Demo">Gold</option>
                                                                    <option name="Demo">Peimary</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Remarks:</label>
                                                                <textarea class="multisteps-form__input form-control"
                                                                          placeholder="Enter Customer Remarks"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary js-btn-prev" type="button"
                                                                    title="Prev">Prev
                                                            </button>
                                                            <button class="btn btn-primary ml-auto js-btn-next"
                                                                    type="button" title="Next">Next
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single form panel-->
                                                <div class="multisteps-form__panel" data-animation="scaleOut">
                                                    <h3 class="multisteps-form__title">Your Order Info</h3>
                                                    <div class="multisteps-form__content">
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6">
                                                                <label>Joing Date:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="date"/>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Select Package:</label>
                                                                <select class=" form-control gymDropdown"
                                                                        name="gym_id[]" required>
                                                                    <option name="Call">Golden</option>
                                                                    <option name="Demo">Silver</option>
                                                                    <option name="Demo">Gold</option>
                                                                    <option name="Demo">Peimary</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Password:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="password" placeholder="Enter Password"/>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <label>Re-Password:</label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="password" placeholder="Enter Password"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6">
                                                                <label>Status:</label>
                                                                <select class="multisteps-form__input form-control">
                                                                    <option name="Call">Active</option>
                                                                    <option name="Demo">In-Active</option>
                                                                    <option name="Call">Block</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary ml-auto js-btn-next"
                                                                    type="button" title="Next">Next
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single form panel-->
                                                <div class="multisteps-form__panel" data-animation="scaleOut">
                                                    <h3 class="multisteps-form__title">Additional Comments</h3>
                                                    <div class="multisteps-form__content">
                                                        <textarea class="multisteps-form__textarea form-control"
                                                                  rows="6"
                                                                  placeholder="Additional Comments and Requirements"></textarea>
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary js-btn-prev" type="button"
                                                                    title="Prev">Prev
                                                            </button>
                                                            <button class="btn btn-success ml-auto" type="button"
                                                                    title="Send">Send
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
    <script src="{{ asset('js/steper.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
@endsection
