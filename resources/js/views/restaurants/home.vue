<template>
    <div class="container-fluid ">
        <top-header></top-header>
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
                                class="styled"
                                styleClass="vgt-table"
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
                                    <a class="btn btn-sm primary" @on-row-click="onRowClick">save</a>
                                </template>
                                <template slot="table-row" slot-scope="props">
                                    <span v-if="props.column.field == 'action'" class="grid-action-icons">
                                        <a @click="inProcess(props.row)" v-if="props.row.in_process == 'NO' "
                                           class="btn btn-label-danger btn-pill"> In Process</a>
                                        <a v-else class="btn btn-label-danger btn-pill disabled"> In Progress</a>

                                        <a @click="isReady(props.row)" v-if="props.row.is_ready == 'NO' "
                                           class="btn btn-label-info btn-pill">Is Ready</a>
                                        <a v-else class="btn btn-label-info btn-pill disabled">Is Ready</a>

                                        <a @click="isServed(props.row)" v-if="props.row.is_served == 'NO' "
                                           class="btn btn-label-success btn-pill">Is Served</a>
                                        <a v-else class="btn btn-label-success btn-pill disabled">Is Served</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myModal" @click="edit(props.row)">Edit</button>
                                    </span>
                                </template>
                            </vue-good-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <template id="bs-modal">
            <!-- MODAL -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">  </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><b>Customer Name</b></p>
                                    <h4>{{ orderDetail.Member }}</h4>
                                    <p><b>Order Status</b>
                                        <a @click="inProcessPopup(orderDetail.id)"
                                           v-if="orderDetail.in_process == 'NO' "
                                           class="btn btn-label-danger btn-pill"> In Process</a>
                                        <a v-else class="btn btn-label-danger btn-pill disabled"> In Progress</a>

                                        <a @click="isReadyPopup(orderDetail.id)" v-if="orderDetail.is_ready == 'NO' "
                                           class="btn btn-label-info btn-pill">Is Ready</a>
                                        <a v-else class="btn btn-label-info btn-pill disabled">Is Ready</a>

                                        <a @click="isServedPopup(orderDetail.id)" v-if="orderDetail.is_served == 'NO' "
                                           class="btn btn-label-success btn-pill">Is Served</a>
                                        <a v-else class="btn btn-label-success btn-pill disabled">Is Served</a>
                                    </p>
                                    {{ orderDetail.Member }}
                                    {{ orderDetail.Member }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
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
                this.handleFilter();
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
                this.$store.dispatch('updateOrderDetail', object.id).then(() => {
                    this.orderDetail;
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
</style>

