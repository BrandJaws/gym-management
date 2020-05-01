@extends('_layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @include('_layouts.flash-message')
            <div class="row">
                <div class="col-sm-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Disabled Calls
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::Section-->
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="name" style="cursor: pointer">Employee <span
                                                            id="id_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="duration" style="cursor: pointer">Member
                                                        <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="duration" style="cursor: pointer">Type
                                                        <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="amount" style="cursor: pointer">Date <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="monthlyFee" style="cursor: pointer">Transfer
                                                        Status<span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="detail" style="cursor: pointer">Transfer
                                                        Employee <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name="detail" style="cursor: pointer">Re-Schedule
                                                        Date <span
                                                            id="post_title_icon"></span></th>
                                                    <th class="sorting" data-sorting_type="asc"
                                                        data-column_name=" " style="cursor: pointer">Actions <span
                                                            id="post_title_icon"></span></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($pipeline as $row)
                                                    <tr>
                                                        <th>{{$i}}</th>
                                                        <td>@if($row->employee != NULL) {{ $row->employee->name }} @else
                                                                --- @endif</td>
                                                        <td>@if($row->member != NULL) {{ $row->member->name }} @else
                                                                --- @endif</td>
                                                        <td>{{ $row->stage }}</td>
                                                        <td>{{ $row->scheduleDate }}</td>
                                                        <td>{{ $row->transferStage }}</td>
                                                        <td>@if($row->transferEmployee != NULL) {{ $row->transferEmployee->name }} @else
                                                                --- @endif</td>
                                                        <td>@if($row->reScheduleDate != NULL) {{ $row->reScheduleDate }} @else
                                                                --- @endif</td>
                                                        <td>
                                                            <a href="{{url('/gym/member/edit', $row->id)}}"
                                                               class="dropdown-toggle" id="dropdownMenuButton"
                                                               data-toggle="dropdown">
                                                                <i class="fa flaticon2-graph"></i>
                                                            </a>
                                                            <div class="dropdown-menu"
                                                                 aria-labelledby="dropdownMenuButton"
                                                                 style="transform: translate3d(912px, 221px, 0px)!important;">
                                                                <a class="dropdown-item"
                                                                   href="{{url('/gym/member/distroyPipeline', $row->id)}}"><i
                                                                        class="fa flaticon2-delete"></i> Delete</a>
                                                                <a class="dropdown-item"
                                                                   href="{{url('/gym/member/restorePipeline', $row->id)}}"><i
                                                                        class="fa flaticon2-expand"></i> Enabled</a>
                                                            </div>
                                                        </td>
                                                        <?php  $i++; ?>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="9" align="center">
                                                        {{ $pipeline->links() }}
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
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
        <!-- end:: Content -->
    </div>



@endsection
