import ShopService from '../services/shopService';
import {reject, resolve} from 'any-promise';

export default {
    strict: true,
    state: {
        shopCatgoryList: [],
        totalShopCategory: 0,
        perPage: 0,
        shopProductList: [],
        categoryList:[],
        productShopList:[]
    },
    mutations: {
        setShopCatgoryList(state, shopCatgoryList) {
            state.shopCatgoryList = shopCatgoryList.response.data;
            state.totalShopCategory = shopCatgoryList.response.total;
            state.perPage = shopCatgoryList.response.per_page;
        },
        setShopProductList(state, shopProductList) {
            state.shopProductList = shopProductList.response;
        },
        deleteShopCategoryList(state, categoryList) {
            state.categoryList = categoryList.response;
        },
        deleteShopProductList(state, productList) {
            state.productList = productList.response;
        },
    },
    actions: {
        fetchShopCategory({commit}, params) {
            return new Promise((resolve, reject) => {
                ShopService.fetchShopCategory(params).then((response) => {
                    commit('setShopCatgoryList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        fetchShopProduct({commit}, params) {
            return new Promise((resolve, reject) => {
                ShopService.fetchShopProduct(params).then((response) => {
                    commit('setShopProductList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        deleteShopCategory({commit}, params) {
            return new Promise((resolve, reject) => {
                ShopService.deleteShopCategory(params).then((response) => {
                    commit('deleteShopCategoryList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
        deleteShopProduct({commit}, params) {
            return new Promise((resolve, reject) => {
                ShopService.deleteShopProduct(params).then((response) => {
                    commit('deleteShopProductList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },
    },
    getters: {
        shopCatgoryList(state) {
            return state.shopCatgoryList;
        },
        totalShopCategory(state) {
            return state.totalShopCategory;
        },
        shopProductList(state) {
            return state.shopProductList;
        },
        categoryList(state) {
            return state.categoryList;
        },
        productShopList(state) {
            return state.productShopList;
        },
    }
};
