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
            <div class="p-workDetail__parentWrap" v-for="p in parent" :key="p.id">
               <time class="p-workDetail__parentDate">{{ p.time }}</time>
               <div class="p-workDetail__parentMsgWrap">
                  <img
                     class="c-img p-workDetail__parentImg"
                     :src="require('../../images/img1.png').default"
                     alt="ユーザーのアイコン"
                  />
                  <!-- 親掲示板 -->
                  <div class="p-workDetail__parentRight">
                     <a class="c-link p-workDetail__parentName -workOwner" href="profile.html">{{ p.name }}</a>
                     <div class="p-workDetail__parentTitle">{{ p.title }}</div>
                     <p class="p-workDetail__parentContent">
                        {{ p.content }}
                     </p>

                     <!-- 子掲示板 -->
                     <template v-for="c in child">
                        <template v-if="p.id === c.parent_id">
                           <div class="p-workDetail__childWrap" :key="c.id">
                              <time class="p-workDetail__childDate">{{ c.time }}</time>
                              <img
                                 class="c-img p-workDetail__childImg"
                                 :src="require('../../images/img1.png').default"
                                 alt="ユーザーのアイコン"
                              />
                              <div class="p-workDetail__childRight">
                                 <a class="c-link p-workDetail__childName -workOwner" src="profile.html">{{
                                    c.name
                                 }}</a>
                                 <p class="p-workDetail__childContent">
                                    {{ c.content }}
                                 </p>
                              </div>
                           </div>
                        </template>
                     </template>

                     <!-- 子フォーム -->
                     <childform-component @child-text="addChildMsg"></childform-component>
                  </div>
               </div>
            </div>
         </transition-group>
      </div>
   </section>
</template>

<script>
import parent from '../data/pubMsg_parent.json';
import child from '../data/pubMsg_child.json';

export default {
   data() {
      return {
         parent,
         child,
         parentTitle: '',
         parentTextarea: ''
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
            // メッセージの挿入
            this.parent.unshift({
               id: 10,
               name: 'test-name',
               title: this.parentTitle,
               content: this.parentTextarea,
               time: '2020/11/18 10:11'
            });

            // 挿入後に、メッセージを空にする
            this.parentTitle = '';
            this.parentTextarea = '';
         }
      },
      addChildMsg(refs) {
         const text = refs.childMessage.value;

         // テキストエリアが空欄の場合
         if (!text.trim('')) {
            alert('メッセージが空欄です');
            return;
         }

         if (confirm('送信してもよろしいですか？')) {
            // メッセージの挿入
            this.child.push({
               id: 10,
               parent_id: 1,
               name: 'Child',
               content: text,
               time: '2020/11/18 10:11'
            });

            // 挿入後に、メッセージを空にする
            document.querySelector('.js-childTextarea').value = '';
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
