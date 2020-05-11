import RestaurantsService from '../services/restaurantsService';
import { reject, resolve } from 'any-promise';

export default {
    strict: true,
    state: {
        orderProcessList: [],
        totalOrderProcess: 0,
        perPage: 0,
        restaurantOrder: [],
        orderDetail:[]
    },
    mutations: {
        setOrderProcessList(state, orderProcessList) {
            state.orderProcessList = orderProcessList.response.data;
            state.totalOrderProcess = orderProcessList.response.total;
            state.perPage = orderProcessList.response.per_page;
        },
        setRestaurantOrder(state, restaurantOrder) {
            state.restaurantOrder = restaurantOrder.response.data;
        },
        setOrderDetail(state, orderDetail) {
            state.orderDetail = orderDetail.response;
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
        updateRestaurantOrder({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.updateRestaurantOrder(params).then((response) => {
                    commit('setRestaurantOrder', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        updateOrderDetail({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.updateOrderDetail(params).then((response) => {
                    commit('setOrderDetail', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        }

    },
    getters: {
        orderProcessList(state) {
            return state.orderProcessList;
        },
        totalOrderProcess(state) {
            return state.totalOrderProcess;
        },
        restaurantOrder(state) {
            return state.restaurantOrder;
        },
        orderDetail(state) {
            return state.orderDetail;
        },
    }
};
