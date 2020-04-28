import Member from '../services/Api';


export default {

    fetchMembers(){
        return Member().get('/member/list');
    }
};
