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
   filters: {
      formatDateTime(value) {
         const date = new Date(value.replace(/-/g, '/')); // safari対策の正規表現
         const newFormat = getDateTimeNewFormat(date);
         return newFormat;
      }
   }
};
</script>
