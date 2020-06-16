<template>
    <div class="container-fluid ">
        <top-bar></top-bar>
        <div style="margin-top:5%">
            <!--            {{ form.total}}-->
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head" style="align-items: center">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        List of Memberships
                    </h3>
                </div>
                <div class="dropdown dropdown-inline">
                    <div class="col-md-2">
                        <vue-excel-xlsx
                            class = "btn btn-primary"
                            :data="gymLeadList"
                            :columns="columns"
                            :filename="'GymLeads'"
                            :sheetname="'sheetname'"
                        >
                            Download
                        </vue-excel-xlsx>
                    </div>
                </div>
            </div>
        <div class="row topbarSearchRow mt-5">
            <div class="col-lg-1 form-group">
            </div>
            <div class="col-lg-3 form-group">
                <label style="float:left">From Date :</label>
                <input type="date" class="form-control" required v-model="form.fromDate"/>
            </div>
            <div class="col-md-3">
                <label style="float:left">To Date</label>
                <input type="date" class="form-control" required v-model="form.toDate" name="toDate"/>
            </div>
            <div class="col-md-2">
                <label>-</label>
                <button @click="fetchGymMembership" class="form-control btn btn-info">Search</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-vue-good-table reportTable">
                    <div class="table table-border">
                        <vue-good-table
                            :columns="columns"
                            :rows="gymMembershipList"
                            :globalSearch="true"
                            :paginate="true"
                            :responsive="true"
                            v-loading="loading"
                            title="Membership Report"
                            class="styled"
                            styleClass="table table-striped table-bordered"
                            mode="remote">
                            <template slot="table-row" slot-scope="props">
                                <span v-if="props.column.field == 'action'">
                                    <a :href="'../../gym/member/edit/'+props.row.id" class="btn btn-label-primary btn-pill">
                                        <i class="fa fa-edit"></i>
                                    </a>
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
    import Header from "../../components/ReportHeader";

    export default {
        name: 'VGTable',
        components: {
            "top-bar": Header,
        },
        data() {
            return {
                loading: true,
                form: {
                    fromDate: '',
                    toDate: '',
                    status: '',
                    total: '',
                },

                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                        tdClass: 'text-left',
                        thClass: 'text-left',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Registration Fee',
                        field: 'registrationFee',
                        tdClass: 'text-left',
                        thClass: 'text-left',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Monthly Fee',
                        field: 'monthlyFee',
                        tdClass: 'text-left',
                        thClass: 'text-left',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Affiliate Status',
                        field: 'affiliateStatus',
                        tdClass: 'text-left',
                        thClass: 'text-left',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Monthly Fee',
                        field: 'monthlyFee',
                        tdClass: 'text-left',
                        thClass: 'text-left',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'No Of Members',
                        field: 'noOfMembers',
                        tdClass: 'text-left',
                        thClass: 'text-left',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: "-",
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        field: "action"
                    }
                ],
            }
        },
        headers: {
            "Content-Type": "multipart/form-data"
        },
        created() {
            this.fetchGymMembership();
        },
        computed: {
            gymMembershipList() {
                console.log(this.$store.getters.gymMembershipList,"its membership");
                return this.$store.getters.gymMembershipList;
            },
        },
        methods: {
            fetchGymMembership() {
                this.error = '';
                this.loading = true;
                try {
                    this.$store.dispatch("fetchGymMembership", this.form);
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            handleFilter() {
                this.fetchGymLeads();
            },

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

</style>

