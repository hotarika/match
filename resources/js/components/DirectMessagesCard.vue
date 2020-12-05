<template>
   <a class="c-card c-msgCard c-dmMsgCard__msgItem" :href="publicPath + 'dm-contents/' + card.id">
      <img
         class="c-img c-dmMsgCard__userImg"
         :src="publicPath + 'storage/user_img/' + card.image"
         alt="ユーザーの画像"
      />
      <div class="c-dmMsgCard__mainAreaWrap">
         <div class="c-dmMsgCard__infoWrap">
            <div class="c-dmMsgCard__basicInfo">{{ card.user_name }} / {{ card.work_name }}</div>
            <time class="c-dmMsgCard__time">{{ card.latest_date | formatDateTime }}</time>
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
      card: Object
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
