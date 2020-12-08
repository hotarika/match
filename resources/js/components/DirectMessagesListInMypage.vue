<template>
   <section class="c-h2__sec">
      <a class="c-btn c-h2__seeMore" :href="publicPath + 'dm-boards'">
         <i class="fas fa-chevron-right"></i>
      </a>
      <h2 class="c-h2__head">ダイレクトメッセージ</h2>
      <div class="c-h2__body p-mypage__secBody">
         <!-- ダイレクトメッセージ一覧 -->
         <span v-for="card in allData.slice(0, showNum)" :key="card.id">
            <direct-messages-card-component
               :public-path="publicPath"
               :card="card"
               :auth-id="authId"
            ></direct-messages-card-component>
         </span>
         <div class="c-h2__noItems -dm" v-if="allData.length === 0">
            ダイレクトメッセージはありません
         </div>
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
         allData: [],
         showNum: 5
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
