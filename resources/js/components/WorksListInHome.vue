<template>
   <section class="p-home__workCardSec">
      <div class="container">
         <!-- 見出し -->
         <div class="p-home__workCardSecHead">新着の案件</div>
         <div class="p-home__workCards">
            <!-- 仕事カードコンポーネント -->
            <template v-for="work in showList">
               <works-card-component
                  :work="work"
                  :public-path="publicPath"
                  :key="work.id"
               ></works-card-component>
            </template>
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
      if (window.innerWidth > 810) {
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

            for (
               let i = 0;
               i <
               (cardNum > this.allData.length ? this.allData.length : cardNum);
               i++
            ) {
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
