<template>
    <div class="container-fluid ">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="kt-pricing-1 kt-pricing-1--fixed">
                        <div class="kt-pricing-1__items row">
                            <div class="kt-pricing-1__item col-lg-3">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon">
                                            <a :href="'../../gym/shop/category/add/'"
                                               class="btn btn-label-primary "><i class="fa fa-plus"></i> </a>
                                        </span>
                                        <h3 class="kt-portlet__head-title">
                                            Shop Category
                                        </h3>
                                    </div>
                                </div>
                                <vue-good-table
                                    v-loading="loading"
                                    @on-cell-click="fetchShopProduct"
                                    title="Shop Category"
                                    globalSearch="true"
                                    :responsive="true"
                                    :lineNumbers="false"
                                    class="styled"
                                    styleClass="table table-striped table-bordered"
                                    mode="remote"
                                    :columns="columns"
                                    :rows="shopCatgoryList"
                                    :totalRows="totalRecords"
                                    paginate="true"
                                    :pagination-options="{
                                        enabled: true,
                                        perPageDropdown: [5, 10, 15],
                                        perPage:serverParams.perPage
                                    }"
                                    :search-options="{
                                        enabled: false,
                                    }"
                                    @on-page-change="onPageChange"
                                    @on-per-page-change="onPerPageChange">
                                    <template slot="table-row" slot-scope="props">
                                        <span v-if="props.column.field == 'action'" class="grid-action-icons">
                                             <a :href="'../../gym/shop/category/edit/'+props.row.id"
                                                class="btn btn-label-primary btn-pill">
                                                 <i class="fa fa-edit"></i></a>
                                            <a @click="deleteShopCategory(props.row)"
                                               class="btn btn-label-success btn-pill"><i
                                                class="fa fa-trash"></i></a>
                                        </span>
                                    </template>
                                </vue-good-table>
                            </div>
                            <div class="kt-pricing-1__item  col-lg-9">
                                <div class="kt-portlet__head ">
                                    <div class="kt-portlet__head-label">
                                        <span v-if="productForm.categoryId">
                                        <a :href="'../../gym/shop/product/add/'+ productForm.categoryId"
                                           class="btn btn-label-primary "><i class="fa fa-plus"></i> </a>
                                        </span>
                                        <span v-else>
                                             <a href="#"
                                                class="btn btn-label-primary disabled "><i class="fa fa-plus"></i>  </a>
                                        </span>
                                        &nbsp;&nbsp;&nbsp;
                                        <h3 class="kt-portlet__head-title">
                                            Shop Product
                                        </h3>
                                    </div>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>In Stock</th>
                                        <th>Visible</th>
                                        <th>-</th>
                                    </tr>
                                    </thead>
                                    <tbody v-if="shopProductList.length">
                                    <tr v-for="item in shopProductList">
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.price }}</td>
                                        <td>{{ item.in_stock }}</td>
                                        <td>{{ item.visible }}</td>
                                        <td>
                                            <a :href="'../../gym/shop/product/edit/'+item.id"
                                               class="btn btn-label-primary btn-pill">
                                                <i class="fa fa-edit"></i></a>
                                            <a @click="deleteSubCategory(item.id)"
                                               class="btn btn-label-success btn-pill"><i
                                                class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody v-else>
                                    <tr>
                                        <td colspa="3">No data for table</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'VGTable',
        data() {
            return {
                loading: true,
                error: '',
                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                    },
                    {
                        label: "-",
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        field: "action"
                    }
                ],
                serverParams: {
                    page: 1,
                    perPage: 10,
                    searchTerm: ''
                },
                productForm: {
                    categoryId: ''
                },
            }
        },
        headers: {
            "Content-Type": "multipart/form-data"
        },
        created() {
            this.fetchShopCategory();
            this.fetchShopProduct();
        },
        computed: {
            shopCatgoryList() {
                return this.$store.getters.shopCatgoryList;
            },
            totalRecords() {
                return this.$store.getters.totalShopCategory;
            },
            shopProductList() {
                return this.$store.getters.shopProductList;
            },
        },
        methods: {
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
                    this.fetchShopCategory();
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
                    this.fetchShopCategory();
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            fetchShopCategory() {
                this.error = '';
                this.loading = true;
                try {
                    this.$store.dispatch("fetchShopCategory", this.serverParams);
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            deleteShopCategory(params) {
                this.$store.dispatch('deleteShopCategory', {id: params.id}).then(response => {
                    this.handleFilter();
                }).catch(error => {
                    console.log(error);
                });
            },
            handleFilter() {
                this.fetchShopCategory();
            },

            fetchShopProduct(params) {
                try {
                    this.$store.dispatch('fetchShopProduct', {id: params.row.id}).then(() => {
                        this.productForm.categoryId = params.row.id;
                    });
                } catch (e) {
                    this.error = e
                }
            },
        }
    }
</script>

<style lang="scss">
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

    .vgt-wrap__footer {
        color: #606266;
        padding: 1em;
        border: 1px solid #dcdfe600 !important;
        background: -webkit-gradient(linear, left top, left bottom, from(#f4f5f8), to(#f1f3f6));
        background: linear-gradient(#f8f4f400, #f1f3f600) !important;
    }
</style>

