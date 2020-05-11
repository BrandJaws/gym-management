import RestaurantsService from '../services/restaurantsService';
import { reject, resolve } from 'any-promise';

export default {
    strict: true,
    state: {
        orderProcessList: [],
        totalOrderProcess: 0,
        perPage: 0,
    },
    mutations: {
        setOrderProcessList(state, orderProcessList) {
            state.orderProcessList = orderProcessList.response.data;
            state.totalOrderProcess = orderProcessList.response.total;
            state.perPage = orderProcessList.response.per_page;
        },
    },
    actions: {
        fetchOrderProcess({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.fetchOrderProcess(params).then((response) => {
                    commit('setOrderProcessList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },

    },
    getters: {
        orderProcessList(state) {
            return state.orderProcessList;
        },
        totalOrderProcess(state) {
            return state.totalOrderProcess;
        },
    }
};
