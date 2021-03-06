import Vue from 'vue';
import Router from 'vue-router';

import members from './members';
import reports from './reports';
import restaurants from './restaurants';
import shop from './shop';

import store from '../store';

Vue.use(Router)


const router = new Router({
	mode: 'history',
    base: process.env.USER_IMG_PATH,
	routes: [
        ...members.routes,
        ...reports.routes,
        ...restaurants.routes,
        ...shop.routes
	]
});


export default router;
