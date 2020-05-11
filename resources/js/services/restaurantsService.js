import Restaurants from '../services/Api';

export default {
    fetchOrderProcess(params) {
        return Restaurants().post('/gym/restaurant', params);
    },
    updateRestaurantOrder(params) {
        return Restaurants().post('/gym/restaurant/updateOrder', params.data);
    },
    updateOrderDetail(params) {
        console.log(params);
        return Restaurants().get('/gym/restaurant/' + params);
    },
};
