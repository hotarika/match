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
         <div class="p-dm__msgArea js-scroll">
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
               class="c-form__textarea p-dm__textarea"
               :class="{ 'is-error': textarea.length > textareaLimitNumber }"
               name="message"
               id="message"
               cols="80"
               rows="6"
               :placeholder="textareaPlaceholder"
               v-model="textarea"
            />
            <span
               class="c-form__invalid"
               v-if="textarea.length > textareaLimitNumber"
               role="alert"
            >
               <strong
                  >{{ textareaLimitNumber }}文字以内で入力してください。</strong
               >
            </span>

            <button
               class="c-btn c-msgSendBtn p-dm__sendBtn"
               :class="{ 'is-error': textarea.length > textareaLimitNumber }"
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
         conts: this.contents,
         textareaLimitNumber: 3000
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

         // 文字数制限以上だった場合
         if (this.textarea.length > this.textareaLimitNumber) {
            alert(this.textareaLimitNumber + '文字以内で入力してください。');
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
            if (this.info.applicant_image === null) {
               return this.publicPath + 'images/no-image.png';
            } else {
               return (
                  this.publicPath +
                  'storage/user_img/' +
                  this.info.applicant_image
               );
            }
         } else {
            if (this.info.orderer_image === null) {
               return this.publicPath + 'images/no-image.png';
            } else {
               return (
                  this.publicPath +
                  'storage/user_img/' +
                  this.info.orderer_image
               );
            }
         }
      },
      // 相手のユーザー情報を表示
      divideNames() {
         if (this.authId === this.info.orderer_id) {
            return this.info.applicant_name;
         } else {
            return this.info.orderer_name;
         }
      },
      textareaPlaceholder() {
         return (
            'ここにメッセージを入力（' + this.textareaLimitNumber + '文字以内）'
         );
      }
   },
   filters: {
      // 日付のフォーマット
      formatDateTime(value) {
         const date = new Date(value.replace(/-/g, '/')); // safari対策の正規表現
         const newFormat = getDateTimeNewFormat(date);
         return newFormat;
      }
   },
   mounted() {
      // マウント時に、スクロールバーを一番下に移動させる
      const obj = document.querySelector('.js-scroll');
      obj.scrollTop = obj.scrollHeight;
   },
   updated() {
      // メッセージ送信時に、スクロールバーを一番下に移動させる
      const obj = document.querySelector('.js-scroll');
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
