<template>
   <section class="c-h2__sec">
      <h2 class="c-h2__head">応募した仕事</h2>
      <div class="c-h2__workCardBody p-mypage__secBody -workCard">
         <template v-for="work of allData.slice(0, showNum)">
            <works-card-component
               :work="work"
               :public-path="publicPath"
               :key="work.id"
            ></works-card-component>
         </template>
         <div class="c-h2__noItems -apply" v-if="allData.length === 0">
            応募した仕事はありません
         </div>
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
         allData: [],
         showNum: 6
      };
   },
   mounted() {
      // 非同期取得
      axios
         .get(this.publicPath + 'async/works-application-mypage')
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
