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

// =====================
// sections
// =====================
// 仕事詳細画面 / work-detail
Vue.component('workcard-area-section', require('./sections/s-workcard-area.vue').default);

// =====================
// components（ファイル名のアルファベット順）
// =====================
Vue.component('dm-component', require('./components/DirectMessagesArea.vue').default);
Vue.component('image-edit-component', require('./components/EditImage.vue').default);
Vue.component('notification-badge-component', require('./components/NotificationsBadge.vue').default);
Vue.component('notification-component', require('./components/NotificationsList.vue').default);
Vue.component('pagination-component', require('./components/Pagination.vue').default);
Vue.component('pubmsg-area-section', require('./components/PublicMessagesArea.vue').default);
Vue.component('child-form-component', require('./components/PublicMessagesChildForm.vue').default);
Vue.component('work-card-component', require('./components/WorksCard.vue').default);
Vue.component('work-component', require('./components/WorksList.vue').default);
Vue.component('work-new-section', require('./components/WorksListInHome.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
   el: '#app'
});
