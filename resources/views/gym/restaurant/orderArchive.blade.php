@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @include('_layouts.flash-message')
            <div id="kt_subheader" class="kt-subheader   kt-grid__item">
                <div class="kt-container  kt-container--fluid ">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">Restaurant </h3>
                        <span class="kt-subheader__separator kt-hidden"></span>
                        <div class="kt-subheader__breadcrumbs">
                            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="/gym/restaurant"
                               class="kt-subheader__breadcrumbs-link router-link-exact-active router-link-active">
                                Home</a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="/gym/restaurant/list" class="kt-subheader__breadcrumbs-link"> Restaurant</a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="{{url('/gym/restaurant/order/archive')}}" class="kt-subheader__breadcrumbs-link">Order
                                Archive</a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                        </div>
                    </div>
                    <div class="kt-subheader__toolbar">
                        <div class="kt-subheader__wrapper"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12  mt-5">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Order Archive
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <form action="{{route('restaurant.getOrderReport')}}" method="POST"
                                          enctype="multipart/form-data"
                                          class="kt-form kt-form--label-right">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Member:</label>
                                                <select class="form-control" name="member_id" id="member_id">
                                                    @foreach($member as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>From:</label>
                                                <input type="datetime-local" class="form-control" name="fromDate"></input>
                                            </div>
                                            <div class="col-md-3">
                                                <label>To:</label>
                                                <input type="datetime-local" class="form-control" name="toDate"></input>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <button type="submit" name="filter" id="filter" class="btn btn-info">
                                                    Filter
                                                </button>
                                                <button type="reset" name="reset" id="reset" class="btn btn-default">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="mt-5">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Member</th>
                                                <th>gross_total</th>
                                                <th>vat</th>
                                                <th>net_total</th>
                                                <th>created_at</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order as $row)
                                            <tr>
                                                <td>{{ $row->Member }}</td>
                                                <td>{{ $row->gross_total }}</td>
                                                <td>{{ $row->vat }}</td>
                                                <td>{{ $row->net_total }}</td>
                                                <td>{{ $row->created_at }}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
        <!-- end:: Content -->
    </div>
@endsection
@section('custom-script')
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
@endsection
