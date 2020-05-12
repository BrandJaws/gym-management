<template>
    <div class="container-fluid ">
        <top-header></top-header>
        <div style="margin-top:5%">
            <!--            {{ form.total}}-->
        </div>
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i
                    class="fa fa-plus"></i></button>
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
                            <a @click="editCategory(props.row)" data-toggle="modal" data-target="#myModal"
                               class="btn btn-label-danger btn-pill"> Edit</a>
                            <a @click="deleteCategory(props.row)" class="btn btn-label-success btn-pill">Delete</a>
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
        <template id="bs-modal">
            <!-- MODAL -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"> Category </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row mb-15">
                                <div class="col-lg-6">
                                    <label>Category Name:</label>
                                    <input type="text" name="name" v-model="form.name" class="form-control" required
                                           maxlength="50" placeholder="Enter Category Name">
                                </div>
                                <div class="col-lg-6">
                                    <label>Image:</label>
                                    <el-upload :action="uploadActionUrl">
                                        <el-button size="small" type="primary">Click Upload</el-button>
                                    </el-upload>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <a  data-dismiss="modal" aria-label="Close" class="btn btn-secondary">Cancel</a>
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
                    categoryImage:''
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
                console.log(params.row);
            },
            editCategory(params) {
                console.log(params.id, "test***");
            },
            deleteCategory(params) {
                console.log(params.id, "test***");
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

