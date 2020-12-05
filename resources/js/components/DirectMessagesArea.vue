<template>
   <section class="c-h2__sec p-dm__h2sec">
      <div class="c-h2__head p-dm__h2">
         <template v-if="info.owner_user_id === userId">
            <img :src="publicPath + 'storage/user_img/' + info.owner_img" alt="ユーザーの画像" />
         </template>
         <template v-else>
            <img :src="publicPath + 'storage/user_img/' + info.order_img" alt="ユーザーの画像" />
         </template>
         <div class="p-dm__h2InfoWrap">
            <div class="p-dm__h2InfoName">
               <template v-if="info.owner_user_id === userId">
                  {{ info.order_user_name }}
               </template>
               <template v-else>
                  {{ info.owner_user_name }}
               </template>
            </div>
            <div class="p-dm__h2InfoOrderName">
               {{ info.work_name }}
            </div>
         </div>
      </div>

      <div class="p-dm__msgSec">
         <div class="p-dm__msgArea js-scroll" data-scroll>
            <transition-group>
               <div v-for="msg in contents" :key="msg.contents_id">
                  <!-- 自分ののメッセージ -->
                  <div class="p-dm__msgMe" v-if="msg.user_id === userId" :key="msg.id">
                     {{ msg.content }}
                     <time>{{ msg.time }}</time>
                  </div>
                  <!-- 相手のメッセージ -->
                  <div class="p-dm__msgYou" v-else :key="msg.id">
                     {{ msg.content }}
                     <time>{{ msg.time }}</time>
                  </div>
               </div>
            </transition-group>
         </div>
         <!-- フォーム -->
         <form id="" class="p-dm__form" action="">
            <textarea
               class="c-form__textarea"
               name="message"
               id="message"
               cols="80"
               rows="6"
               placeholder="ここにメッセージを入力"
               v-model="textarea"
            />
            <button class="c-btn c-msgSendBtn p-dm__sendBtn" type="submit" @click.prevent="addMsg">
               <i class="far fa-arrow-alt-circle-up"></i>送信
            </button>
         </form>
      </div>
   </section>
</template>

<script>
const axios = require('axios');

export default {
   props: {
      publicPath: String,
      contents: Array,
      userId: Number,
      info: Object
   },
   data() {
      return {
         textarea: '',
         conts: this.contents
      };
   },
   methods: {
      addMsg() {
         // テキストエリアが空欄の場合
         if (!this.textarea.trim('')) {
            alert('メッセージが空欄です');
            return;
         }

         // 今日の日付
         var date = new Date();
         const today = date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate();

         // メッセージの送信
         if (confirm('送信してもよろしいですか？')) {
            this.conts.push({
               board_id: this.conts.length + 1,
               contents_id: this.conts.length + 1,
               user_id: this.userId,
               content: this.textarea,
               created_at: today
            });

            axios //store
               .post(this.publicPath + 'dm', {
                  board_id: this.info.board_id,
                  user_id: this.userId,
                  content: this.textarea
               })
               .then(res => {
                  console.log(res);
               });

            // 挿入後に、メッセージを空にする
            this.textarea = '';
         }
      }
   },
   mounted() {
      // マウント時に、スクロールバーを一番下に移動させる
      var obj = document.querySelector('.js-scroll');
      obj.scrollTop = obj.scrollHeight;
   },
   updated() {
      // メッセージ送信時に、スクロールバーを一番下に移動させる
      var obj = document.querySelector('.js-scroll');
      obj.scrollTop = obj.scrollHeight;
   }
};
</script>

<style scoped>
.v-enter {
   opacity: 0;
}
.v-enter-active {
   transition: all 0.3s ease-out;
}
.v-move {
   transition: all 0.3s;
}
</style>
