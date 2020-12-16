<template>
   <span class="c-badge__mark -direct" v-if="count > 0"></span>
</template>

<script>
import axios from 'axios';

export default {
   props: {
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
         .get(this.publicPath + 'async/pubmsgs-badge')
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
