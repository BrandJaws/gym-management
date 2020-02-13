@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor p-0" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

            <div class="row">
                <div class="col-md-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-line-chart"></i>
			</span>
                                <h3 class="kt-portlet__head-title">
                                    Datatable Scrolling
                                    <small>Vertically Scrolling Datatable</small>
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <a href="#" class="btn btn-clean btn-icon-sm">
                                        <i class="la la-long-arrow-left"></i>
                                        Back
                                    </a>
                                    &nbsp;
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-brand btn-icon-sm" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <i class="flaticon2-plus"></i> Add New
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="kt-nav">
                                                <li class="kt-nav__section kt-nav__section--first">
                                                    <span class="kt-nav__section-text">Choose an action:</span>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                        <span class="kt-nav__link-text">Reservations</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                                        <span class="kt-nav__link-text">Appointments</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-bell-alarm-symbol"></i>
                                                        <span class="kt-nav__link-text">Reminders</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                        <span class="kt-nav__link-text">Announcements</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-shopping-cart-1"></i>
                                                        <span class="kt-nav__link-text">Orders</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__separator kt-nav__separator--fit">
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-rocket-1"></i>
                                                        <span class="kt-nav__link-text">Projects</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-chat-1"></i>
                                                        <span class="kt-nav__link-text">User Feedbacks</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            <!--begin: Search Form -->
                            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 order-2 order-xl-1">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                                <div class="kt-input-icon kt-input-icon--left">
                                                    <input type="text" class="form-control" placeholder="Search..."
                                                           id="generalSearch">
                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
							<span><i class="la la-search"></i></span>
						</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                                <div class="kt-form__group kt-form__group--inline">
                                                    <div class="kt-form__label">
                                                        <label>Status:</label>
                                                    </div>
                                                    <div class="kt-form__control">
                                                        <div class="dropdown bootstrap-select form-control"><select
                                                                class="form-control bootstrap-select"
                                                                id="kt_form_status" tabindex="-98">
                                                                <option value="">All</option>
                                                                <option value="1">Pending</option>
                                                                <option value="2">Delivered</option>
                                                                <option value="3">Canceled</option>
                                                                <option value="4">Success</option>
                                                                <option value="5">Info</option>
                                                                <option value="6">Danger</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                                <div class="kt-form__group kt-form__group--inline">
                                                    <div class="kt-form__label">
                                                        <label>Type:</label>
                                                    </div>
                                                    <div class="kt-form__control">
                                                        <div class="dropdown bootstrap-select form-control"><select
                                                                class="form-control bootstrap-select" id="kt_form_type"
                                                                tabindex="-98">
                                                                <option value="">All</option>
                                                                <option value="1">Online</option>
                                                                <option value="2">Retail</option>
                                                                <option value="3">Direct</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                                        <a href="#" class="btn btn-default kt-hidden">
                                            <i class="la la-cart-plus"></i> New Order
                                        </a>
                                        <div
                                            class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Search Form -->
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <!--begin: Datatable -->
                            <div
                                class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded"
                                id="scrolling_horizontal" style="">
                                <table class="kt-datatable__table" style="display: block; max-height: 550px;">
                                    <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        <th data-field="RecordID"
                                            class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 20px;">#</span></th>
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Order ID</span></th>
                                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Country</span></th>
                                        <th data-field="CompanyEmail"
                                            class="kt-datatable__cell kt-datatable__cell--sort"><span
                                                style="width: 150px;">Email</span></th>
                                        <th data-field="ShipAddress"
                                            class="kt-datatable__cell kt-datatable__cell--sort"><span
                                                style="width: 200px;">Ship Address</span></th>
                                        <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Ship Date</span></th>
                                        <th data-field="CompanyName"
                                            class="kt-datatable__cell kt-datatable__cell--sort"><span
                                                style="width: 200px;">Company Name</span></th>
                                        <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Status</span></th>
                                        <th data-field="Type" data-autohide-disabled="false"
                                            class="kt-datatable__cell kt-datatable__cell--sort"><span
                                                style="width: 110px;">Type</span></th>
                                        <th data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell kt-datatable__cell--sort"><span
                                                style="width: 110px;">Actions</span></th>
                                    </tr>
                                    </thead>
                                    <tbody class="kt-datatable__body ps ps--active-x ps--active-y"
                                           style="max-height: 496px;">
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">1</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">61715-075</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">China CN</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">nsailor0@livejournal.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">746 Pine View Junction</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">2/12/2018</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Gleichner, Ziemann and Gutkowski</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">Canceled</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-primary">Retail</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="1" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">2</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">63629-4697</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Indonesia ID</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">egiraldez1@seattletimes.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">01652 Fulton Trail</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">8/6/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Rosenbaum-Reichel</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Danger</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-success">Direct</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="2" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">3</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">68084-123</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Argentina AR</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">uluckin2@state.gov</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">2 Pine View Park</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">5/26/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Kulas, Cassin and Batz</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-primary">Retail</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="3" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">4</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">67457-428</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Indonesia ID</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">ecure3@trellian.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">3050 Buell Terrace</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">7/2/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Pfannerstill-Treutel</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-success">Direct</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="4" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">5</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">31722-529</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Austria AT</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">tst4@msn.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">3038 Trailsway Junction</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">5/20/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Dicki-Kling</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Delivered</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-success">Direct</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="5" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">6</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">64117-168</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">China CN</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">greinhard5@instagram.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">023 South Way</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">11/26/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Gleason, Kub and Marquardt</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill">Info</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-success">Direct</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="6" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">7</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">43857-0331</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">China CN</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">eshelley6@pcworld.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">56482 Fairfield Terrace</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">6/28/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Jenkins Inc</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Delivered</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-success">Direct</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="7" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">8</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">64980-196</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Croatia HR</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">hkite7@epa.gov</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">0 Elka Street</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">8/5/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Streich LLC</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Danger</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--danger kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-danger">Online</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="8" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">9</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">0404-0360</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Colombia CO</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">fmorby8@surveymonkey.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">38099 Ilene Hill</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">3/31/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Haley, Schamberger and Durgan</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Delivered</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--danger kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-danger">Online</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="9" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">10</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">52125-267</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Thailand TH</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">ohelian9@usatoday.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">8696 Barby Pass</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">1/26/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Labadie, Predovic and Hammes</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-success">Direct</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="10" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">11</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">54092-515</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Brazil BR</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">samya@earthlink.net</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">32461 Ridgeway Alley</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">3/8/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Treutel-Ratke</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Success</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-primary">Retail</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="11" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">12</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">0185-0130</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">China CN</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">nfoldesb@lycos.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">23 Walton Pass</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">4/2/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Strosin, Nitzsche and Wisozk</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">Canceled</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--danger kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-danger">Online</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="12" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">13</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">21130-678</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">China CN</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">morhtmannc@weibo.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">328 Glendale Hill</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">6/7/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Miller-Schiller</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">Canceled</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--danger kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-danger">Online</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="13" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">14</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">40076-953</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Portugal PT</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">skneathd@bizjournals.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">52550 Crownhardt Court</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">10/11/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Rice, Cole and Spinka</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Success</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--danger kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-danger">Online</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="14" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">15</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">36987-3005</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Portugal PT</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">cjacmare@google.pl</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">548 Morrow Terrace</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">8/17/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Brakus-Hansen</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-primary">Retail</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="15" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">16</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">67510-0062</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">South Africa ZA</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">sgoraccif@thetimes.co.uk</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">02534 Hauk Trail</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">7/24/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Bergnaum, Thiel and Schuppe</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill">Info</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-success">Direct</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="16" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">17</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">36987-2542</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Russia RU</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">jcolvieg@mit.edu</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">19427 Sloan Road</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">3/4/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Kreiger, Glover and Connelly</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">Canceled</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--danger kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-danger">Online</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="17" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">18</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">11673-479</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Brazil BR</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">mplenderleithh@globo.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">191 Stone Corner Road</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">2/21/2018</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Legros-Gleichner</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-primary">Retail</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="18" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">19</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">47781-264</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Ukraine UA</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">lluthwoodi@constantcontact.com</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">1481 Sauthoff Place</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">1/21/2016</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Haag LLC</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-primary">Retail</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <tr data-row="19" class="kt-datatable__row kt-datatable__row--even"
                                        style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell" data-field="RecordID">
                                            <span style="width: 20px;">20</span></td>
                                        <td data-field="OrderID" class="kt-datatable__cell"><span style="width: 110px;">42291-712</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell"><span style="width: 110px;">Indonesia ID</span>
                                        </td>
                                        <td data-field="CompanyEmail" class="kt-datatable__cell"><span
                                                style="width: 150px;">lchevinj@mapy.cz</span></td>
                                        <td data-field="ShipAddress" class="kt-datatable__cell"><span
                                                style="width: 200px;">9029 Blackbird Point</span></td>
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span
                                                style="width: 110px;">9/6/2017</span></td>
                                        <td data-field="CompanyName" class="kt-datatable__cell"><span
                                                style="width: 200px;">Mann LLC</span></td>
                                        <td data-field="Status" class="kt-datatable__cell"><span
                                                style="width: 110px;"><span
                                                    class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Delivered</span></span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 110px;"><span
                                                    class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span
                                                    class="kt-font-bold kt-font-success">Direct</span></span></td>
                                        <td data-field="Actions" data-autohide-disabled="false"
                                            class="kt-datatable__cell"><span
                                                style="overflow: visible; position: relative; width: 110px;">							<div
                                                    class="dropdown">								<a
                                                        data-toggle="dropdown"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">	                                <i
                                                            class="la la-ellipsis-h"></i>	                            </a>							    <div
                                                        class="dropdown-menu dropdown-menu-right">							        <a
                                                            href="#" class="dropdown-item"><i class="la la-edit"></i> Edit Details</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-leaf"></i> Update Status</a>							        <a
                                                            href="#" class="dropdown-item"><i class="la la-print"></i> Generate Report</a>							    </div>							</div>							<a
                                                    title="Edit details"
                                                    class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-edit"></i>							</a>							<a
                                                    title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">								<i
                                                        class="la la-trash"></i>							</a>						</span>
                                        </td>
                                    </tr>
                                    <div class="ps__rail-x" style="width: 1034px; left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 300px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 496px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 224px;"></div>
                                    </div>
                                    </tbody>
                                </table>
                                <div class="kt-datatable__pager kt-datatable--paging-loaded">
                                    <ul class="kt-datatable__pager-nav">
                                        <li><a title="First"
                                               class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled"
                                               data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
                                        </li>
                                        <li><a title="Previous"
                                               class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled"
                                               data-page="1" disabled="disabled"><i class="flaticon2-back"></i></a></li>
                                        <li style=""></li>
                                        <li style="display: none;"><input type="text"
                                                                          class="kt-pager-input form-control"
                                                                          title="Page number"></li>
                                        <li>
                                            <a class="kt-datatable__pager-link kt-datatable__pager-link-number kt-datatable__pager-link--active"
                                               data-page="1" title="1">1</a></li>
                                        <li><a class="kt-datatable__pager-link kt-datatable__pager-link-number"
                                               data-page="2" title="2">2</a></li>
                                        <li style=""></li>
                                        <li><a title="Next"
                                               class="kt-datatable__pager-link kt-datatable__pager-link--next"
                                               data-page="2"><i class="flaticon2-next"></i></a></li>
                                        <li><a title="Last"
                                               class="kt-datatable__pager-link kt-datatable__pager-link--last"
                                               data-page="2"><i class="flaticon2-fast-next"></i></a></li>
                                    </ul>
                                    <div class="kt-datatable__pager-info">
                                        <div class="dropdown bootstrap-select kt-datatable__pager-size"
                                             style="width: 60px;"><select class="selectpicker kt-datatable__pager-size"
                                                                          title="Select page size" data-width="60px"
                                                                          data-container="body" data-selected="20"
                                                                          tabindex="-98">
                                                <option class="bs-title-option" value=""></option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        <span class="kt-datatable__pager-detail">Showing 1 - 20 of 40</span></div>
                                </div>
                            </div>
                            <!--end: Datatable -->
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
    <script src="{{asset('js/horizontal.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/scripts.bundle.js')}}" type="text/javascript"></script>
@endsection
