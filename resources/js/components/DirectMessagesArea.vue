<template>
   <section class="c-h2__sec p-dm__h2sec">
      <div
         class="c-h2__head p-dm__h2"
         :class="{ '-myWork': authId === info.orderer_id }"
      >
         <img :src="divideImages" alt="ユーザーの画像" />
         <div class="p-dm__h2InfoWrap">
            <div class="p-dm__h2InfoName">{{ divideNames }}</div>
            <div class="p-dm__h2InfoOrderName">{{ info.w_name }}</div>
         </div>
      </div>

      <div class="p-dm__msgSec">
         <div class="p-dm__msgArea js-scroll" data-scroll>
            <transition-group>
               <template v-for="msg in contents">
                  <!-- メッセージ -->
                  <pre
                     :key="msg.content_id"
                     :class="{
                        'p-dm__msgMe': msg.user_id === authId,
                        'p-dm__msgYou': msg.user_id !== authId
                     }">{{ msg.content }}<time>{{ msg.created_at | formatDateTime }}</time></pre>
               </template>
            </transition-group>
         </div>

         <!-- フォーム -->
         <form
            class="p-dm__form"
            :class="{ '-myWork': authId === info.orderer_id }"
         >
            <textarea
               class="c-form__textarea"
               name="message"
               id="message"
               cols="80"
               rows="6"
               placeholder="ここにメッセージを入力"
               v-model="textarea"
            />
            <button
               class="c-btn c-msgSendBtn p-dm__sendBtn"
               type="submit"
               @click.prevent="addMessage"
            >
               <i class="far fa-arrow-alt-circle-up"></i>送信
            </button>
         </form>
      </div>
   </section>
</template>

<script>
import axios from 'axios';
import { getDateTimeNewFormat } from '../modules/getDateTimeNewFormat';
import { getTemporaryId } from '../modules/getTemporaryId';

export default {
   props: {
      publicPath: String,
      contents: Array,
      authId: Number,
      info: Object
   },
   data() {
      return {
         textarea: '',
         conts: this.contents
      };
   },
   methods: {
      addMessage() {
         const date = new Date();

         // テキストエリアが空欄の場合
         if (!this.textarea.trim('')) {
            alert('メッセージが空欄です');
            return;
         }

         // メッセージの送信
         if (confirm('送信してもよろしいですか？')) {
            // 画面表示用にメッセージ挿入（DBには保存していない）
            this.conts.push({
               content_id: getTemporaryId(date), // idの重複を防ぐため、一時的にid生成
               user_id: this.authId,
               content: this.textarea,
               created_at: getDateTimeNewFormat(date)
            });

            // DBへ保存
            axios
               .post(this.publicPath + 'dm-contents', {
                  board_id: this.info.board_id,
                  user_id: this.authId,
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
   computed: {
      // 相手のユーザー情報を表示
      divideImages() {
         if (this.authId === this.info.orderer_id) {
            return (
               this.publicPath + 'storage/user_img/' + this.info.applicant_image
            );
         } else {
            return (
               this.publicPath + 'storage/user_img/' + this.info.orderer_image
            );
         }
      },
      // 相手のユーザー情報を表示
      divideNames() {
         if (this.authId === this.info.orderer_id) {
            return this.info.applicant_name;
         } else {
            return this.info.orderer_name;
         }
      }
   },
   filters: {
      // 日付のフォーマット
      formatDateTime(value) {
         const date = new Date(value);
         const newFormat = getDateTimeNewFormat(date);
         return newFormat;
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
