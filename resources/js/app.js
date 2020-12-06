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

// =======================================
// components（ファイル名のアルファベット順）
// =======================================
// DM
Vue.component(
   'direct-messages-area-component',
   require('./components/DirectMessagesArea.vue').default
);
Vue.component(
   'direct-messages-card-component',
   require('./components/DirectMessagesCard.vue').default
);
Vue.component(
   'direct-messages-list-component',
   require('./components/DirectMessagesList.vue').default
);
Vue.component(
   'direct-messages-list-in-mypage-component',
   require('./components/DirectMessagesListInMyPage.vue').default
);

// 画像編集
Vue.component(
   'edit-image-component',
   require('./components/EditImage.vue').default
);

// 通知
Vue.component(
   'notifications-badge-component',
   require('./components/NotificationsBadge.vue').default
);
Vue.component(
   'notifications-list-component',
   require('./components/NotificationsList.vue').default
);

// ページネーション
Vue.component(
   'pagination-component',
   require('./components/Pagination.vue').default
);

// パブリックメッセージ
Vue.component(
   'public-messages-area-component',
   require('./components/PublicMessagesArea.vue').default
);
Vue.component(
   'public-messages-card-component',
   require('./components/PublicMessagesCard.vue').default
);
Vue.component(
   'public-messages-child-form-component',
   require('./components/PublicMessagesChildForm.vue').default
);
Vue.component(
   'public-messages-list-component',
   require('./components/PublicMessagesList.vue').default
);
Vue.component(
   'public-messages-list-in-mypage-component',
   require('./components/PublicMessagesListInMyPage.vue').default
);

// 仕事カード
Vue.component(
   'works-card-component',
   require('./components/WorksCard.vue').default
);
Vue.component(
   'works-list-component',
   require('./components/WorksList.vue').default
);
Vue.component(
   'works-list-in-home',
   require('./components/WorksListInHome.vue').default
);
Vue.component(
   'works-list-of-contract-in-mypage-component',
   require('./components/WorksListOfContractInMyPage.vue').default
);
Vue.component(
   'works-list-of-order-in-mypage-component',
   require('./components/WorksListOfOrderInMyPage.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
   el: '#app'
});
