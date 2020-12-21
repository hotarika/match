<template>
   <li class="p-header__item">
      <a class="c-link p-header__navLink" :href="mypageUrl">
         <span class="c-badge__mark -notification" v-if="count > 0"></span>
         <i class="fas fa-bell p-header__navIcon -notification"></i>
         <div class="p-header__navName u-ml4">新着通知</div>
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
         .get(this.publicPath + 'async/notification-badge')
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
