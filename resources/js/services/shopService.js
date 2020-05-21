import Shop from '../services/Api';
import Restaurants from "./Api";

export default {
    fetchShopCategory(params) {
        return Shop().post('/gym/shop', params);
    },
    fetchShopProduct(params) {
        return Shop().get('/gym/shop/productList/' + params.id);
    },
    deleteShopCategory(params) {
        return Shop().get('/gym/shop/categoryDestroy/' + params.id);
    },
};
