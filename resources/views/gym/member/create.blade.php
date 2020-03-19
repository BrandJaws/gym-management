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
                        <form action="#" method="POST" enctype="multipart/form-data" class="kt-form kt-form--label-right">
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
                                                <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">User Info</button>
                                                <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
                                                <button class="multisteps-form__progress-btn" type="button" title="Order Info">Order Info</button>
                                                <button class="multisteps-form__progress-btn" type="button" title="Comments">Comments        </button>
                                            </div>
                                            <form class="multisteps-form__form">
                                                <!--single form panel-->
                                                <div class="multisteps-form__panel js-active" data-animation="scaleOut">
                                                    <h3 class="multisteps-form__title">Your User Info</h3>
                                                    <div class="multisteps-form__content">
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6">
                                                                <input class="multisteps-form__input form-control" type="text" placeholder="First Name"/>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <input class="multisteps-form__input form-control" type="text" placeholder="Last Name"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6">
                                                                <input class="multisteps-form__input form-control" type="text" placeholder="Login"/>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <input class="multisteps-form__input form-control" type="email" placeholder="Email"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6">
                                                                <input class="multisteps-form__input form-control" type="password" placeholder="Password"/>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                                <input class="multisteps-form__input form-control" type="password" placeholder="Repeat Password"/>
                                                            </div>
                                                        </div>
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single form panel-->
                                                <div class="multisteps-form__panel" data-animation="scaleOut">
                                                    <h3 class="multisteps-form__title">Your Address</h3>
                                                    <div class="multisteps-form__content">
                                                        <div class="form-row mt-4">
                                                            <div class="col">
                                                                <input class="multisteps-form__input form-control" type="text" placeholder="Address 1"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col">
                                                                <input class="multisteps-form__input form-control" type="text" placeholder="Address 2"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-4">
                                                            <div class="col-12 col-sm-6">
                                                                <input class="multisteps-form__input form-control" type="text" placeholder="City"/>
                                                            </div>
                                                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                                                <select class="multisteps-form__select form-control">
                                                                    <option selected="selected">State...</option>
                                                                    <option>...</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                                                <input class="multisteps-form__input form-control" type="text" placeholder="Zip"/>
                                                            </div>
                                                        </div>
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single form panel-->
                                                <div class="multisteps-form__panel" data-animation="scaleOut">
                                                    <h3 class="multisteps-form__title">Your Order Info</h3>
                                                    <div class="multisteps-form__content">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mt-4">
                                                                <div class="card shadow-sm">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Item Title</h5>
                                                                        <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-4">
                                                                <div class="card shadow-sm">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Item Title</h5>
                                                                        <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="button-row d-flex mt-4 col-12">
                                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single form panel-->
                                                <div class="multisteps-form__panel" data-animation="scaleOut">
                                                    <h3 class="multisteps-form__title">Additional Comments</h3>
                                                    <div class="multisteps-form__content">
                                                        <textarea class="multisteps-form__textarea form-control" rows="6" placeholder="Additional Comments and Requirements"></textarea>
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                            <button class="btn btn-success ml-auto" type="button" title="Send">Send</button>
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
