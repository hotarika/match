<template>
   <!-- 子フォーム -->
   <form class="p-pubmsg__childForm" action="">
      <textarea
         class="c-form__textarea p-pubmsg__childTextarea js-childTextarea"
         name="message"
         id="message"
         cols="30"
         rows="2"
         placeholder="必須：メッセージの内容を入力（3000文字以内）"
         ref="childMessage"
         v-model="textarea"
      ></textarea>
      <span
         class="c-form__invalid"
         v-if="textarea.length > textareaLimitNumber"
         role="alert"
      >
         <strong>{{ textareaLimitNumber }}文字以内で入力してください。</strong>
      </span>

      <button
         class="c-btn c-msgSendBtn p-pubmsg__childBtn"
         type="submit"
         @click.prevent="childTextHandler"
         :disabled="disabledBtn"
      >
         <i class="far fa-arrow-alt-circle-up"></i>送信
      </button>
   </form>
</template>

<script>
export default {
   props: ['parent'],
   data() {
      return {
         textarea: '',
         textareaLimitNumber: 3000
      };
   },
   computed: {
      disabledBtn() {
         if (this.textarea.length > 3000) {
            return true;
         } else {
            return false;
         }
      }
   },
   methods: {
      childTextHandler() {
         this.$emit('child-text', this.$refs, this.parent);
      }
   }
};
</script>
