import Training from '../services/Api';

export default {
    fetchTraining(params) {
        return Training().post('/gym/training/edit/{id}', params);
    },
};
