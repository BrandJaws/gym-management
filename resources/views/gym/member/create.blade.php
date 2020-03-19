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
                                <div class="row">
                                    <div class="col-12 col-lg-8 m-auto">
                                        <div class="content">
                                            <!--content inner-->
                                            <div class="content__inner">
                                                <div class="container">
                                                    <!--content title-->
                                                    <form class="pick-animation my-4">
                                                        <div class="form-row">
                                                            <input type="hidden" value="scaleOut" selected="selected">

                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="container overflow-hidden">
                                                    <!--multisteps-form-->
                                                    <div class="multisteps-form">
                                                        <!--progress bar-->
                                                        <div class="row">
                                                            <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                                                                <div class="multisteps-form__progress">
                                                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">User Info</button>
                                                                    <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
                                                                    <button class="multisteps-form__progress-btn" type="button" title="Order Info">Order Info</button>
                                                                    <button class="multisteps-form__progress-btn" type="button" title="Comments">Comments        </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--form panels-->
                                                        <div class="row">
                                                            <div class="col-12 col-lg-8 m-auto">
                                                                <form class="multisteps-form__form">
                                                                    <!--single form panel-->
                                                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleOut">
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
                                                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
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
                                                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
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
                                                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
                                                                        <h3 class="multisteps-form__title">Additional Comments</h3>
                                                                        <div class="multisteps-form__content">
                                                                            <div class="form-row mt-4">
                                                                                <textarea class="multisteps-form__textarea form-control" placeholder="Additional Comments and Requirements"></textarea>
                                                                            </div>
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
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: #2c2c2c;
    }
    body a {
        color: inherit;
        text-decoration: none;
    }

    .header__btn {
        transition-property: all;
        transition-duration: 0.2s;
        transition-timing-function: linear;
        transition-delay: 0s;
        padding: 10px 20px;
        display: inline-block;
        margin-right: 10px;
        background-color: #fff;
        border: 1px solid #2c2c2c;
        border-radius: 3px;
        cursor: pointer;
        outline: none;
    }
    .header__btn:last-child {
        margin-right: 0;
    }
    .header__btn:hover, .header__btn.js-active {
        color: #fff;
        background-color: #2c2c2c;
    }

    .header {
        max-width: 600px;
        margin: 50px auto;
        text-align: center;
    }

    .header__title {
        margin-bottom: 30px;
        font-size: 2.1rem;
    }

    .content {
        width: 95%;
        margin: 0 auto 50px;
    }

    .content__title {
        margin-bottom: 40px;
        font-size: 20px;
        text-align: center;
    }

    .content__title--m-sm {
        margin-bottom: 10px;
    }

    .multisteps-form__progress {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
    }

    .multisteps-form__progress-btn {
        transition-property: all;
        transition-duration: 0.15s;
        transition-timing-function: linear;
        transition-delay: 0s;
        position: relative;
        padding-top: 20px;
        color: rgba(108, 117, 125, 0.7);
        text-indent: -9999px;
        border: none;
        background-color: transparent;
        outline: none !important;
        cursor: pointer;
    }
    @media (min-width: 500px) {
        .multisteps-form__progress-btn {
            text-indent: 0;
        }
    }
    .multisteps-form__progress-btn:before {
        position: absolute;
        top: 0;
        left: 50%;
        display: block;
        width: 13px;
        height: 13px;
        content: '';
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
        transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
        transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
        border: 2px solid currentColor;
        border-radius: 50%;
        background-color: #fff;
        box-sizing: border-box;
        z-index: 3;
    }
    .multisteps-form__progress-btn:after {
        position: absolute;
        top: 5px;
        left: calc(-50% - 13px / 2);
        transition-property: all;
        transition-duration: 0.15s;
        transition-timing-function: linear;
        transition-delay: 0s;
        display: block;
        width: 100%;
        height: 2px;
        content: '';
        background-color: currentColor;
        z-index: 1;
    }
    .multisteps-form__progress-btn:first-child:after {
        display: none;
    }
    .multisteps-form__progress-btn.js-active {
        color: #007bff;
    }
    .multisteps-form__progress-btn.js-active:before {
        -webkit-transform: translateX(-50%) scale(1.2);
        transform: translateX(-50%) scale(1.2);
        background-color: currentColor;
    }

    .multisteps-form__form {
        position: relative;
    }

    .multisteps-form__panel {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 0;
        opacity: 0;
        visibility: hidden;
    }
    .multisteps-form__panel.js-active {
        height: auto;
        opacity: 1;
        visibility: visible;
    }
    .multisteps-form__panel[data-animation="scaleOut"] {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    .multisteps-form__panel[data-animation="scaleOut"].js-active {
        transition-property: all;
        transition-duration: 0.2s;
        transition-timing-function: linear;
        transition-delay: 0s;
        -webkit-transform: scale(1);
        transform: scale(1);
    }


</style>
@section('custom-script')
    <script src="{{ asset('js/steper.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
@endsection
