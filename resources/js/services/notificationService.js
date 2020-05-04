import Reports from '../services/Api';

export default {
    fetchNotification(params) {
        return Reports().post('/gym/member/reports', params);
    },
};
