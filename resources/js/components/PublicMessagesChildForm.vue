<template>
   <!-- 子フォーム -->
   <form class="p-pubmsg__childForm" action="">
      <textarea
         class="c-form__textarea p-pubmsg__childTextarea js-childTextarea"
         :class="{
            'is-error': textarea.length > textareaLimitNumber
         }"
         name="message"
         id="message"
         cols="30"
         rows="2"
         :placeholder="textareaPlaceholder"
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
         :class="{
            'is-error': textarea.length > textareaLimitNumber
         }"
         type="submit"
         @click.prevent="childTextHandler"
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
      textareaPlaceholder() {
         return (
            '必須：メッセージの内容を入力（' +
            this.textareaLimitNumber +
            '文字以内）'
         );
      }
   },
   methods: {
      childTextHandler() {
         // 親テキストエリアの文字数制限
         if (this.textarea.length > this.textareaLimitNumber) {
            alert(
               'メッセージは、' +
                  this.textareaLimitNumber +
                  '文字以内で入力してください。'
            );
            return;
         }

         this.$emit('child-text', this.$refs, this.parent);
      }
   }
};
</script>
