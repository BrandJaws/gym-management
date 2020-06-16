import ReportsService from '../services/reportsService';
import { reject, resolve } from 'any-promise';

export default {
    strict: true,
    state: {
        leadList:[],
        gymLeadList:[],
        gymMembershipList:[]
    },
    mutations: {
        setLeadList(state, leadList) {
            state.leadList = leadList.response;
        },
        setGymLeadList(state, gymLeadList) {
            state.gymLeadList = gymLeadList.response;
        },
        setGymMembershipList(state, gymMembershipList) {
            console.log(gymMembershipList);
            state.gymMembershipList = gymMembershipList.response;
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
        fetchGymMembership({commit}, params) {
            return new Promise((resolve, reject) => {
                ReportsService.fetchGymMembership(params).then((response) => {
                    commit('setGymMembershipList', response.data);
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
        gymMembershipList(state) {
            console.log(state,"asds");
            return state.gymMembershipList;
        },
    }
};
