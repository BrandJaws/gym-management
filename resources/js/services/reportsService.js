import Reports from '../services/Api';

export default {
    fetchLeads() {
        return Reports().get('/gym/member/reports');
    },
};
