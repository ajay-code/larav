require('./boot/adminboot');

Vue.component('category', require('./components/admin/Category.vue'));
Vue.component('subcategory', require('./components/admin/Subcategory.vue'));

new Vue({
    el: '#app',
});
