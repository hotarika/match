<template>
   <section id="pub-msg" class="c-h2__sec">
      <h2 class="c-h2__head">パブリックメッセージ</h2>
      <div class="c-h2__oneRowBody p-pubmsg__body">
         <!-- フォーム -->
         <template v-if="authUser !== null">
            <form class="p-pubmsg__createMsgForm" action="">
               <input
                  class="c-form__input p-pubmsg__createMsgTitle"
                  :class="{
                     'is-invalid': parentTitle.length > parentTitleLimitNumber
                  }"
                  type="text"
                  :placeholder="parentTitlePlaceholder"
                  v-model="parentTitle"
               />
               <span
                  class="c-form__invalid"
                  v-if="parentTitle.length > parentTitleLimitNumber"
                  role="alert"
               >
                  <strong
                     >{{
                        parentTitleLimitNumber
                     }}文字以内で入力してください。</strong
                  >
               </span>

               <textarea
                  class="c-form__textarea p-pubmsg__createMsgTextarea"
                  :class="{
                     'is-invalid':
                        parentTextarea.length > parentTextareaLimitNumber
                  }"
                  name="message"
                  id="message"
                  cols="30"
                  rows="10"
                  :placeholder="parentTextareaPlaceholder"
                  v-model="parentTextarea"
               ></textarea>
               <span
                  class="c-form__invalid"
                  v-if="parentTextarea.length > parentTextareaLimitNumber"
                  role="alert"
               >
                  <strong
                     >{{
                        parentTextareaLimitNumber
                     }}文字以内で入力してください。</strong
                  >
               </span>

               <button
                  class="c-btn c-msgSendBtn p-pubmsg__parentBtn"
                  :class="{
                     'is-invalid':
                        parentTextarea.length > parentTextareaLimitNumber
                  }"
                  type="submit"
                  @click.prevent="addParentMsg"
               >
                  <i class="far fa-arrow-alt-circle-up"></i>送信
               </button>
            </form>
         </template>

         <transition-group>
            <!-- メッセージボード -->
            <div
               class="p-pubmsg__parentWrap"
               v-for="p in parentMessages"
               :key="p.pm_id"
            >
               <time class="p-pubmsg__parentDate">{{
                  p.pm_created_at | formatDateTime
               }}</time>
               <div class="p-pubmsg__parentMsgWrap">
                  <img
                     class="c-img p-pubmsg__parentImg"
                     :src="showImage(p.u_image)"
                     alt="ユーザーのアイコン"
                  />
                  <!-- 親掲示板 -->
                  <div class="p-pubmsg__parentRight">
                     <a
                        class="c-link p-pubmsg__parentName -workOwner"
                        :href="publicPath + 'users/' + p.u_id"
                        >{{ p.u_name }}</a
                     >
                     <div class="p-pubmsg__parentTitle">
                        {{ p.pm_title }}
                     </div>
                     <pre class="p-pubmsg__parentContent">{{
                        p.pm_content
                     }}</pre>

                     <!-- 子掲示板 -->
                     <template v-for="c in childMessages">
                        <template
                           v-if="
                              p.pm_id === c.parent_id && p.w_id === c.work_id
                           "
                        >
                           <div class="p-pubmsg__childWrap" :key="c.cm_id">
                              <time class="p-pubmsg__childDate">{{
                                 c.cm_created_at | formatDateTime
                              }}</time>
                              <img
                                 class="c-img p-pubmsg__childImg"
                                 :src="showImage(c.u_image)"
                                 alt="ユーザーのアイコン"
                              />
                              <div class="p-pubmsg__childRight">
                                 <a
                                    class="c-link p-pubmsg__childName -workOwner"
                                    :href="publicPath + 'users/' + c.u_id"
                                    >{{ c.u_name }}</a
                                 >
                                 <pre class="p-pubmsg__childContent">{{
                                    c.cm_content
                                 }}</pre>
                              </div>
                           </div>
                        </template>
                     </template>

                     <!-- 子フォーム -->
                     <template v-if="authUser !== null">
                        <public-messages-child-form-component
                           @child-text="addChildMsg"
                           :parent="p.pm_id"
                        ></public-messages-child-form-component>
                     </template>
                  </div>
               </div>
            </div>
         </transition-group>
      </div>
   </section>
</template>

<script>
import axios from 'axios';
import { getTemporaryId } from '../modules/getTemporaryId';
import { getDateTimeNewFormat } from '../modules/getDateTimeNewFormat';

