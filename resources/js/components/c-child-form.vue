<template>
   <!-- 子フォーム -->
   <form class="p-workDetail__childForm" action="">
      <textarea
         class="c-form__textarea p-workDetail__childTextarea js-childTextarea"
         name="message"
         id="message"
         cols="30"
         rows="2"
         placeholder="必須：メッセージの内容を入力"
         ref="childMessage"
      ></textarea>
      <button class="c-btn c-msgSendBtn p-workDetail__childBtn" type="submit" @click.prevent="childTextHandler">
         <i class="far fa-arrow-alt-circle-up"></i>送信
      </button>
   </form>
</template>

<script>
export default {
   props: ['parent'],
   methods: {
      childTextHandler() {
         this.$emit('child-text', this.$refs, this.parent);
      }
   }
};
</script>
