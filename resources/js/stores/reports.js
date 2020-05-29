import ReportsService from '../services/reportsService';
import { reject, resolve } from 'any-promise';

export default {
    strict: true,
    state: {
        leadList:[],
        gymLeadList:[]
    },
    mutations: {
        setLeadList(state, leadList) {
            state.leadList = leadList.response;
        },
        setGymLeadList(state, gymLeadList) {
            state.gymLeadList = gymLeadList.response;
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
        fetchGymLeads({commit}, params) {
            return new Promise((resolve, reject) => {
                ReportsService.fetchGymLeads(params).then((response) => {
                    commit('setGymLeadList', response.data);
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
        gymLeadList(state) {
            return state.gymLeadList;
        },
    }
};
