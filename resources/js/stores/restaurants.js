import RestaurantsService from '../services/restaurantsService';
import { reject, resolve } from 'any-promise';

export default {
    strict: true,
    state: {
        restaurantList:[]
    },
    mutations: {
        setRestaurantList(state, restaurantList) {
            state.restaurantList = restaurantList.response;
        },
    },
    actions: {
        fetchRestaurant({commit}, params) {
            return new Promise((resolve, reject) => {
                RestaurantsService.fetchRestaurant(params).then((response) => {
                    commit('setRestaurantList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },


    },
    getters: {
        restaurantList(state) {
            return state.restaurantList;
        },
    }
};
