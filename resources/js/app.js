import '../demo1/tools/webpack/vendors/global';
import '../demo1/tools/webpack/scripts';
require('./bootstrap');

let userId = document.head.querySelector('meta[name="user-id"]').content;

Echo.private('App.employee.'+ userId)
    .notification((notification) => {
        console.log(notification.type);
    });
