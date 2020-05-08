import TrainingsService from '../services/trainingsService';
import { reject, resolve } from 'any-promise';

export default {
    strict: true,
    state: {
        trainingList:[]
    },
    mutations: {
        setTrainingList(state, trainingList) {
            state.trainingList = trainingList.response;
        },
    },
    actions: {
        fetchTraining({commit}, params) {
            return new Promise((resolve, reject) => {
                TrainingService.fetchTraining(params).then((response) => {
                    commit('setTrainingList', response.data);
                    resolve();
                }).catch((error) => {
                    reject(error);
                });
            });
        },


    },
    getters: {
        trainingList(state) {
            return state.trainingList;
        },
    }
};
