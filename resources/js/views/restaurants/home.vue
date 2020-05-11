<template>
    <div class="container-fluid ">
        <top-header></top-header>
        <div style="margin-top:5%">
            <!--            {{ form.total}}-->
        </div>
        <div class="row">
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

                                <template slot="table-row" slot-scope="props" >
                                    <a class="btn btn-sm primary"  @on-row-click="onRowClick">save</a>
                                </template>
                                <template slot="table-row" slot-scope="props">
                                    <span v-if="props.column.field == 'actions'">
                                      <a class="btn btn-sm primary"  @on-row-click="onRowClick">save</a>
                                    </span>
                                                                <span v-else>
                                      {{props.formattedRow[props.column.field]}}
                                    </span>
                                </template>
                            </vue-good-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        label: 'member_id',
                        field: 'member_id',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: 'gross_total',
                        field: 'gross_total',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: 'created_at',
                        field: 'created_at',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: 'Actions',
                        field: 'actions',
                        sortable: false,
                    }
                ],
                serverParams: {
                    page: 1,
                    perPage: 5,
                    searchTerm: ''
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
        },
        methods: {
            addCustomer() {
                this.$router.push({name: "addCustomer"});
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
                this.$router.push({name: 'editCustomer', params: {id: object.id}});
            },
            handleFilter() {
                this.fetchOrderProcess();
            },
            deleteCustomer(object) {
                this.error = '';
                name = object.name;
                this.$confirm('This will permanently delete customer ' + name + '. Continue?', 'Warning', {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    type: 'warning',
                }).then(() => {
                    this.$store.dispatch('deleteCustomer', {id: object.id}).then(response => {
                        this.$message({
                            title: 'Success',
                            type: 'success',
                            message: 'Delete completed'
                        });
                        this.handleFilter();
                    }).catch(error => {
                        console.log(error);
                    });
                }).catch(() => {
                    this.$notify({
                        title: 'Warning',
                        message: 'Delete canceled',
                        type: 'warning',
                        position: 'bottom-right'
                    });
                    this.handleFilter();
                });
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

    .page-vue-good-table {
        overflow: hidden;
    }

    .table input[type="text"][data-v-d89f00e8], .table select[data-v-d89f00e8] {
        float: right;
        width: 20% !important;
    }

    .magnifying-glass[data-v-d89f00e8] {
        border: 1px solid #fff !important;
    }

    .table-bordered {
        border: 1px solid #ddd !important;
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #ddd !important;
    }
</style>

