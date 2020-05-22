<template>

    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <top-header></top-header>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid mt-5">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Restaurant Order
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline"></div>
                        </div>
                        <div class="container-fluid">
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <div class="page-vue-good-table reportTable">
                                        <div class="table table-border">
                                            <div class="table table-border">
                                                <vue-good-table
                                                    v-loading="loading"
                                                    title="Order Process List Table"
                                                    globalSearch="true"
                                                    :responsive="true"
                                                    :lineNumbers="true"
                                                    class="styled "
                                                    styleClass="table table-striped table-bordered"
                                                    mode="remote"
                                                    :columns="columns"
                                                    :rows="orderProcessList"
                                                    :totalRows="totalRecords"
                                                    paginate="true"
                                                    :pagination-options="{
					                enabled: true,
					                perPageDropdown: [5, 10, 15],
					                perPage:serverParams.perPage
				                   }"
                                                    :search-options="{
					                enabled: true,
				                }"
                                                    @on-page-change="onPageChange"
                                                    @on-per-page-change="onPerPageChange"
                                                    @on-search="search">
                                                    <template slot="table-row" slot-scope="props">
                                                        <a class="btn btn-sm primary"
                                                           @on-row-click="onRowClick">save</a>
                                                    </template>
                                                    <template slot="table-row" slot-scope="props">
                                    <span v-if="props.column.field == 'action'" class="grid-action-icons">
                                        <a @click="inProcess(props.row)" v-if="props.row.in_process == 'NO' "
                                           class="btn btn-label-danger btn-pill"> In Process</a>
                                        <a v-else class="btn btn-label-danger btn-pill disabled"> In Progress <i
                                            class="fa fa-check"></i> </a>

                                        <a @click="isReady(props.row)" v-if="props.row.is_ready == 'NO' "
                                           class="btn btn-label-info btn-pill">Is Ready</a>
                                        <a v-else class="btn btn-label-info btn-pill disabled">Is Ready <i
                                            class="fa fa-check"></i> </a>

                                        <a @click="isServed(props.row)" v-if="props.row.is_served == 'NO' "
                                           class="btn btn-label-success btn-pill">Is Served</a>
                                        <a v-else class="btn btn-label-success btn-pill disabled">Is Served <i
                                            class="fa fa-check"></i> </a>
                                        <button type="button" class="btn btn-default" data-toggle="modal"
                                                data-target="#myModal" @click="edit(props.row.id)"><i
                                            class="fa fa-print"></i></button>
                                    </span>
                                                    </template>
                                                </vue-good-table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <template id="bs-modal">
                                    <!-- MODAL -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div
                                                        class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                                                        <div class="kt-portlet">
                                                            <div class="kt-portlet__body kt-portlet__body--fit">
                                                                <div class="kt-invoice-2">
                                                                    <div class="kt-invoice__head">
                                                                        <div class="kt-invoice__container">
                                                                            <div class="kt-invoice__brand">
                                                                                <h1 class="kt-invoice__title">
                                                                                    INVOICE</h1>
                                                                                <div href="#" class="kt-invoice__logo">
                                                                <span class="kt-invoice__desc">
															<span>Order # {{  orderDetailList.id }}</span>
														</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="kt-invoice__items">
                                                                                <div class="kt-invoice__item">
                                                                                <span
                                                                                    class="kt-invoice__subtitle">DATE</span>
                                                                                    <span class="kt-invoice__text"> {{ orderDetailList.date }}</span>
                                                                                </div>
                                                                                <div class="kt-invoice__item">
                                                                                    <span class="kt-invoice__subtitle">INVOICE NO.</span>
                                                                                    <span class="kt-invoice__text">INV-{{ orderDetailList.id }}</span>
                                                                                </div>
                                                                                <div class="kt-invoice__item">
                                                                                    <span class="kt-invoice__subtitle">CUSTOMER NAME</span>
                                                                                    <span class="kt-invoice__text">{{ orderDetailList.Member }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <p><b>Order Status</b>
                                                                        <a @click="inProcessPopup(orderDetailList.id)"
                                                                           v-if="orderDetailList.in_process == 'NO' "
                                                                           class="btn btn-label-danger btn-pill"> In
                                                                            Process</a>
                                                                        <a v-else
                                                                           class="btn btn-label-danger btn-pill disabled">
                                                                            In
                                                                            Progress </a>
                                                                        <a @click="isReadyPopup(orderDetailList.id)"
                                                                           v-if="orderDetailList.is_ready == 'NO' "
                                                                           class="btn btn-label-info btn-pill">Is
                                                                            Ready</a>
                                                                        <a v-else
                                                                           class="btn btn-label-info btn-pill disabled">Is
                                                                            Ready</a>

                                                                        <a @click="isServedPopup(orderDetailList.id)"
                                                                           v-if="orderDetailList.is_served == 'NO' "
                                                                           class="btn btn-label-success btn-pill">Is
                                                                            Served</a>
                                                                        <a v-else
                                                                           class="btn btn-label-success btn-pill disabled">Is
                                                                            Served</a>
                                                                    </p>
                                                                    <div class="kt-invoice__body">
                                                                        <div class="kt-invoice__container">
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>QTY</th>
                                                                                        <th>DESCRIPTION</th>
                                                                                        <th>UNIT PRICE</th>
                                                                                        <th>TOTAL</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr v-for="(detail, index) in orderDetail">
                                                                                        <td>{{ detail.quantity }}</td>
                                                                                        <td>{{ detail.name }}</td>
                                                                                        <td>{{ detail.price }}</td>
                                                                                        <td class="kt-font-danger kt-font-lg">
                                                                                            {{
                                                                                            detail.sale_total }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kt-invoice__footer">
                                                                        <div class="kt-invoice__container">
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>SUB-TOTAL</th>
                                                                                        <th>VAT INCLUDED IN TOTAL</th>
                                                                                        <th>TOTAL AMOUNT</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>{{
                                                                                            orderDetailList.gross_total}}
                                                                                        </td>
                                                                                        <td>{{ orderDetailList.vat}}
                                                                                        </td>
                                                                                        <td class="kt-font-danger kt-font-xl kt-font-boldest">
                                                                                            {{
                                                                                            orderDetailList.net_total}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kt-invoice__actions">
                                                                        <div class="kt-invoice__container">
                                                                            <button type="button"
                                                                                    class="btn btn-label-brand btn-bold"
                                                                                    onclick="window.print();">Print
                                                                                Invoice
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
</template>

<script>
    import RestaurantHeader from "../../components/RestaurantHeader";

    export default {
        name: 'VGTable',
        components: {
            "top-header": RestaurantHeader,
        },
        data() {
            return {

                loading: true,
                error: '',
                columns: [
                    {
                        label: 'Member',
                        field: 'Member',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: 'Gross Total',
                        field: 'gross_total',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: 'Date',
                        field: 'created_at',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: "Actions",
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        field: "action"
                    }
                ],
                serverParams: {
                    page: 1,
                    perPage: 5,
                    searchTerm: ''
                },
                form: {
                    id: '',
                    status: '',
                },
                orderDetailList: {
                    id: '',
                    Member: '',
                    date: '',
                    in_process: '',
                    is_ready: '',
                    is_served: '',
                    gross_total: '',
                    vat: '',
                    net_total: ''
                },
                timeout: null
            }
        },
        created() {
            this.fetchOrderProcess();
        },
        computed: {
            orderProcessList() {
                return this.$store.getters.orderProcessList;
            },
            totalRecords() {
                return this.$store.getters.totalOrderProcess;
            },
            orderDetail() {
                return this.$store.getters.orderDetail;
            },
        },
        methods: {
            inProcess(params) {
                this.form.id = params.id;
                this.form.status = "In Process";
                this.$store.dispatch('updateRestaurantOrder', {
                    data: this.form
                });
                this.handleFilter();
            },
            inProcessPopup(params) {
                this.form.id = params;
                this.form.status = "In Process";
                this.$store.dispatch('updateRestaurantOrder', {
                    data: this.form
                });
                this.edit(params);
            },
            isReady(params) {
                this.form.id = params.id;
                this.form.status = "Is Ready";
                this.$store.dispatch('updateRestaurantOrder', {
                    data: this.form
                });
                this.handleFilter();
            },
            isReadyPopup(params) {
                this.form.id = params;
                this.form.status = "Is Ready";
                this.$store.dispatch('updateRestaurantOrder', {
                    data: this.form
                });
                this.edit(params);
            },
            isServed(params) {
                this.form.id = params.id;
                this.form.status = "Is Served";
                this.$store.dispatch('updateRestaurantOrder', {
                    data: this.form
                });
                this.handleFilter();
            },
            isServedPopup(params) {
                this.form.id = params;
                this.form.status = "Is Served";
                this.$store.dispatch('updateRestaurantOrder', {
                    data: this.form
                });
                this.edit(params);
            },
            updateParams(newProps) {
                this.error = '';
                this.loading = true;
                try {
                    this.serverParams = Object.assign({}, this.serverParams, newProps);
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            onPerPageChange(params) {
                this.error = '';
                this.loading = true;
                try {
                    this.updateParams({perPage: params.currentPerPage});
                    this.fetchOrderProcess();
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            onPageChange(params) {
                this.error = '';
                this.loading = true;
                try {
                    this.updateParams({page: params.currentPage});
                    this.fetchOrderProcess();
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            fetchOrderProcess() {
                this.error = '';
                this.loading = true;
                try {
                    this.$store.dispatch("fetchOrderProcess", this.serverParams);
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            edit(object) {
                this.$store.dispatch('updateOrderDetail', object).then(() => {
                    this.orderDetail;
                    var list = this.orderDetail;
                    this.orderDetailList.id = list[0].id;
                    this.orderDetailList.Member = list[0].Member;
                    this.orderDetailList.date = list[0].created_at;
                    this.orderDetailList.in_process = list[0].in_process;
                    this.orderDetailList.is_ready = list[0].is_ready;
                    this.orderDetailList.is_served = list[0].is_served;
                    this.orderDetailList.gross_total = list[0].gross_total;
                    this.orderDetailList.vat = list[0].vat;
                    this.orderDetailList.net_total = list[0].net_total;
                });
            },
            handleFilter() {
                this.fetchOrderProcess();
            },

            search(params) {
                this.error = '';
                this.loading = true;
                try {
                    var self = this;
                    clearTimeout(this.timeout);
                    this.timeout = setTimeout(function () {
                        self.updateParams({searchTerm: params.searchTerm});
                        self.fetchOrderProcess();
                    }, 500);
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            }
        }
    }
</script>

<style lang="scss">

    .page-vue-good-table {
        overflow: hidden;
    }

    .vgt-global-search {
        padding: 5px 0;
        display: -webkit-box;
        display: flex;
        flex-wrap: nowrap;
        -webkit-box-align: stretch;
        align-items: stretch;
        border: 1px solid #FFF !important;
        border-bottom: 0;
        background: -webkit-gradient(linear, left top, left bottom, from(#f4f5f8), to(#f1f3f6));
        background: linear-gradient(#e8e9ec00, #f1f3f608) !important;
    }

    .vgt-global-search__input .input__icon {
        position: absolute;
        right: 0 !important;
        max-width: 32px;
    }

    .vgt-input, .vgt-select {
        width: 25% !important;
        float: right !important;
    }

    .modal-active {
        display: block;
    }

    .modal-dialog {
        max-width: 1242px !important;
        margin: 1.75rem auto;
    }

    .modal-dialog {
        max-height: 1242px !important;
        margin: 1.75rem auto;
    }
    .kt-grid.kt-grid--hor:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile) {
        background: #f2f3f8  !important;
    }
</style>

