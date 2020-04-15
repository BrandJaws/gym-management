@extends('_layouts.index')
@section('content')
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <!--Begin::Row-->
        <div class="row">
            <div class="col-xl-3 col-lg-3">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__body kt-portlet__body--fit-y dashboardTopBox">
                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-4">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/gym/gym1.jpg')}}"
                                         alt="image" height="100px">
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="#" class="kt-widget__username">
                                            Total Gyms
                                        </a>
                                        <div class="kt-widget__button">
                                            <h2>{{$gym}}</h2>
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
                    <div class="kt-portlet__body kt-portlet__body--fit-y dashboardTopBox">
                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-4">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-"
                                         src="{{asset('assets/media/gym/machine1.jpg')}}" alt="image" height="100px">
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="#" class="kt-widget__username">
                                            Total Gym In Trials
                                        </a>
                                        <div class="kt-widget__button">
                                            <h2>{{$gymInTrial}}</h2>
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
                    <div class="kt-portlet__body kt-portlet__body--fit-y dashboardTopBox">
                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-4">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-"
                                         src="{{asset('assets/media/gym/customer1.jpg')}}" alt="image" height="100px">
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="#" class="kt-widget__username">
                                            Total Admins
                                        </a>
                                        <div class="kt-widget__button">
                                            <h2>{{$superAdmin}}</h2>
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
                    <div class="kt-portlet__body kt-portlet__body--fit-y dashboardTopBox">
                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-4">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-"
                                         src="{{asset('assets/media/gym/employe1.jpg')}}" alt="image" height="100px">
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="#" class="kt-widget__username">
                                            Total Licenses
                                        </a>
                                        <div class="kt-widget__button">
                                            <h2>{{$license}}</h2>
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
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <!--begin:: Widgets/New Users-->
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Gyms
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content"
                                       role="tab">
                                        Action
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget4_tab1_content">
                                <div class="kt-widget4">
                                    @foreach($latestGyms as $gym)
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                {{--     <img src="{{asset('assets/media/users/100_4.jpg')}}" alt="">--}}
                                            </div>
                                            <div class="kt-widget4__info">
                                                <a href="{{url('/admin/gym/edit', $gym->id)}}"
                                                   class="kt-widget4__username">
                                                    {{$gym->name}}
                                                </a>
                                            </div>
                                            <a href="{{url('/admin/gym/edit', $gym->id)}}"
                                               class="btn btn-sm btn-label-brand btn-bold">
                                                <i class="fa flaticon2-delivery-package"></i>Detail
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/New Users-->
            </div>
            <div class="col-xl-6 col-lg-6">
                <!--begin:: Widgets/New Users-->
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Gym Panel Modules
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content"
                                       role="tab">
                                        -
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget4_tab1_content">
                                <div class="kt-widget4">
                                    @foreach($gymModule as $module)
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__info">
                                                <a href="#" class="kt-widget4__username">
                                                    {{$module->name}}
                                                </a>
                                            </div>
                                            <a href="#"
                                               class="btn btn-sm btn-label-brand btn-bold">
                                                <i class="{{$module->icon}}"></i>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/New Users-->
            </div>
        </div>
        <!--End::Row-->
        <!--End::Dashboard 1-->
    </div>
    <!-- end:: Content -->
@endsection



