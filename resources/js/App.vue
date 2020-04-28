<template>
    <div id="app">
        <top-bar></top-bar>

        <router-view />

        <member></member>
    </div>
</template>
<script>
    import Header from "./components/Header";
    import member from "./views/member/member";
    import FooterTop from "./components/FooterTop";
    import FooterBottom from "./components/FooterBottom";
    export default {
        components: {
            "top-bar": Header,
            "footer-top": FooterTop,
            "footer-bottom": FooterBottom
        }
    };
</script>
<style lang="scss">
    #app {
        font-family: "Avenir", Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
    }
    #nav {
        padding: 30px;
        a {
            font-weight: bold;
            color: #2c3e50;
            &.router-link-exact-active {
                color: #42b983;
            }
        }
    }
</style>
