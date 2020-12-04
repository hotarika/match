<template>
   <section class="p-home__workCardSec">
      <div class="container">
         <!-- 見出し -->
         <div class="p-home__workCardSecHead">新着の案件</div>
         <div class="p-home__workCards">
            <!-- 仕事カードコンポーネント -->
            <span v-for="work in showList" :key="work.id">
               <work-card-component :work="work" :public-path="publicPath"></work-card-component>
            </span>
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
         showList: [], // 並び替えするための空の配列
         allData: [] // 全てのデータを格納
      };
   },
   filters: {
      addComma(value) {
         // 単発案件の金額にカンマをつけるためのフィルター
         return value.toLocaleString();
      }
   },
   mounted() {
      let cardNum;
      const showCard = [];

      // レスポンシブのカード枚数の指定（ホーム画面の「新着の仕事」の枚数）
      if (window.innerWidth > 768) {
         cardNum = 8; // PC用
      } else if (window.innerWidth > 576) {
         cardNum = 6; // タブレット用
      } else {
         cardNum = 4; // スマホ用
      }

      // 非同期取得
      axios
         .get(this.publicPath + 'async/works')
         .then(res => {
            console.log(res);
            this.allData = res.data;

            // 上記で指定した画面サイズに応じたカード枚数分、dataに格納
            for (let i = 0; i < cardNum; i++) {
               showCard[i] = this.allData[i];
            }

            this.showList = showCard;
         })
         .catch(err => {
            console.log(err);
         });
   }
};
</script>
