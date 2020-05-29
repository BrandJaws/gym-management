import Lead from '../views/reports/leads.vue';
import Member from '../views/reports/member.vue';
import ManageLead from '../views/reports/manageLeads.vue';
import ManageMember from '../views/reports/manageMembers.vue';

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
        }, {
            path: '/gym/report/leads',
            name: 'manageLead',
            component: ManageLead,
        },
        {
            path: '/gym/report/members',
            name: 'manageMember',
            component: ManageMember,
        },
    ]
};
