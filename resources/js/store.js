import Vue from "vue";
import Vuex from "vuex";
import Member from "./stores/member";
import Reports from "./stores/reports";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== "production";
export default new Vuex.Store({
    modules: {
        member: Member,
        reports: Reports
    },
    state: {
        loading: false
    },
    mutations: {},
    actions: {},
    strict: debug
});
