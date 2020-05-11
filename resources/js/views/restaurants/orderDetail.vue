<template>
    <div class="container-fluid ">
        <top-header></top-header>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="page-vue-good-table reportTable">
                    <div class="table table-border">
                        <div class="table table-border">
                            <h1>hi sdasf</h1>
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

            }
        },
        created() {

        },
        computed: {

        },
        methods: {

        }
    }
</script>



