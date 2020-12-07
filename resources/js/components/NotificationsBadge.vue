<template>
   <li class="p-header__item">
      <a class="c-link p-header__navLink" :href="mypageUrl">
         <span class="p-header__notificationNum" v-if="count > 0">{{
            count
         }}</span>
         <i class="fas fa-bell p-header__navIcon"></i>
         <div class="p-header__navName u-ml6">新着通知</div>
      </a>
   </li>
</template>

<script>
import axios from 'axios';

export default {
   props: {
      mypageUrl: String,
      publicPath: String
   },
   data() {
      return {
         count: 0
      };
   },
   mounted() {
      // 取得
      axios
         .get(this.publicPath + 'async/badge')
         .then(res => {
            console.log(res);
            this.count = res.data[0].count;
         })
         .catch(err => {
            console.log(err);
         });
   }
};
</script>
