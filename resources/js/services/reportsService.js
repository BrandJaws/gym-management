import Reports from '../services/Api';

export default {
    fetchLeads(params) {
        return Reports().post('/gym/member/reports', params);
    },
    fetchGymLeads(params) {
        return Reports().post('/gym/report/leads', params);
    },
};
