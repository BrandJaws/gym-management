import Lead from '../views/reports/leads.vue';
import Member from '../views/reports/member.vue';

export default{
    routes: [
        {
            path: '/gym/member/reports',
            name: 'leadReport',
            component: Lead,
        },   {
            path: '/gym/member/report',
            name: 'memberReport',
            component: Member,
        },
    ]
};
