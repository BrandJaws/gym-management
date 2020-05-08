import Restaurants from '../services/Api';

export default {
    fetchRestaurant() {
        return Restaurants().post('/gym/restaurant');
    },
    fetchRestaurantList() {
        return Restaurants().get('/gym/restaurant/list');
    },
};
