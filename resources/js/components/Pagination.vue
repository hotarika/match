<template>
   <div class="c-pagination">
      <a
         :href="`?page=${prevPage}`"
         class="c-btn c-pagination__btn"
         :class="{ '-disabled': page === 1 }"
         ref="prev"
         @click.prevent="onPrev"
         v-if="totalPage > 0"
         >&lt; 前へ</a
      >

      <div class="c-pagination__total -total" ref="total" v-if="totalPage > 0">{{ currentPage }} / {{ totalPage }}</div>
      <a
         :href="`?page=${nextPage}`"
         class="c-btn c-pagination__btn"
         :class="{ '-disabled': totalPage === currentPage }"
         ref="next"
         v-if="totalPage > 0"
         @click.prevent="onNext"
         >次へ &gt;</a
      >
   </div>
</template>

<script>
export default {
   props: ['page', 'totalPage'],
   data() {
      return {
         currentPage: this.page,
         prevDisable: true,
         nextDisable: false
      };
   },
   computed: {
      prevPage() {
         return Math.max(this.currentPage - 1, 1);
      },
      nextPage() {
         return Math.min(this.currentPage + 1, this.totalPage);
      }
   },
   methods: {
      onPrev() {
         this.currentPage = this.prevPage;
         this.$emit('change', this.currentPage);
         return false;
      },
      onNext() {
         if (this.nextPage < 3) this.nextDisable = true;
         this.currentPage = this.nextPage;
         this.$emit('change', this.currentPage);
         return false;
      }
   },
   watch: {
      // this.pageを監視している。名前はdataと同じ名前にする。pageプロパティが変更されたら発火
      page: function() {
         this.currentPage = this.page;
      }
      // totalPage(val) {
      //    this.currentPage = val;
      // }
   }
};
</script>
