<template>
  <!-- Header Section start -->
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <router-link :to="{ name: 'member' }" class="navbar-brand">
          <img style="height:100px" src="../assets/img/report.jpg" />
      </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto menu">
          <li class="nav-item">
            <router-link :to="{ name: 'leadReport' }" class="nav-link router-link-exact-active router-link-active"><span class="sr-only">(current)</span> Leads Report</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{ name: 'memberReport' }" class="nav-link router-link-exact-active router-link-active"><span class="sr-only">(current)</span> Member Report</router-link>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- Header Section End -->
</template>

<script>
export default {
  name: "header"
};
</script>
<style lang="css"></style>
