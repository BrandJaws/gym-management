import Home from '../views/restaurants/home.vue';
import Restaurant from '../views/restaurants/restaurant.vue';
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
    ]
};
