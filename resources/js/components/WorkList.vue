<template>
   <section class="c-h2__sec">
      <!-- 絞り込みフォーム -->
      <form class="p-workList__orderForm" action="">
         <div class="p-workList__checkbox -oneoff">
            <input type="checkbox" name="work" id="oneoff" value="oneoff" v-model="oneoff_checkbox" />
            <label for="oneoff">単発案件</label>
         </div>
         <div class="p-workList__checkbox -share">
            <input type="checkbox" name="work" id="share" value="share" v-model="share_checkbox" />
            <label for="share">レベニューシェア</label>
         </div>
         <button class="c-btn p-workList__formBtn" type="submit" @click.prevent="orderList">検索</button>
      </form>

      <!-- 仕事カード -->
      <transition-group tag="div" class="c-h2__workCardBody p-workList__workCardBody">
         <a class="c-workCard" href="work-detail" v-for="work in newList" :key="work.id">
            <div class="c-workCard__decisionTag">決定</div>
            <div class="c-workCard__nameWrap">
               <!-- <img class="c-img c-workCard__img" :src="'../../images/img2.png'" alt="ユーザーのアイコン" /> -->
               <img
                  class="c-img c-workCard__img"
                  :src="public_path + 'storage/user_img/' + work.image"
                  alt="ユーザーのアイコン"
               />
               <span class="c-workCard__name">{{ work.name }}</span>
            </div>

            <div class="c-workCard__head">
               {{ work.title }}
            </div>

            <template v-if="work.contract_id === 1">
               <!-- 単発案件 -->
               <div class="c-workCard__contract">
                  <div class="c-workCard__contractIconWrap">
                     <i class="fas fa-male c-workCard__contractIcon -oneoff"></i>
                  </div>
                  <div class="c-workCard__contractWayWrap">
                     <div class="c-workCard__contractWay">単発案件</div>
                     <div class="c-workCard__contractMoney">
                        {{ work.money_lower | addComma }} ~ {{ work.money_upper | addComma }}千円
                     </div>
                  </div>
               </div>
            </template>
            <template v-if="work.contract_id === 2">
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
      </transition-group>
   </section>
</template>

<script>
import workList from '../data/workData.json';
import axios from 'axios';

export default {
   props: ['public_path', 'image_path'],
   data() {
      return {
         workList, // 仕事カードのデータ
         newList: [], // 並び替えするための空の配列
         oneoff_checkbox: true, // 単発案件チェックボックス
         share_checkbox: true, // レベニューシェアチェックボックス
         works: []
      };
   },
   methods: {
      orderList() {
         // チェックボックスに応じて、表示カード変更（絞り込み機能）
         this.newList = this.workList.filter(val => {
            if (this.oneoff_checkbox === false && val.contract === 1) {
               return;
            }
            if (this.share_checkbox === false && val.contract === 2) {
               return;
            }
            return val;
         });
      }
   },
   filters: {
      addComma(value) {
         // 単発案件の金額にカンマをつけるためのフィルター
         return value.toLocaleString();
      }
   },
   mounted() {
      // 非同期取得
      axios
         .get(this.public_path + 'async/works')
         .then(res => {
            console.log(res);
            this.works = res.data;
            this.newList = this.works.filter(val => {
               return val;
            });
         })
         .catch(err => {
            console.log('err:', err);
         });

      // マウント時に仕事カードを全て表示
      // this.newList = this.workList.filter(val => {
      //    return val;
      // });
   }
};
</script>

<style scoped>
.v-enter,
.v-leave-to {
   opacity: 0;
}

.v-enter-active,
.v-leave-active {
   transition: all 0.5s ease-out;
}
.v-leave-active {
   position: absolute;
}

.v-move {
   transition: all 1s;
}
</style>
