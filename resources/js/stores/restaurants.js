import RestaurantsService from '../services/restaurantsService';
import {reject, resolve} from 'any-promise';

export default {
    strict: true,
    state: {
        orderProcessList: [],
        totalOrderProcess: 0,
        perPage: 0,
        restaurantOrder: [],
        orderDetail: [],
        mainCategory: [],
        totalMainCategory: 0,
        mainCategoryList: [],
        subCategory: [],
        productsList: [],
        subCategoryList:[],
        productList:[],
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
        setMainCategory(state, mainCategory) {
            state.mainCategory = mainCategory.response;
            state.totalMainCategory = mainCategory.response.total;
            state.perPage = mainCategory.response.per_page;
        },
        deleteCategoryList(state, mainCategoryList) {
            state.mainCategoryList = mainCategoryList.response;
        },
        setSubCategory(state, subCategory) {
            state.subCategory = subCategory.response;
        },
        setProductList(state, productsList) {
            state.productsList = productsList.response;
        },
        deleteSubCategoryList(state, subCategoryList) {
            state.subCategoryList = subCategoryList.response;
        },
        deleteProductList(state, productList) {
            state.productList = productList.response;
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
        },
        fetchMainCategory({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.fetchMainCategory(params).then((response) => {
                    commit('setMainCategory', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        deleteCategory({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.deleteCategory(params).then((response) => {
                    commit('deleteCategoryList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        fetchSubCategory({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.fetchSubCategory(params).then((response) => {
                    commit('setSubCategory', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        fetchProducts({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.fetchProducts(params).then((response) => {
                    commit('setProductList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        deleteSubCategory({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.deleteSubCategory(params).then((response) => {
                    commit('deleteSubCategoryList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        deleteProduct({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.deleteProduct(params).then((response) => {
                    commit('deleteProductList', response.data);
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
        restaurantOrder(state) {
            return state.restaurantOrder;
        },
        orderDetail(state) {
            return state.orderDetail;
        },
        mainCategory(state) {
            return state.mainCategory;
        },
        mainCategoryList(state) {
            return state.mainCategoryList;
        },
        subCategory(state) {
            return state.subCategory;
        },
        productsList(state) {
            return state.productsList;
        },
        subCategoryList(state) {
            return state.subCategoryList;
        },
        productList(state) {
            return state.productList;
        },
    }
};
