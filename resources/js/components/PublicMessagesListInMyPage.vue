<template>
   <section class="c-h2__sec">
      <a class="c-btn c-h2__seeMore" :href="publicPath + 'pubmsgs'">
         <i class="fas fa-chevron-right"></i>
      </a>
      <h2 class="c-h2__head">パブリックメッセージ</h2>
      <div class="c-h2__body p-mypage__secBody">
         <!-- ダイレクトメッセージ一覧 -->
         <span
            v-for="msgCard of allData.slice(0, showNum)"
            :key="msgCard.pm_id"
         >
            <public-messages-card
               :msg-card="msgCard"
               :public-path="publicPath"
            ></public-messages-card>
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
         allData: [],
         showNum: 5
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
