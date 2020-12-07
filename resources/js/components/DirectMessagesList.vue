<template>
   <section class="c-h2__sec p-dmList__sec">
      <!-- ダイレクトメッセージ一覧 -->
      <span v-for="card in allData" :key="card.id">
         <direct-messages-card-component
            :public-path="publicPath"
            :card="card"
            :auth-id="authId"
         ></direct-messages-card-component>
      </span>
   </section>
</template>

<script>
import axios from 'axios';

export default {
   props: {
      publicPath: String,
      authId: Number
   },
   data() {
      return {
         allData: []
      };
   },
   mounted() {
      // 非同期取得
      axios
         .get(this.publicPath + 'async/dm-list')
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
