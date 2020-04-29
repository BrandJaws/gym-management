<template>
    <div class="container-fluid">
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
                columns: [
                    {
                        label: 'Name',
                        field: 'id',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: 'Type',
                        field: 'id',
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: 'Email',
                        field: 'id',
                        type: 'email',
                        html: false,
                        tdClass: 'text-center',
                        thClass: 'text-center',
                        sortable: false,
                        filterable: true,
                    },
                    {
                        label: 'Phone',
                        field: 'id',
                        type: 'number',
                        html: false,
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
                    this.$store.dispatch("fetchLeads");
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

