<template>
   <!-- お気に入りボタン -->
   <div class="p-workDetail__favBtn">
      <i class="fas fa-star p-workDetail__favBtnIcon -true" v-show="this.isActive" @click="favToggle"></i>
      <i class="fas fa-star p-workDetail__favBtnIcon -false" v-show="!this.isActive" @click="favToggle"></i>
   </div>
</template>

<script>
export default {
   data() {
      return {
         isActive: false
      };
   },
   methods: {
      favToggle() {
         this.isActive = !this.isActive;
      }
   }
};
</script>
