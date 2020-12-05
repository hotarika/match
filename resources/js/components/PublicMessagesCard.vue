<template>
   <a class="c-card c-msgCard" :href="publicPath + 'works/' + msgCard.w_id + '#pub-msg'">
      <div class=" c-pubMsgCard__infoWrap">
         <div class="c-pubMsgCard__basicInfo">{{ msgCard.u_name }} / {{ msgCard.w_name }}</div>
         <time class="c-pubMsgCard__msgTime">
            {{ msgCard.pm_updated_at }}
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
export default {
   props: {
      msgCard: Object,
      publicPath: String
   },
   computed: {
      create() {
         if (this.msgCard.cm_latest_content) {
            return this.msgCard.cm_latest_content;
         } else {
            return this.msgCard.pm_content;
         }
      }
   }
};
</script>
