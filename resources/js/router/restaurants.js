import Home from '../views/restaurants/home.vue';
import Restaurant from '../views/restaurants/restaurant.vue';
import OrderDetail from '../views/restaurants/orderDetail.vue';

export default{
    routes: [
        {
            path: '/gym/restaurant',
            name: 'home',
            component: Home,
        },
        {
            path: '/gym/restaurant/list',
            name: 'restaurant',
            component: Restaurant,
        },
        {
            path: '/gym/restaurant/order/id',
            name: 'orderDetail',
            component: OrderDetail,
        },
    ]
};