export default {
   props: {
      publicPath: String,
      workId: Number,
      ordererId: Number,
      authUser: Object,
      parentMsg: Array,
      childMsg: Array
   },
   data() {
      return {
         parentMessages: this.parentMsg,
         childMessages: this.childMsg,
         parentTitle: '',
         parentTextarea: '',
         childTextarea: '',
         parentTitleLimitNumber: 40, // 40文字以内
         parentTextareaLimitNumber: 3000 // 3000文字以内
      };
   },
   methods: {
      addParentMsg() {
         const date = new Date();

         // 親テキストエリアが空欄の場合
         if (!this.parentTitle.trim('') || !this.parentTextarea.trim('')) {
            alert('タイトルまたはメッセージが空欄です');
            return;
         }
         // 親メッセージタイトルの文字数制限
         if (this.parentTitle.length > this.parentTitleLimitNumber) {
            alert(
               'タイトルは、' +
                  this.parentTitleLimitNumber +
                  '文字以内で入力してください。'
            );
            return;
         }

         // 親テキストエリアの文字数制限
         if (this.parentTextarea.length > this.parentTextareaLimitNumber) {
            alert(
               '新規質問内容は、' +
                  this.parentTextareaLimitNumber +
                  '文字以内で入力してください。'
            );
            return;
         }

         if (confirm('送信してもよろしいですか？')) {
            // メッセージ挿入（表示用のため、このデータはDBには保存されません）
            // 親要素を投稿した後にリロードせずに連続で子要素に投稿すると不具合が出るため、一番最下部でリロードしており、jsの動きは必要ないかもしれないが、少しだけでも投稿した雰囲気が出るため一応下記の通り定義している
            this.parentMessages.unshift({
               pm_id: getTemporaryId(date), // keyの重複を避けるため、一時的にidを生成
               u_name: this.authUser.name,
               w_id: this.workId,
               u_id: this.authUser.id,
               u_image: this.authUser.image,
               pm_title: this.parentTitle,
               pm_content: this.parentTextarea,
               pm_created_at: getDateTimeNewFormat(date)
            });

            // DBへ保存
            axios
               .post(this.publicPath + 'pubmsgs', {
                  work_id: this.workId,
                  user_id: this.authUser.id,
                  title: this.parentTitle,
                  content: this.parentTextarea
               })
               .then(res => {
                  console.log(res);
               });

            // 挿入後に、メッセージを空にする
            this.parentTitle = '';
            this.parentTextarea = '';

            // Vueで重複のidを避けるために一時的にidを生成しているが、今回作成した掲示板の性質上、親掲示板を作成した直後にリロードせずに子フォームからメッセージを送信（滅多にないが、そのような場合を想定）すると、子フォームは一時的に作成した親idをDBに送ってしまう
            // （jsには last insert id のような最後に挿入したidを取得することができず、もしaxiosで強引に最後のidを取得したとしても、他の親ボードがその隙に挿入されてしまえば正確なidを取得することが困難）
            // そのため一度リロードして、DBのデータを反映させた上で、子フォームからメッセージを送信すると正常にうまくいく。
            // そのため、下記の通り一度リロードを挟んでいる。
            location.reload();
         }
      },
      addChildMsg(...refs) {
         const text = refs[0].childMessage.value;
         const date = new Date();

         // テキストエリアが空欄の場合
         if (!text.trim('')) {
            alert('メッセージが空欄です');
            return;
         }

         if (confirm('送信してもよろしいですか？')) {
            // メッセージ挿入（表示用のため、このデータはDBには保存されません）
            this.childMessages.push({
               cm_id: this.childMessages.length + 1,
               parent_id: refs[1],
               cm_content: text,
               u_name: this.authUser.name,
               u_image: this.authUser.image,
               cm_created_at: getDateTimeNewFormat(date)
            });

            // DBへ挿入
            axios
               .post(this.publicPath + 'child-pubmsgs', {
                  parent_id: refs[1],
                  user_id: this.authUser.id,
                  content: text,
                  work_id: this.workId,
                  orderer_id: this.ordererId
               })
               .then(res => {
                  console.log(res);
               });

            // 親テーブルの更新日時（updated_at）を更新
            // 挿入する更新日時は、LaravelのController側で定義しているので、ここでは挿入するデータは何も指定していない
            axios.put(this.publicPath + 'pubmsgs/' + refs[1]).then(res => {
               console.log(res);
            });

            // 挿入後に、メッセージを空にする
            const textarea = document.getElementsByClassName(
               'js-childTextarea'
            );
            Array.prototype.forEach.call(textarea, function(el) {
               el.value = '';
            });
         }
      }
   },
   computed: {
      showImage() {
         // 画像が設定されていない場合デフォルトの画像を設定
         return function(image) {
            if (image) {
               return this.publicPath + 'storage/user_img/' + image;
            } else {
               return this.publicPath + 'images/no-image.png';
            }
         };
      },
      parentTitlePlaceholder() {
         return (
            '必須：新規質問内容のタイトルを記述（' +
            this.parentTitleLimitNumber +
            '文字以内）'
         );
      },
      parentTextareaPlaceholder() {
         return (
            '必須：新規質問の内容を記述（' +
            this.parentTextareaLimitNumber +
            '文字以内）'
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
