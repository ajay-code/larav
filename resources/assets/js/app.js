

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./boot/bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.config.debug = false;
// Vue.config.silent = true;

Vue.component('add-to-wishlist', require('./components/user/AddToMyWishList.vue'));
Vue.component('bid-form', require('./components/user/BidForm.vue'));
Vue.component('chat', require('./components/messanger/chat.vue'));
Vue.component('message-left', require('./components/messanger/messageLeft.vue'));
Vue.component('message-right', require('./components/messanger/messageRight.vue'));
Vue.component('message-form', require('./components/messanger/form.vue'));

new Vue({    
    el: '#app',
    data : {

    }
});




require('cropperjs');
require('./vendor/uploadImage');
