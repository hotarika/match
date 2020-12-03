<template>
   <!-- お気に入りボタン -->
   <div class="p-workDetail__favBtn">
      <i
         class="fas fa-star p-workDetail__favBtnIcon"
         :class="[isActive === true ? '-true' : '-false']"
         @click="favToggle"
      ></i>
   </div>
</template>

<script>
const axios = require('axios');

export default {
   props: {
      publicPath: String,
      userId: Number,
      workId: Number
   },
   data() {
      return {
         isActive: false
      };
   },
   methods: {
      favToggle() {
         // お気に入りマークの色を切り替え
         this.isActive = !this.isActive;

         if (this.isActive) {
            // 保存
            axios
               .post(this.publicPath + 'favorites', {
                  user_id: this.userId,
                  work_id: this.workId
               })
               .then(res => {
                  console.log(res);
               })
               .catch(err => {
                  console.log(err);
               });
         } else {
            // 削除
            axios
               .delete(this.publicPath + 'favorites/' + this.userId + '/' + this.workId)
               .then(res => {
                  console.log(res);
               })
               .catch(err => {
                  console.log(err);
               });
         }
      }
   },
   mounted() {
      axios
         .get(this.publicPath + 'favorites')
         .then(res => {
            // お気に入りの仕事かどうか判別
            res.data.filter(val => {
               if (this.workId === val.work_id) {
                  return (this.isActive = true);
               }
            });
         })
         .catch(err => {
            console.log(err);
         });
   }
};
</script>
