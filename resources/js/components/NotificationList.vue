<template>
   <section class="c-h2__sec">
      <h2 class="c-h2__head">新着通知</h2>

      <div class="c-h2__oneRowBody p-mypage__notificationBody">
         <!-- 通知 -->
         <transition-group>
            <div
               class="p-mypage__notificationItem"
               v-for="(notification, index) in displayItems"
               :key="notification.id"
            >
               <div class="p-mypage__notificationMsgSecWrap">
                  <div class="p-mypage__notificationItemUpper">
                     <a class="c-link p-mypage__notificationName" href="profile.html">{{ notification.name }}</a>
                     <time class="p-mypage__notificationTime">{{ notification.time }}</time>
                  </div>
                  <div class="p-mypage__notificationItemLower">
                     <p class="p-mypage__notificationMsg">
                        {{ notification.content }}
                     </p>
                  </div>
               </div>

               <!-- 削除ボタン -->
               <button class="c-btn p-mypage__notificationDelBtn" type="submit" @click.prevent="remove(index)">
                  <i class="fas fa-trash-alt"></i>
               </button>
            </div>
         </transition-group>

         <button class="c-btn p-mypage__notificationSeeMore" @click.prevent="openNotifications" v-if="remainNum >= 1">
            残り{{ remainNum }}件を全て表示する
         </button>

         <div class="c-h2__noItems" v-if="displayItems === []">
            現在、新着通知はありません
         </div>
      </div>
   </section>
</template>

<script>
import notifications from '../data/notificationData.json';

export default {
   data() {
      return {
         notifications, // 通知のデータを取得
         getId: Number, // 要素削除に利用
         displayItems: [], // 実際に表示している通知
         displayItemsNum: 5, // 表示数
         removeNum: 0 // 「全てを表示」ボタンに利用
      };
   },
   methods: {
      remove(index) {
         // 「残りxx件を全て表示する」に使用
         this.removeNum++;

         // 現在表示しているリストの最後のidを取得
         // もし現在表示している通知の最下部の通知idが現在のidと同じであれば、最下部の通知idを記述し、そうでなければ、新しい最下部の通知idを記述する（これは最下部の通知idを取得している）
         this.getId =
            this.notifications.slice(-1)[0].id === this.getId ? this.getId : this.displayItems.slice(-1)[0].id;
         console.log(this.getId);

         // 通知の削除
         this.displayItems.splice(index, 1);

         // 削除した場合に、表示されていない通知を表示する（push）
         for (let i = 0; i < this.notifications.length; i++) {
            // 最下部の通知idの次のidを取得（削除すると残りの表示されていない通知が表示される）
            if (this.notifications[i].id > this.getId) {
               this.displayItems.push(this.notifications[i]);
               return;
            }
         }
      },
      // 通知件数全て表示
      openNotifications() {
         this.displayItemsNum = this.notifications.length; // 全件数を表示数変数に格納
         const allData = Object.values(this.notifications); //データを取得
         const showData = []; // 表示するためのデータ配列を作成

         // 表示する通知idの取り出し
         for (let i = 0; i < this.displayItemsNum; i++) {
            showData[i] = allData[i].id;
         }

         // vueデータに、上記で取り出した通知をreturn
         this.displayItems = this.notifications.filter(val => {
            if (showData.includes(val.id)) {
               return val;
            }
         });
      }
   },
   computed: {
      remainNum: function() {
         //「残りxx件を全て表示する」に使用
         // 式：[全体の通知数 - 削除した通知数 - 表示している通知数 = 残りの表示されていない通知数]
         return this.notifications.length - this.removeNum - this.displayItemsNum;
      }
   },
   mounted() {
      const allData = Object.values(this.notifications); //データを取得
      const showData = []; // 表示するためのデータ配列を作成

      // 表示する通知idの取り出し
      for (let i = 0; i < this.displayItemsNum; i++) {
         showData[i] = allData[i].id;
      }

      // vueデータに、上記で取り出した通知をreturn
      this.displayItems = this.notifications.filter(val => {
         if (showData.includes(val.id)) {
            return val;
         }
      });
   }
};
</script>

<style scoped>
.v-leave {
   display: none;
}

.v-leave-to {
   display: none;
   opacity: 0;
}
.v-leave-active {
   position: absolute;
   transition: all 0.1s ease-out;
}
.v-move {
   transition: all 0.1s;
}
</style>
