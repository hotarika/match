<template>
   <section class="p-home__workCardSec">
      <div class="container">
         <!-- 見出し -->
         <div class="p-home__workCardSecHead">新着の案件</div>
         <div class="p-home__workCards">
            <!-- 仕事カード -->
            <a class="c-workCard" href="work-detail.html" v-for="work in displayWorkList" :key="work.id">
               <div class="c-workCard__nameWrap">
                  <img
                     class="c-img c-workCard__img"
                     :src="require('../../images/img2.png').default"
                     alt="ユーザーのアイコン"
                  />
                  <span class="c-workCard__name">{{ work.name }}</span>
               </div>

               <div class="c-workCard__head">
                  {{ work.work_name }}
               </div>

               <!-- 単発案件 -->
               <template v-if="work.contract === 1">
                  <!-- 単発案件 -->
                  <div class="c-workCard__contract">
                     <div class="c-workCard__contractIconWrap">
                        <i class="fas fa-male c-workCard__contractIcon -oneoff"></i>
                     </div>
                     <div class="c-workCard__contractWayWrap">
                        <div class="c-workCard__contractWay">単発案件</div>
                        <div class="c-workCard__contractPrice">
                           {{ work.money_low | addComma }}~{{ work.money_high | addComma }}千円
                        </div>
                     </div>
                  </div>
               </template>

               <!-- レベニューシェア -->
               <template v-if="work.contract === 2">
                  <!-- レベニューシェア -->
                  <div class="c-workCard__contract">
                     <div class="c-workCard__contractIconWrap">
                        <i class="fas fa-people-arrows c-workCard__contractIcon -share"></i>
                     </div>
                     <div class="c-workCard__contractWayWrap">
                        <div class="c-workCard__contractWay -share">レベニューシェア</div>
                     </div>
                  </div>
               </template>

               <!-- その他情報 -->
               <div class="c-workCard__info">
                  <div class="c-workCard__infoItem -left">残り{{ work.remain_date }}日</div>
                  <div class="c-workCard__infoItem -right">応募者{{ work.app_num }}人</div>
               </div>
            </a>
         </div>
      </div>
   </section>
</template>

<script>
import workList from '../data/workData.json';

export default {
   data() {
      return {
         workList, // 仕事カードのデータ
         displayWorkList: [] // 並び替えするための空の配列
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
      const allData = this.workList;
      const showCard = [];

      // レスポンシブのカード枚数の指定（ホーム画面の「新着の仕事」の枚数）
      if (window.innerWidth > 768) {
         cardNum = 8; // PC用
      } else if (window.innerWidth > 576) {
         cardNum = 6; // タブレット用
      } else {
         cardNum = 4; // スマホ用
      }

      // 上記で指定したスクリーンサイズのカード枚数分、dataに格納
      for (let i = 0; i < cardNum; i++) {
         showCard[i] = allData[i];
      }
      this.displayWorkList = showCard;
   }
};
</script>
