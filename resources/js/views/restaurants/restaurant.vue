<template>
    <div class="container-fluid ">
        <top-header></top-header>
        <div style="margin-top:5%">
            <!--            {{ form.total}}-->
        </div>
        <div class="row">
            <div class="col-md-3">
                <a :href="'../../gym/restaurant/category/add/'" class="btn btn-label-primary ">
                    <i class="fa fa-plus"></i> Add Category</a>
                <vue-good-table
                    @on-cell-click="onCellClick"
                    v-loading="loading"
                    title="Order Process List Table"
                    :responsive="true"
                    class="styled "
                    styleClass="table table-striped table-bordered"
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
                            <a @click="deleteCategory(props.row)" class="btn btn-label-success btn-pill"><i
                                class="fa fa-trash"></i></a>
                        </span>
                    </template>
                </vue-good-table>
            </div>
            <div class="col-md-9">
                <vue-good-table
                    @on-cell-click="onCellClick"
                    v-loading="loading"
                    title="Order Process List Table"
                    :responsive="true"
                    class="styled "
                    styleClass="table table-striped table-bordered"
                    mode="remote"
                    :columns="columns"
                    :rows="mainCategory"
                    :totalRows="totalRecords"
                    paginate="false">
                    <template slot="table-row" slot-scope="props">
                        <span v-if="props.column.field == 'action'" class="grid-action-icons">
                            <a @click="edit(props.row)" class="btn btn-label-danger btn-pill"> Edit</a>
                            <a @click="delete(props.row)" class="btn btn-label-success btn-pill">Delete</a>
                        </span>
                    </template>
                </vue-good-table>
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
                        label: 'Category Name',
                        field: 'name',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                    },
                    {
                        label: "Actions",
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        field: "action"
                    }
                ],
                form: {
                    name: '',
                    categoryImage: ''
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
        },
        computed: {
            mainCategory() {
                return this.$store.getters.mainCategory;
            },
            totalRecords() {
                return this.$store.getters.totalMainCategory;
            },
        },
        methods: {
            onCellClick(params) {
                console.log(params.row,"asasdsa");
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

