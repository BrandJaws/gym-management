import Restaurants from '../services/Api';

export default {
    fetchOrderProcess(params) {
        return Restaurants().post('/gym/restaurant', params);
    },
    updateRestaurantOrder(params) {
        return Restaurants().post('/gym/restaurant/updateOrder', params.data);
    },
    updateOrderDetail(params) {
        return Restaurants().get('/gym/restaurant/' + params);
    },
    fetchMainCategory(params) {
        return Restaurants().post('/gym/restaurant/list', params);
    },
    deleteCategory(params) {
        return Restaurants().get('/gym/restaurant/' + params.id + '/deleteCategory');
    },
    fetchSubCategory(params) {
        return Restaurants().get('/gym/restaurant/list/' + params.id);
    },
    fetchProducts(params) {
        return Restaurants().get('/gym/restaurant/products/' + params.id);
    },
    deleteSubCategory(params) {
        return Restaurants().get('/gym/restaurant/' + params.id + '/deleteSubCategory');
    },
};
