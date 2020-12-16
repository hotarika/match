<template>
   <a
      class="c-card c-msgCard c-dmMsgCard__msgItem"
      :class="{ '-myWork': authId === card.orderer_id }"
      :href="publicPath + 'dm-contents/' + card.board_id"
   >
      <img
         class="c-img c-dmMsgCard__userImg"
         :src="divideImages"
         alt="ユーザーの画像"
      />
      <div class="c-dmMsgCard__mainAreaWrap">
         <div class="c-dmMsgCard__infoWrap">
            <div class="c-dmMsgCard__basicInfo">
               {{ divideNames }} / {{ card.w_name }}
            </div>
            <time class="c-dmMsgCard__time">
               {{ card.latest_date | formatDateTime }}
            </time>
         </div>
         <div class="c-dmMsgCard__dm">
            {{ card.latest_content }}
         </div>
      </div>

      <span
         class="c-badge -direct"
         :class="{ '-over': card.badge >= 100 }"
         v-if="card.badge > 0"
         >{{ showBadge }}</span
      >
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
      divideImages() {
         // 相手側の情報を表示
         if (this.authId === this.card.orderer_id) {
            if (this.card.applicant_image === null) {
               return this.publicPath + 'images/no-image.png';
            } else {
               return (
                  this.publicPath +
                  'storage/user_img/' +
                  this.card.applicant_image
               );
            }
         } else {
            if (this.card.orderer_image === null) {
               return this.publicPath + 'images/no-image.png';
            } else {
               return (
                  this.publicPath +
                  'storage/user_img/' +
                  this.card.orderer_image
               );
            }
         }
      },
      divideNames() {
         // 相手側の情報を表示
         if (this.authId === this.card.orderer_id) {
            return this.card.applicant_name;
         } else {
            return this.card.orderer_name;
         }
      },
      showBadge() {
         if (this.card.badge >= 100) {
            return '99+';
         } else {
            return this.card.badge;
         }
      }
   },
   filters: {
      formatDateTime(value) {
         const date = new Date(value.replace(/-/g, '/')); // safari対策の正規表現
         const newFormat = getDateTimeNewFormat(date);
         return newFormat;
      }
   }
};
</script>
