/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// =====================
// common
// =====================
// 全体で使用
Vue.component('header-component', require('./common/header.vue').default);
Vue.component('footer-component', require('./common/footer.vue').default);
Vue.component('sidebar-component', require('./common/sidebar.vue').default);
Vue.component('sidebar-settings-component', require('./common/sidebar-settings.vue').default);
Vue.component('pagination-component', require('./common/pagination.vue').default);

// =====================
// sections
// =====================
// 仕事詳細画面 / work-detail
Vue.component('work-detail-section', require('./sections/s-work-detail.vue').default);
Vue.component('pubmsg-area-section', require('./sections/s-pubmsg-area.vue').default);
Vue.component('workcard-area-section', require('./sections/s-workcard-area.vue').default);
Vue.component('newly-workcard-section', require('./sections/s-newly-workcard.vue').default);

// =====================
// components
// =====================
// 仕事詳細画面 / work-detail
Vue.component('child-form-component', require('./components/c-child-form.vue').default);
Vue.component('notification-component', require('./components/NotificationList.vue').default);
Vue.component('work-card-component', require('./components/WorkCard.vue').default);
Vue.component('dm-list-component', require('./components/DmList.vue').default);
Vue.component('pubmsg-card-component', require('./components/PubmsgCard.vue').default);
Vue.component('dm-component', require('./components/DmArea.vue').default);
Vue.component('work-component', require('./components/WorkList.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
   el: '#app'
});
