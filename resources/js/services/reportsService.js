import Reports from '../services/Api';


export default {

    fetchMembers(){
        return Reports().get('/member/list');
    }
};
