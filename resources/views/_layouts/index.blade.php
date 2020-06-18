<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <title>Gym | Dashboard</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::check() ?  Auth::guard('employee')->user()->id : '' }}">

    <!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->
    @yield('custom-css')
    @include('_partials.css-assets')
<!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/brandjaws.png')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="{{asset('css/kanban.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/invoice-2.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('css/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->


    <style>
        #draggable {
            width: 150px;
            height: 250px;
            padding: 0.5em;
        }
        .inner{
            background: #e4e8ee30;
            padding: 1px;
        }
    </style>
</head>
<!-- end::Head -->
<!-- begin::Body -->
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="{{url('admin/dashboard')}}">
            <img alt="Logo" src="{{asset('assets/media/logos/brandjaws.png')}}" height="50px" />
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span>
        </button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                class="flaticon-more"></i></button>
    </div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root ">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page ">
        <!-- begin:: Aside -->
        <!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
    @if(Request::is('gym/*') || Request::is('gym'))
        @include('gym.__partials.sidebar')
    @else
        @include('_partials.sidebar')
    @endif
    <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <!-- begin:: Header -->
        @if(Request::is('gym/member') || Request::is('gym/member/*'))
            @include('gym.__partials.member-header')
        @elseif(Request::is('gym') || Request::is('gym/*'))
            @include('gym.__partials.header')
        @else
            @include('_partials.header')
        @endif
        <!-- end:: Header -->
            <!-- begin:: Content -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " id="kt_content">
                <!-- begin:: Content Head -->
            @yield('content')
            <!-- end:: Content Head -->
            </div>
            <!-- end:: Content -->
            <!-- begin:: Footer -->
        @if(Request::is('gym') || Request::is('gym/*'))
            @include('gym.__partials.footer')
        @else
            @include('_partials.footer')
        @endif
        <!-- end:: Footer -->
        </div>
    </div>
</div>
<!-- end:: Page -->
<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>
<!-- end::Global Config -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('custom-script')
<!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>
