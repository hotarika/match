<template>
   <section class="c-h2__sec p-dmList__sec">
      <!-- ダイレクトメッセージ一覧 -->
      <template v-for="card in allData">
         <direct-messages-card-component
            :public-path="publicPath"
            :card="card"
            :auth-id="authId"
            :key="card.id"
         ></direct-messages-card-component>
      </template>
      <div class="c-h2__noItems -list" v-if="allData.length === 0">
         ダイレクトメッセージはありません
      </div>
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
