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
                     <a class="c-link p-mypage__notificationName" href="profile">
                        応募者：{{ notification.data['order_user_name'] }}</a
                     >
                     <time class="p-mypage__notificationTime">{{ notification.created_at }}</time>
                  </div>
                  <div class="p-mypage__notificationItemLower">
                     <p class="p-mypage__notificationMsg">
                        {{ notification.data['content'] }}
                     </p>
                  </div>
               </div>

               <!-- 削除ボタン -->
               <button
                  class="c-btn p-mypage__notificationDelBtn"
                  type="submit"
                  @click.prevent="remove(index, notification.id)"
               >
                  <i class="fas fa-trash-alt"></i>
               </button>
            </div>
         </transition-group>

         <button class="c-btn p-mypage__notificationSeeMore" @click.prevent="openNotifications" v-if="remainNum >= 1">
            残り{{ remainNum }}件を全て表示する
         </button>
         <div class="c-h2__noItems" v-if="allData === null">
            現在、新着通知はありません
         </div>
      </div>
   </section>
</template>

<script>
const axios = require('axios');

export default {
   props: {
      notification: {
         type: Array,
         default: () => []
      },
      public_path: String
   },
   data() {
      return {
         displayItems: [], // 実際に表示している通知
         displayItemsNum: 5, // 表示数
         removeNum: 0, // 「全てを表示」ボタンに利用
         allData: this.notification
      };
   },
   methods: {
      remove(index, id) {
         // 「残りxx件を全て表示する」に使用
         this.removeNum++;

         // 通知の削除
         this.displayItems.splice(index, 1);

         // 削除した場合に、表示されていない通知を表示（push）
         if (this.remainNum >= 0) {
            this.displayItems.push(this.notification[this.displayItemsNum]);
         }

         // 通知を既読（notificationsテーブルのread_atカラム）
         const today = new Date();
         axios
            .put(this.public_path + 'notification/' + id, { read_at: today.toLocaleString() })
            .then(res => {
               console.log(res);
            })
            .catch(err => {
               console.log('err:', err);
            });
      },
      // 通知件数全て表示
      openNotifications() {
         this.displayItemsNum = this.notification.length; // 全件数を表示数変数に格納

         // 全て表示
         for (let i = 0; i < this.displayItemsNum; i++) {
            this.displayItems[i] = this.allData[i];
         }
      }
   },
   computed: {
      remainNum: function() {
         //「残りxx件を全て表示する」に使用
         // 式：[全体の通知数 - 削除した通知数 - 表示している通知数 = 残りの表示されていない通知数]
         if (this.notification !== null) {
            return this.notification.length - this.removeNum - this.displayItemsNum;
         }
         return null;
      }
   },
   mounted() {
      if (this.allData !== null) {
         const showData = []; // 表示するためのデータ配列を作成
         const forNum = this.allData >= this.displayNum ? this.displayNum : this.allData.length;

         // 表示する5件を絞り込み
         for (let i = 0; i < forNum; i++) {
            showData[i] = this.allData[i];
         }

         // vueデータに、上記で取り出したデータ（showData）をreturn
         // 上記のforで直接displayItemsに格納できず、filterを通さないと表示されない（ようです）
         this.displayItems = showData.filter(val => {
            return val;
         });
      }
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
