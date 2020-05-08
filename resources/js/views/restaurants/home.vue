<template>
    <div class="container-fluid ">
        <top-header></top-header>
        <div style="margin-top:5%">
            <!--            {{ form.total}}-->
        </div>
        <div class="row topbarSearchRow">

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-vue-good-table reportTable">
                    <div class="table table-border">

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
                form: {
                    fromDate: '',
                    toDate: '',
                    status: '',
                    total :'',
                    value: 'Lead'
                },

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
                var total = this.$store.getters.leadList.length;
                this.form.total = total;
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
        border: 1px solid #fff !important;
    }

    .table-bordered {
        border: 1px solid #ddd  !important;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #ddd !important;
    }
</style>

