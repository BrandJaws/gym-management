<template>
  <!-- Header Section start -->
  <div class="container-fluid">
      <div class="kt-subheader   kt-grid__item" id="kt_subheader">
          <div class="kt-container  kt-container--fluid ">
              <div class="kt-subheader__main">
                  <h3 class="kt-subheader__title">
                     Report </h3>
                  <span class="kt-subheader__separator kt-hidden"></span>
                  <div class="kt-subheader__breadcrumbs">
                      <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <router-link :to="{ name: 'manageLead' }" class="kt-subheader__breadcrumbs-link"> Leads</router-link>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <router-link :to="{ name: 'manageMember' }" class="kt-subheader__breadcrumbs-link">  Members</router-link>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
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
  name: "reportHeader"
};
</script>
<style lang="css"></style>
