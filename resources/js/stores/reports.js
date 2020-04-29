import ReportsService from '../services/reportsService';
import { reject, resolve } from 'any-promise';

export default {
    strict: true,
    state: {
        leadList:[]
    },
    mutations: {
        setLeadList(state, leadList) {
            state.leadList = leadList.response;
        },
    },
    actions: {
        fetchLeads({commit}, params) {
            return new Promise((resolve, reject) => {
                ReportsService.fetchLeads(params).then((response) => {
                    commit('setLeadList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },


    },
    getters: {
        leadList(state) {
            return state.leadList;
        },
    }
};
