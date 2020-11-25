<template>
   <section class="c-h2__sec p-dm__h2sec">
      <div class="c-h2__head p-dm__h2">
         <img :src="'../../images/img1.png'" alt="ユーザーの画像" />
         <div class="p-dm__h2InfoWrap">
            <div class="p-dm__h2InfoName">
               山田太郎
            </div>
            <div class="p-dm__h2InfoOrderName">
               カーナビシステムを作成して欲しい
            </div>
         </div>
      </div>

      <div class="p-dm__msgSec">
         <div class="p-dm__msgArea js-scroll" data-scroll>
            <transition-group>
               <template v-for="msg in msgs">
                  <!-- 自分ののメッセージ -->
                  <div class="p-dm__msgMe" v-if="msg.user_id === 1" :key="msg.id">
                     {{ msg.content }}
                     <time>{{ msg.time }}</time>
                  </div>
                  <!-- 相手のメッセージ -->
                  <div class="p-dm__msgYou" v-if="msg.user_id === 2" :key="msg.id">
                     {{ msg.content }}
                     <time>{{ msg.time }}</time>
                  </div>
               </template>
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
               <!-- <img :src="require('../../images/icon/send.svg').default" alt="送信のアイコン" /> -->
               <i class="far fa-arrow-alt-circle-up"></i>送信
            </button>
         </form>
      </div>
   </section>
</template>

<script>
import msgs from '../data/dmData.json';

export default {
   data() {
      return {
         textarea: '',
         msgs
      };
   },
   methods: {
      addMsg() {
         // テキストエリアが空欄の場合
         if (!this.textarea.trim('')) {
            alert('メッセージが空欄です');
            return;
         }

         // メッセージの送信
         if (confirm('送信してもよろしいですか？')) {
            this.msgs.push({
               id: 10,
               user_id: 2,
               content: this.textarea,
               time: '2020/11/18 10:11'
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
