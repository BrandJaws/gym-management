import Restaurants from '../services/Api';

export default {
    fetchOrderProcess(params) {
        return Restaurants().post('/gym/restaurant', params);
    },
};
