<template>
   <div class="c-pagination">
      <!-- 前へボタン -->
      <a
         :href="`?page=${prevPage}`"
         class="c-btn c-pagination__btn"
         :class="{ '-disabled': page === 1 }"
         ref="prev"
         @click.prevent="onPrev"
         v-if="totalPage > 0"
         >&lt; 前へ</a
      >

      <!-- ページ番号 -->
      <div class="c-pagination__total -total" ref="total" v-if="totalPage > 0">{{ currentPage }} / {{ totalPage }}</div>

      <!-- 次へボタン -->
      <a
         :href="`?page=${nextPage}`"
         class="c-btn c-pagination__btn"
         :class="{ '-disabled': totalPage === currentPage }"
         ref="next"
         @click.prevent="onNext"
         v-if="totalPage > 0"
         >次へ &gt;</a
      >
   </div>
</template>

<script>
export default {
   props: {
      page: Number,
      totalPage: Number
   },
   data() {
      return {
         currentPage: this.page,
         prevDisable: true,
         nextDisable: false
      };
   },
   computed: {
      // 現在のページの前のページ番号（前へボタン）
      prevPage() {
         return Math.max(this.currentPage - 1, 1);
      },
      // 現在のページの次のページ番号（次へボタン）
      nextPage() {
         return Math.min(this.currentPage + 1, this.totalPage);
      }
   },
   methods: {
      onPrev() {
         this.currentPage = this.prevPage;
         this.$emit('change', this.currentPage);
      },
      onNext() {
         this.currentPage = this.nextPage;
         this.$emit('change', this.currentPage);
      }
   },
   watch: {
      // this.currentPageを監視
      // propsに反映されても、dataに反映されない場合があるためwatchに記述
      page: function() {
         this.currentPage = this.page;
      }
   }
};
</script>
