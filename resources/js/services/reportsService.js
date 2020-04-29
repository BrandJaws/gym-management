import Reports from '../services/Api';

export default {
    fetchLeads(params) {
        return Reports().post('/gym/member/reports', params);
    },
};
