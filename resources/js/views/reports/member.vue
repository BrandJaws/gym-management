<template>
    <div class="container-fluid ">
        <div style="margin-top:5%">
<!--            <p v-for="value in leadList">{{ value.length }}</p>-->
        </div>
        <div class="row">
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
                <button @click="fetchLeads" class="form-control btn btn-info">Search</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-vue-good-table">
                    <div class="table table-border">
                        <vue-good-table
                            mode="remote"
                            :columns="columns"
                            :rows="leadList"
                            :globalSearch="true"
                            :paginate="true"
                            :responsive="true"
                            :lineNumbers="true"
                            class="styled"
                            styleClass="table">
                        </vue-good-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import loading from 'vue-loading';

    export default {
        name: 'VGTable',
        data() {
            return {
                loading: true,
                form: {
                    fromDate: '',
                    toDate: '',
                    status: '',
                    value: 'Member'
                },
                columns: [
                    {
                        label: 'Lead Owner',
                        field: 'Employee',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Member',
                        field: 'name',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Phone',
                        field: 'phone',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Source',
                        field: 'source',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Rating',
                        field: 'rating',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Type',
                        field: 'type',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Status',
                        field: 'status',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Member Type',
                        field: 'memberType',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Membership',
                        field: 'Membership',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Joining Date',
                        field: 'joiningDate',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },

                ],
            }
        },
        headers: {
            "Content-Type": "multipart/form-data"
        },
        created() {
            this.fetchLeads();
        },
        computed: {
            leadList() {
                return this.$store.getters.leadList;
            },
        },
        methods: {
            fetchLeads() {
                this.error = '';
                this.loading = true;
                try {
                    this.$store.dispatch("fetchLeads", this.form);
                } catch (e) {
                    this.error = e
                }
                this.loading = false;
            },
            handleFilter() {
                this.fetchLeads();
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
        border: 3px solid #fff !important;
    }
</style>

