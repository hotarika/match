<template>
   <a
      class="c-card c-msgCard c-dmMsgCard__msgItem"
      :class="{ '-myWork': authId === card.orderer_id }"
      :href="publicPath + 'dm-contents/' + card.board_id"
   >
      <img
         class="c-img c-dmMsgCard__userImg"
         :src="imageDivide"
         alt="ユーザーの画像"
      />
      <div class="c-dmMsgCard__mainAreaWrap">
         <div class="c-dmMsgCard__infoWrap">
            <div class="c-dmMsgCard__basicInfo">
               {{ nameDivide }} / {{ card.w_name }}
            </div>
            <time class="c-dmMsgCard__time">{{
               card.latest_date | formatDateTime
            }}</time>
         </div>
         <div class="c-dmMsgCard__dm">
            {{ card.latest_content }}
         </div>
      </div>
   </a>
</template>

<script>
import { getDateTimeNewFormat } from '../modules/getDateTimeNewFormat';

export default {
   props: {
      publicPath: String,
      card: Object,
      authId: Number
   },
   computed: {
      imageDivide() {
         if (this.authId === this.card.orderer_id) {
            return (
               this.publicPath + 'storage/user_img/' + this.card.applicant_image
            );
         } else {
            return (
               this.publicPath + 'storage/user_img/' + this.card.orderer_image
            );
         }
      },
      nameDivide() {
         if (this.authId === this.card.orderer_id) {
            return this.card.applicant_name;
         } else {
            return this.card.orderer_name;
         }
      }
   },
   filters: {
      formatDateTime(value) {
         const date = new Date(value);
         const newFormat = getDateTimeNewFormat(date);
         return newFormat;
      }
   }
};
</script>
