<template>
  <!-- Header Section start -->
  <div class="container-fluid">
      <div class="kt-subheader   kt-grid__item" id="kt_subheader">
          <div class="kt-container  kt-container--fluid ">
              <div class="kt-subheader__main">
                  <h3 class="kt-subheader__title">
                      Restaurant </h3>
                  <span class="kt-subheader__separator kt-hidden"></span>
                  <div class="kt-subheader__breadcrumbs">
                      <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <router-link :to="{ name: 'home' }" class="kt-subheader__breadcrumbs-link"> Home</router-link>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <router-link :to="{ name: 'restaurant' }" class="kt-subheader__breadcrumbs-link"> Restaurant</router-link>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <a href="../gym/restaurant/order/archive" class="kt-subheader__breadcrumbs-link">Order Archive</a>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                  </div>
              </div>
              <div class="kt-subheader__toolbar">
                  <div class="kt-subheader__wrapper">

                  </div>
              </div>
          </div>

      </div>

  </div>
  <!-- Header Section End -->
</template>

<script>
export default {
  name: "RestaurantHeader"
};
</script>
<style lang="css"></style>
