<template>
   <section class="c-h2__sec p-pubmsgList__sec">
      <!-- ダイレクトメッセージ一覧 -->
      <template v-for="msgCard of allData">
         <public-messages-card-component
            :msg-card="msgCard"
            :public-path="publicPath"
            :auth-id="authId"
            :key="msgCard.pm_id"
         ></public-messages-card-component>
      </template>
      <div class="c-h2__noItems -list" v-if="allData.length === 0">
         パブリックメッセージはありません
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
         .get(this.publicPath + 'async/pubmsgs-list')
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
