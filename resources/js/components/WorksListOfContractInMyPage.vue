<template>
   <section class="c-h2__sec">
      <h2 class="c-h2__head">発注した仕事</h2>
      <div class="c-h2__workCardBody p-mypage__secBody">
         <span v-for="work of allData" :key="work.id">
            <work-card-component
               :work="work"
               :public-path="publicPath"
            ></work-card-component>
         </span>
      </div>
   </section>
</template>

<script>
import axios from 'axios';

export default {
   props: {
      publicPath: String
   },
   data() {
      return {
         allData: []
      };
   },
   mounted() {
      // 非同期取得
      axios
         .get(this.publicPath + 'async/works-contract-mypage')
         .then(res => {
            console.log(res);
            this.allData = res.data; // 全データを格納
         })
         .catch(err => {
            console.log(err);
         });
   }
};
</script>
