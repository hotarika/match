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
            <button class="c-btn c-msgSendBtn p-workDetail__parentBtn" type="submit" @click.prevent="addParentMsg">
               <i class="far fa-arrow-alt-circle-up"></i>送信
            </button>
         </form>

         <transition-group>
            <!-- メッセージボード -->
            <div class="p-workDetail__parentWrap" v-for="p in parentMsg" :key="p.id">
               <time class="p-workDetail__parentDate">{{ p.created_at }}</time>
               <div class="p-workDetail__parentMsgWrap">
                  <img
                     class="c-img p-workDetail__parentImg"
                     :src="public_path + 'storage/user_img/' + p.image"
                     alt="ユーザーのアイコン"
                  />
                  <!-- 親掲示板 -->
                  <div class="p-workDetail__parentRight">
                     <a class="c-link p-workDetail__parentName -workOwner" href="profile">{{ p.name }}</a>
                     <div class="p-workDetail__parentTitle">{{ p.title }}</div>
                     <p class="p-workDetail__parentContent">
                        {{ p.content }}
                     </p>

                     <!-- 子掲示板 -->
                     <template v-for="c in childMsg">
                        <template v-if="p.id === c.parent_id && p.work_id === c.work_id">
                           <div class="p-workDetail__childWrap" :key="c.id">
                              <time class="p-workDetail__childDate">{{ c.created_at }}</time>
                              <img
                                 class="c-img p-workDetail__childImg"
                                 :src="public_path + 'storage/user_img/' + c.image"
                                 alt="ユーザーのアイコン"
                              />
                              <div class="p-workDetail__childRight">
                                 <a class="c-link p-workDetail__childName -workOwner" src="profile">{{ c.name }}</a>
                                 <p class="p-workDetail__childContent">
                                    {{ c.content }}
                                 </p>
                              </div>
                           </div>
                        </template>
                     </template>

                     <!-- 子フォーム -->
                     <child-form-component @child-text="addChildMsg" :parent="p.id"></child-form-component>
                  </div>
               </div>
            </div>
         </transition-group>
      </div>
   </section>
</template>

<script>
const axios = require('axios');

export default {
   props: ['work_id', 'user', 'parent_msg', 'child_msg', 'public_path'],
   data() {
      return {
         parentMsg: this.parent_msg,
         childMsg: this.child_msg,
         parentTitle: '',
         parentTextarea: '',
         childTextarea: ''
      };
   },
   methods: {
      addParentMsg() {
         // 親テキストエリアが空欄の場合
         if (!this.parentTitle.trim('') || !this.parentTextarea.trim('')) {
            alert('タイトルまたはメッセージが空欄です');
            return;
         }

         if (confirm('送信してもよろしいですか？')) {
            axios //store
               .post(this.public_path + 'pubmsg', {
                  work_id: this.work_id,
                  user_id: this.user.id,
                  title: this.parentTitle,
                  content: this.parentTextarea
               })
               .then(res => {
                  console.log(res);
               });

            // 今日の日付
            var date = new Date();
            const today = date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate();

            // // メッセージの挿入
            this.parentMsg.unshift({
               id: this.parentMsg.length + 1,
               name: this.user.name,
               work_id: this.work_id,
               user_id: this.user.id,
               image: this.user.image,
               title: this.parentTitle,
               content: this.parentTextarea,
               created_at: today
            });

            // 挿入後に、メッセージを空にする
            this.parentTitle = '';
            this.parentTextarea = '';
         }
      },
      addChildMsg(...refs) {
         const text = refs[0].childMessage.value;

         // テキストエリアが空欄の場合
         if (!text.trim('')) {
            alert('メッセージが空欄です');
            return;
         }

         if (confirm('送信してもよろしいですか？')) {
            axios //store
               .post(this.public_path + 'child', {
                  parent_id: refs[1],
                  user_id: this.user.id,
                  content: text
               })
               .then(res => {
                  console.log(res);
               });

            // 今日の日付
            var date = new Date();
            const today = date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate();

            // メッセージの挿入
            this.childMsg.push({
               user_id: this.user.id,
               parent_id: refs[1],
               content: text,
               name: this.user.name,
               image: this.user.image,
               created_at: today
            });

            // 挿入後に、メッセージを空にする
            const textarea = document.getElementsByClassName('js-childTextarea');
            Array.prototype.forEach.call(textarea, function(el) {
               el.value = '';
            });
         }
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
