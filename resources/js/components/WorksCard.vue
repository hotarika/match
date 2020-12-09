<template>
   <a class="c-workCard" :href="publicPath + 'works/' + work.id">
      <div class="c-workCard__nameWrap">
         <img
            class="c-img c-workCard__img"
            :src="publicPath + 'storage/user_img/' + work.u_image"
            alt="ユーザーのアイコン"
         />
         <span class="c-workCard__name">{{ work.u_name }}</span>
      </div>

      <div class="c-workCard__head">{{ work.w_name }}</div>

      <!-- 単発案件 -->
      <div class="c-workCard__contract">
         <template v-if="work.contract_id === 1">
            <div class="c-workCard__contractIconWrap">
               <i class="fas fa-male c-workCard__contractIcon -oneoff"></i>
            </div>
            <div class="c-workCard__contractWayWrap -oneoff">
               <div class="c-workCard__contractWay">単発案件</div>
               <div class="c-workCard__contractPrice">
                  {{ work.price_lower | addComma }} ~
                  {{ work.price_upper | addComma }}千円
               </div>
            </div>
         </template>
         <template v-if="work.contract_id === 2">
            <div class="c-workCard__contractIconWrap">
               <i
                  class="fas fa-people-arrows c-workCard__contractIcon -share"
               ></i>
            </div>
            <div class="c-workCard__contractWayWrap -share">
               <div class="c-workCard__contractWay -share">
                  レベニューシェア
               </div>
            </div>
         </template>
      </div>

      <!-- 情報 -->
      <div class="c-workCard__infoItem">
         <div class="c-workCard__infoItemHead">締め切り日：</div>
         <span class="c-workCard__endDate">{{ showEndDateContents }}</span>
      </div>
   </a>
</template>

<script>
import { getDateNewFormat } from '../modules/getDateNewFormat';

export default {
   props: {
      work: Object,
      publicPath: String
   },
   filters: {
      // 単発案件の金額にカンマをつけるためのフィルター
      addComma(value) {
         return value.toLocaleString();
      }
   },
   computed: {
      showEndDateContents() {
         const today = new Date();
         const endDate = new Date(this.work.end_date);
         const formatDate = getDateNewFormat(today);
         const formatEndDate = getDateNewFormat(endDate);
         if (this.work.state === 2 || formatEndDate < formatDate) {
            return '応募終了';
         } else if (formatEndDate > formatDate) {
            return this.work.end_date;
         } else {
            return '本日終了';
         }
      }
   }
};
</script>
