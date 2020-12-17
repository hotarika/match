<template>
   <a
      class="c-card c-msgCard c-pubMsgCard"
      :class="{ '-myWork': authId === msgCard.orderer_id }"
      :href="publicPath + 'works/' + msgCard.w_id + '#pub-msg'"
   >
      <div class=" c-pubMsgCard__infoWrap">
         <div class="c-pubMsgCard__basicInfo">
            {{ msgCard.orderer_name }} / {{ msgCard.w_name }}
         </div>
         <time class="c-pubMsgCard__msgTime">
            {{ msgCard.pm_updated_at | formatDateTime }}
         </time>
      </div>

      <div class="c-pubMsgCard__msgWrap">
         <div class="c-pubMsgCard__msgTitle">
            {{ msgCard.pm_title }}
         </div>
         <!-- メッセージ / 子メッセージに最新のものがあれば、子メッセージを表示 -->
         <div class="c-pubMsgCard__pubMsg" v-if="msgCard.cm_latest_content">
            {{ msgCard.cm_latest_content }}
         </div>
         <div class="c-pubMsgCard__pubMsg" v-else>
            {{ msgCard.pm_content }}
         </div>
      </div>

      <span
         class="c-badge -public"
         :class="{ '-over': msgCard.badge >= 100 }"
         v-if="msgCard.badge > 0"
         >{{ showBadge }}</span
      >
   </a>
</template>

<script>
import { getDateTimeNewFormat } from '../modules/getDateTimeNewFormat';

export default {
   props: {
      msgCard: Object,
      publicPath: String,
      authId: Number
   },
   computed: {
      showBadge() {
         if (this.msgCard.badge >= 100) {
            return '99+';
         } else {
            return this.msgCard.badge;
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
