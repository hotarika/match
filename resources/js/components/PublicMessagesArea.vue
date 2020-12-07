<template>
   <section id="pub-msg" class="c-h2__sec">
      <h2 class="c-h2__head">パブリックメッセージ</h2>
      <div class="c-h2__oneRowBody p-workDetail__pubMsgBody">
         <!-- フォーム -->
         <form class="p-workDetail__createMsgForm" action="">
            <input
               class="c-form__input p-workDetail__createMsgTitle"
               type="text"
               placeholder="必須：新規質問内容のタイトルを記述"
               v-model="parentTitle"
            />
            <textarea
               class="c-form__textarea p-workDetail__createMsgTextarea"
               name="message"
               id="message"
               cols="30"
               rows="10"
               placeholder="必須：新規質問の内容を記述"
               v-model="parentTextarea"
            ></textarea>
            <button
               class="c-btn c-msgSendBtn p-workDetail__parentBtn"
               type="submit"
               @click.prevent="addParentMsg"
            >
               <i class="far fa-arrow-alt-circle-up"></i>送信
            </button>
         </form>

         <transition-group>
            <!-- メッセージボード -->
            <div
               class="p-workDetail__parentWrap"
               v-for="p in parentMessages"
               :key="p.pm_id"
            >
               <time class="p-workDetail__parentDate">{{
                  p.pm_created_at | formatDateTime
               }}</time>
               <div class="p-workDetail__parentMsgWrap">
                  <img
                     class="c-img p-workDetail__parentImg"
                     :src="publicPath + 'storage/user_img/' + p.u_image"
                     alt="ユーザーのアイコン"
                  />
                  <!-- 親掲示板 -->
                  <div class="p-workDetail__parentRight">
                     <a
                        class="c-link p-workDetail__parentName -workOwner"
                        href="profile"
                        >{{ p.u_name }}</a
                     >
                     <div class="p-workDetail__parentTitle">
                        {{ p.pm_title }}
                     </div>
                     <p class="p-workDetail__parentContent">
                        {{ p.pm_content }}
                     </p>

                     <!-- 子掲示板 -->
                     <template v-for="c in childMessages">
                        <template
                           v-if="
                              p.pm_id === c.parent_id && p.w_id === c.work_id
                           "
                        >
                           <div class="p-workDetail__childWrap" :key="c.cm_id">
                              <time class="p-workDetail__childDate">{{
                                 c.cm_created_at | formatDateTime
                              }}</time>
                              <img
                                 class="c-img p-workDetail__childImg"
                                 :src="
                                    publicPath + 'storage/user_img/' + c.u_image
                                 "
                                 alt="ユーザーのアイコン"
                              />
                              <div class="p-workDetail__childRight">
                                 <a
                                    class="c-link p-workDetail__childName -workOwner"
                                    src="profile"
                                    >{{ c.u_name }}</a
                                 >
                                 <p class="p-workDetail__childContent">
                                    {{ c.cm_content }}
                                 </p>
                              </div>
                           </div>
                        </template>
                     </template>

                     <!-- 子フォーム -->
                     <public-messages-child-form-component
                        @child-text="addChildMsg"
                        :parent="p.pm_id"
                     ></public-messages-child-form-component>
                  </div>
               </div>
            </div>
         </transition-group>
      </div>
   </section>
</template>

<script>
import axios from 'axios';
// import { getTemporaryId } from '../modules/getTemporaryId';
import { getDateTimeNewFormat } from '../modules/getDateTimeNewFormat';

export default {
   props: {
      publicPath: String,
      workId: Number,
      user: Object,
      parentMsg: Array,
      childMsg: Array
   },
   data() {
      return {
         parentMessages: this.parentMsg,
         childMessages: this.childMsg,
         parentTitle: '',
         parentTextarea: '',
         childTextarea: ''
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

         if (confirm('送信してもよろしいですか？')) {
            // メッセージ挿入（表示用のため、このデータはDBには保存されません）
            // 親要素を投稿した後にリロードせずに連続で子要素に投稿すると不具合が出るため、一番最下部でリロードしており、jsの動きは必要ないかもしれないが、少しだけでも投稿した雰囲気が出るため一応下記の通り定義している
            this.parentMessages.unshift({
               pm_id: this.parentMessages.length + 1, // keyの重複を避けるため、一時的にidを生成
               u_name: this.user.name,
               w_id: this.workId,
               u_id: this.user.id,
               u_image: this.user.image,
               pm_title: this.parentTitle,
               pm_content: this.parentTextarea,
               pm_created_at: getDateTimeNewFormat(date)
            });

            // DBへ保存
            axios
               .post(this.publicPath + 'pubmsgs', {
                  work_id: this.workId,
                  user_id: this.user.id,
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
               u_name: this.user.name,
               u_image: this.user.image,
               cm_created_at: getDateTimeNewFormat(date)
            });

            // DBへ挿入
            axios
               .post(this.publicPath + 'child-pubmsgs', {
                  parent_id: refs[1],
                  user_id: this.user.id,
                  content: text
               })
               .then(res => {
                  console.log(res);
               });

            // 親テーブルの更新日時（updated_at）を更新
            // 挿入する更新日時は、LaravelのController側で定義しているので、ここでは挿入するデータは何も指定していない
            axios
               .put(this.publicPath + 'pubmsgs/' + this.parentMessages[0].pm_id)
               .then(res => {
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
   filters: {
      formatDateTime(value) {
         const date = new Date(value);
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
