<template>
   <a class="c-workCard" :href="publicPath + 'works/' + work.id">
      <div class="c-workCard__decisionTag">決定</div>
      <div class="c-workCard__nameWrap">
         <img
            class="c-img c-workCard__img"
            :src="publicPath + 'storage/user_img/' + work.image"
            alt="ユーザーのアイコン"
         />
         <span class="c-workCard__name">{{ work.u_name }}</span>
      </div>

      <div class="c-workCard__head">{{ work.w_name }}</div>

      <!-- 単発案件 -->
      <template v-if="work.contract_id === 1">
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

      <!-- レベニューシェア -->
      <template v-if="work.contract_id === 2">
         <div class="c-workCard__contract">
            <div class="c-workCard__contractIconWrap">
               <i class="fas fa-people-arrows c-workCard__contractIcon -share"></i>
            </div>
            <div class="c-workCard__contractWayWrap">
               <div class="c-workCard__contractWay -share">レベニューシェア</div>
            </div>
         </div>
      </template>

      <!-- 情報 -->
      <div class="c-workCard__infoItem">
         <div class="c-workCard__infoItemHead">締め切り日：</div>
         <span class="c-workCard__endDate">{{ work.end_date }}</span>
      </div>
   </a>
</template>

<script>
export default {
   props: ['work', 'publicPath'],
   filters: {
      // 単発案件の金額にカンマをつけるためのフィルター
      addComma(value) {
         return value.toLocaleString();
      }
   }
};
</script>
