<template>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <top-header></top-header>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid mt-5">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head" style="align-items: center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Restaurant
                                </h3>
                            </div>
                            <div class="dropdown dropdown-inline"></div>
                        </div>
                        <!--begin::Portlet-->
                        <div class="">
                            <div class="kt-portlet__body">
                                <div class="kt-pricing-1 kt-pricing-1--fixed">
                                    <div class="kt-pricing-1__items row">
                                        <div class="kt-pricing-1__item col-lg-3">
                                            <div class="kt-portlet__head">
                                                <div class="kt-portlet__head-label">
                                                    <span class="kt-portlet__head-icon">
                                                        <a :href="'../../gym/restaurant/category/add/'"
                                                           class="btn btn-label-primary "><i class="fa fa-plus"></i> </a>
                                                    </span>
                                                    <h3 class="kt-portlet__head-title">
                                                        Category
                                                    </h3>
                                                </div>
                                            </div>
                                            <vue-good-table
                                                @on-cell-click="fetchSubCategory"
                                                v-loading="loading"
                                                title="Category List"
                                                :responsive="true"
                                                class="styled "
                                                styleClass="table table-hover"
                                                mode="remote"
                                                :columns="columns"
                                                :rows="mainCategory"
                                                :totalRows="totalRecords"
                                                paginate="false">
                                                <template slot="table-row" slot-scope="props">
                                                    <span v-if="props.column.field == 'action'" class="grid-action-icons">
                                                         <a :href="'../../gym/restaurant/category/edit/'+props.row.id"
                                                            class="btn btn-label-primary btn-pill">
                                                             <i class="fa fa-edit"></i></a>
                                                        <a @click="deleteCategory(props.row)"
                                                           class="btn btn-label-success btn-pill"><i
                                                            class="fa fa-trash"></i></a>
                                                    </span>
                                                </template>
                                            </vue-good-table>
                                        </div>
                                        <div class="kt-pricing-1__item  col-lg-3">
                                            <div class="kt-portlet__head ">
                                                <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon" v-if="subCategoryForm.categoryId">
                                            <a :href="'../../gym/restaurant/subCategory/add/'+ subCategoryForm.categoryId"
                                               class="btn btn-label-primary "><i class="fa fa-plus"></i>  </a>
                                        </span>
                                                    <span class="kt-portlet__head-icon" v-else>
                                            <a href="#"
                                               class="btn btn-label-primary disabled "><i class="fa fa-plus"></i>  </a>
                                        </span>
                                                    <h3 class="kt-portlet__head-title">
                                                        Sub-Category
                                                    </h3>
                                                </div>
                                            </div>
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>-</th>
                                                </tr>
                                                </thead>
                                                <tbody v-if="subCategory.length">
                                                <tr v-for="item in subCategory">
                                                    <td v-on:click="fetchProducts(item.id)">{{ item.name }}</td>
                                                    <td>
                                                        <a :href="'../../gym/restaurant/subCategory/edit/'+item.id"
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
                                        <div class="kt-pricing-1__item col-lg-6">
                                            <div class="kt-portlet__head">
                                                <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon" v-if="productForm.subCategoryId">
                                            <a :href="'../../gym/restaurant/product/add/'+ productForm.subCategoryId"
                                               class="btn btn-label-primary ">
                                            <i class="fa fa-plus"></i></a>
                                        </span>
                                                    <span class="kt-portlet__head-icon" v-else>
                                            <a href="#"
                                               class="btn btn-label-primary disabled "><i class="fa fa-plus"></i>  </a>
                                        </span>
                                                    <h3 class="kt-portlet__head-title">
                                                        Product
                                                    </h3>
                                                </div>
                                            </div>
                                            <vue-good-table
                                                :columns="productsColumns"
                                                :rows="productsList"
                                                v-loading="loading"
                                                title="Lead Report"
                                                class="styled"
                                                styleClass="table table-hover"
                                            >
                                                <template slot="table-row" slot-scope="props">
                                        <span v-if="props.column.field == 'action'" class="grid-action-icons">
                                             <a :href="'../../gym/restaurant/product/edit/'+props.row.id"
                                                class="btn btn-label-primary btn-pill">
                                                 <i class="fa fa-edit"></i></a>
                                            <a @click="deleteProduct(props.row)" class="btn btn-label-success btn-pill"><i
                                                class="fa fa-trash"></i></a>
                                        </span>
                                                </template>
                                            </vue-good-table>
                                        </div>
                                    </div>
                                </div>
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
                productsColumns: [
                    {
                        label: 'Name',
                        field: 'name',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                    },
                    {
                        label: 'Price',
                        field: 'price',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                    },
                    {
                        label: 'In Stock',
                        field: 'in_stock',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                    },
                    {
                        label: 'Visible',
                        field: 'visible',
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
                form: {
                    name: '',
                    categoryImage: ''
                },
                subCategoryForm: {
                    name: '',
                    categoryImage: '',
                    categoryId: ''
                },
                productForm: {
                    name: '',
                    subCategoryId: ''
                },
                serverParams: {
                    page: 1,
                    perPage: 10,
                    searchTerm: ''
                },
            }
        },
        headers: {
            "Content-Type": "multipart/form-data"
        },
        created() {
            this.fetchMainCategory();
            this.fetchSubCategory();
            this.fetchProducts();
        },
        computed: {
            mainCategory() {
                return this.$store.getters.mainCategory;
            },
            totalRecords() {
                return this.$store.getters.totalMainCategory;
            },
            subCategory() {
                return this.$store.getters.subCategory;
            },
            productsList() {
                return this.$store.getters.productsList;
            },
        },
        methods: {
            fetchProducts(params) {
                try {
                    this.$store.dispatch('fetchProducts', {id: params}).then(() => {
                        this.productForm.subCategoryId = params;
                    });
                } catch (e) {
                    this.error = e
                }
            },
            deleteProduct(params) {
                this.$store.dispatch('deleteProduct', {id: params.id}).then(response => {
                    this.fetchProducts(params.id);
                }).catch(error => {
                    console.log(error);
                });
            },
            fetchSubCategory(params) {
                try {
                    if (params.row.id != "") {
                        this.$store.dispatch('fetchSubCategory', {id: params.row.id}).then(() => {
                            this.subCategoryForm.categoryId = params.row.id;
                        });
                    } else {
                        this.$store.dispatch('fetchSubCategory', {id: params}).then(() => {
                            this.subCategoryForm.categoryId = params;
                        });
                    }

                } catch (e) {
                    this.error = e
                }
            },
            deleteSubCategory(params) {
                this.$store.dispatch('deleteSubCategory', {id: params}).then(response => {
                    this.fetchSubCategory(params);
                }).catch(error => {
                    console.log(error);
                });
            },
            deleteCategory(params) {
                this.$store.dispatch('deleteCategory', {id: params.id}).then(response => {
                    this.handleFilter();
                }).catch(error => {
                    console.log(error);
                });
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
            fetchMainCategory() {
                this.error = '';
                this.loading = true;
                try {
                    this.$store.dispatch("fetchMainCategory", this.serverParams);
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            handleFilter() {
                this.fetchMainCategory();
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
</style>

