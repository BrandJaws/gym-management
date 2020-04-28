import Vue from 'vue';
import Router from 'vue-router';



import members from './members';
import reports from './reports';

import store from '../store';

Vue.use(Router)


const router = new Router({
	mode: 'history',
	routes: [
        members,
        reports
	]
})




export default router;
