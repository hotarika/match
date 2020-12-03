import '../js/modules/navigation'; // スマホ用ナビゲーションの読み込み
import '../js/modules/showInputForm'; // スマホ用ナビゲーションの読み込み

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

// =====================
// sections
// =====================
// 仕事詳細画面 / work-detail
Vue.component('pubmsg-area-section', require('./sections/s-pubmsg-area.vue').default);
Vue.component('workcard-area-section', require('./sections/s-workcard-area.vue').default);
Vue.component('newly-workcard-section', require('./sections/s-newly-workcard.vue').default);

// =====================
// components
// =====================
// 仕事詳細画面 / work-detail
Vue.component('child-form-component', require('./components/c-child-form.vue').default);
Vue.component('notification-component', require('./components/NotificationList.vue').default);
Vue.component('notification-badge-component', require('./components/NotificationBadge.vue').default);
Vue.component('work-card-component', require('./components/WorkCard.vue').default);
Vue.component('dm-list-component', require('./components/DmList.vue').default);
Vue.component('pubmsg-card-component', require('./components/PubmsgCard.vue').default);
Vue.component('dm-component', require('./components/DmArea.vue').default);
Vue.component('work-component', require('./components/WorkList.vue').default);
Vue.component('image-edit-component', require('./components/ImageEdit.vue').default);
Vue.component('pagination-component', require('./components/Pagination.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
   el: '#app'
});
