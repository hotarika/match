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
   props: ['public_path', 'work', 'user_id'],
   data() {
      return {
         isActive: false,
         favorites: []
      };
   },
   methods: {
      favToggle() {
         this.isActive = !this.isActive;

         console.log(this.user_id);
         console.log(this.work.work_id);

         if (this.isActive) {
            axios //store
               .post(this.public_path + 'async/favorites', {
                  user_id: this.user_id,
                  work_id: this.work.work_id
               });
         } else {
            axios //delete
               .delete(this.public_path + 'async/favorites/' + this.user_id + '/' + this.work.work_id);
            this.likeCount--;
         }
      }
   },
   mounted() {
      axios
         .get(this.public_path + 'async/favorites')
         .then(res => {
            this.favorites = res.data;
            this.favorites.filter(val => {
               if (this.work.work_id === val.work_id) {
                  console.log('yes');
                  return (this.isActive = true);
               }
            });
         })
         .catch(err => {
            console.log('err:', err);
         });
   }
};
</script>
