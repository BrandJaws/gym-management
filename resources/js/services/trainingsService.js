import Trainings from '../services/Api';

export default {
    fetchTraining(params) {
        return Trainings().post('/gym/training/edit/{id}', params);
    },
};
