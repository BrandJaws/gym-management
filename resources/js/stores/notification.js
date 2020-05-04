import NotificationService from '../services/notificationService';
import { reject, resolve } from 'any-promise';

export default {
    strict: true,
    state: {
        leadList:[]
    },
    mutations: {
        setNotificationList(state, notificationList) {
            state.notificationList = notificationList.response;
        },
    },
    actions: {
        fetchNotification({commit}, params) {
            return new Promise((resolve, reject) => {
                NotificationService.fetchNotification(params).then((response) => {
                    commit('setNotificationList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },


    },
    getters: {
        notificationList(state) {
            return state.notificationList;
        },
    }
};
