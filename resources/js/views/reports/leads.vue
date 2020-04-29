<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 form-group">
                <label>Stage :</label>
                <select class="form-control" name="stage" v-model="form.stage">
                    <option value="Call Scheduled">Call Scheduled</option>
                    <option value="Appointment Scheduled">Appointment Scheduled</option>
                    <option value="Presentation Scheduled">Presentation Scheduled</option>
                    <option value="Contract Sent">Contract Sent</option>
                    <option value="Qualified To Buy">Qualified To Buy</option>
                    <option value="Closed Won">Closed Won</option>
                    <option value="Closed Lost">Closed Lost</option>
                </select>
            </div>
            <div class="col-lg-2 form-group">
                <label>Lead Name :</label>
                <input type="date" class="form-control" v-model="form.fromDate"/>
            </div>
            <div class="col-md-2">
                <span>To Date</span>
                <input type="date" class="form-control" v-model="form.toDate" name="toDate"/>
            </div>
            <div class="col-md-2">
                <button @click="fetchLeads" class="btn btn-info">Search</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-vue-good-table">
                    <div class="table table-border">
                        <vue-good-table
                            :columns="columns"
                            :rows="leadList"
                            :globalSearch="true"
                            :paginate="true"
                            :responsive="true"
                            :lineNumbers="false"
                            class="styled"
                            mode="remote"
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
                    stage: ''
                },

                columns: [
                    {
                        label: 'Member',
                        field: 'Member',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Schedule Date',
                        field: 'scheduleDate',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: true,
                        filterable: true,
                    },
                    {
                        label: 'Stage',
                        field: 'stage',
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
                console.log(this.$store.getters.leadList);
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
</style>

