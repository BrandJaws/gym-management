<template id="bs-modal">
    <!-- MODAL -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> Order Detail </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <!--                            <div class="row">-->
                    <!--                                <div class="col-lg-4">-->
                    <!--                                    <p><b>Customer Name</b></p>-->
                    <!--                                    <h4>{{ orderDetail.Member }}</h4>-->
                    <!--                                    <p><b>Order Status</b>-->
                    <!--                                        <a @click="inProcessPopup(orderDetail.id)"-->
                    <!--                                           v-if="orderDetail.in_process == 'NO' "-->
                    <!--                                           class="btn btn-label-danger btn-pill"> In Process</a>-->
                    <!--                                        <a v-else class="btn btn-label-danger btn-pill disabled"> In Progress</a>-->

                    <!--                                        <a @click="isReadyPopup(orderDetail.id)" v-if="orderDetail.is_ready == 'NO' "-->
                    <!--                                           class="btn btn-label-info btn-pill">Is Ready</a>-->
                    <!--                                        <a v-else class="btn btn-label-info btn-pill disabled">Is Ready</a>-->

                    <!--                                        <a @click="isServedPopup(orderDetail.id)" v-if="orderDetail.is_served == 'NO' "-->
                    <!--                                           class="btn btn-label-success btn-pill">Is Served</a>-->
                    <!--                                        <a v-else class="btn btn-label-success btn-pill disabled">Is Served</a>-->
                    <!--                                    </p>-->
                    <!--                                    {{ orderDetail.Member }}-->
                    <!--                                    {{ orderDetail.Member }}-->
                    <!--                                </div>-->
                    <!--                                <div class="col-lg-8">-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="kt-portlet">
                            <div class="kt-portlet__body kt-portlet__body--fit">
                                <div class="kt-invoice-2">
                                    <div class="kt-invoice__head">
                                        <div class="kt-invoice__container">
                                            <div class="kt-invoice__brand">
                                                <h1 class="kt-invoice__title">INVOICE</h1>
                                                <div href="#" class="kt-invoice__logo">
                                                    <a href="#"><img src="assets/media/company-logos/logo_client_color.png"></a>
                                                    <span class="kt-invoice__desc">
															<span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
															<span>Mississippi 96522</span>
														</span>
                                                </div>
                                            </div>
                                            <div class="kt-invoice__items">
                                                <div class="kt-invoice__item">
                                                    <span class="kt-invoice__subtitle">DATA</span>
                                                    <span class="kt-invoice__text">Dec 12, 2017</span>
                                                </div>
                                                <div class="kt-invoice__item">
                                                    <span class="kt-invoice__subtitle">INVOICE NO.</span>
                                                    <span class="kt-invoice__text">GS 000014</span>
                                                </div>
                                                <div class="kt-invoice__item">
                                                    <span class="kt-invoice__subtitle">INVOICE TO.</span>
                                                    <span class="kt-invoice__text">Iris Watson, P.O. Box 283 8562 Fusce RD.<br>Fredrick Nebraska 20620</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-invoice__body">
                                        <div class="kt-invoice__container">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>DESCRIPTION</th>
                                                        <th>HOURS</th>
                                                        <th>RATE</th>
                                                        <th>AMOUNT</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Creative Design</td>
                                                        <td>80</td>
                                                        <td>$40.00</td>
                                                        <td class="kt-font-danger kt-font-lg">$3200.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Front-End Development</td>
                                                        <td>120</td>
                                                        <td>$40.00</td>
                                                        <td class="kt-font-danger kt-font-lg">$4800.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Back-End Development</td>
                                                        <td>210</td>
                                                        <td>$60.00</td>
                                                        <td class="kt-font-danger kt-font-lg">$12600.00</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-invoice__footer">
                                        <div class="kt-invoice__container">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>BANK</th>
                                                        <th>ACC.NO.</th>
                                                        <th>DUE DATE</th>
                                                        <th>TOTAL AMOUNT</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>BARCLAYS UK</td>
                                                        <td>12345678909</td>
                                                        <td>Jan 07, 2018</td>
                                                        <td class="kt-font-danger kt-font-xl kt-font-boldest">20,600.00</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-invoice__actions">
                                        <div class="kt-invoice__container">
                                            <button type="button" class="btn btn-label-brand btn-bold" onclick="window.print();">Download Invoice</button>
                                            <button type="button" class="btn btn-brand btn-bold" onclick="window.print();">Print Invoice</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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



