<template>
   <div class="p-profileEdit__imgWrap">
      <div
         class="p-profileEdit__imgDragArea"
         :class="{ 'js-img-over': style_over, 'js-img-leave': style_learve }"
         @dragover.prevent.stop="changeStyle($event, true)"
         @dragleave.prevent.stop="changeStyle($event, false)"
         @drop.prevent="uploadFile($event)"
      >
         <label for="upload_image" class="c-btn p-profileEdit__imgLabel">
            <input
               id="upload_image"
               class="p-profileEdit__imgInput"
               type="file"
               name="image"
               @change="uploadFile($event)"
               accept="image/*"
            />

            <!-- 画像の切り替え -->
            <img
               class="c-img p-profileEdit__img"
               :src="showImage(userImage)"
               v-if="preview === ''"
            />
            <img class="c-img p-profileEdit__img" :src="preview" v-else />
         </label>
      </div>
      <!-- PC用 -->
      <small class="p-profileEdit__imgEditCaption" v-if="device === 'PC'"
         >ドラッグ&amp;ドロップまたはクリックで変更</small
      >
      <!-- firefox用 -->
      <small
         class="p-profileEdit__imgEditCaption -firefox"
         v-if="device === 'PC'"
         >ドラッグ&amp;ドロップで変更</small
      >
      <!-- スマートフォン用 -->
      <small
         class="p-profileEdit__imgEditCaption -sp"
         v-if="device === 'Mobile'"
         >タッチで変更</small
      >
      <small class="p-profileEdit__imgEditCaption -mimes"
         >画像の形式は、jpeg, png, gif, svg の<br />いずれかを指定してください（サイズ1MBまで）</small
      >
   </div>
</template>

<script>
export default {
   props: {
      publicPath: String,
      userImage: String
   },
   data() {
      return {
         preview: '', // 画像を表示
         style_over: false, // 画像をオーバーさせたときのボーダーのスタイル
         style_learve: true, // 画像が離れたときのボーダーのスタイル
         device: '' // PCとスマートデバイスで画像説明を変える
      };
   },
   methods: {
      uploadFile(e) {
         // ドラッグ&ドロップのスタイル
         this.style_over = false;
         this.style_learve = true;

         // ファイル（target = クリックした場合, dataTransfer = ドラッグした場合）
         const files = e.target.files ? e.target.files : e.dataTransfer.files;
         const file = files[0];
         document.getElementById('upload_image').files = files; // inputタグに格納

         if (!file.type.includes('image/')) {
            alert('画像ファイルを選択してください');
            return;
         }
         if (file.type.includes('image/heic')) {
            alert(
               'HEICファイルはアップロードできません。\n jpeg,png,gif,svgのいずれかのファイルを選択してください。'
            );
            return;
         }

         if (typeof FileReader === 'function') {
            // ライブプレビュー
            const reader = new FileReader();
            reader.onload = e => {
               this.preview = e.target.result;
            };
            reader.readAsDataURL(file); // バイナリファイルの読み込み（Data URL 取得）
         } else {
            alert(
               'FileReaderがサポートされていません。最新のブラウザで再度試してください。'
            );
         }
      },
      changeStyle(e, flag) {
         if (flag) {
            // ボーダーを緑色にする
            this.style_over = true;
            this.style_learve = false;
            console.log('over');
         } else {
            // ボーダーを灰色にする
            this.style_over = false;
            this.style_learve = true;
            console.log('leave');
         }
      }
   },
   computed: {
      showImage() {
         // 画像が設定されていない場合デフォルトの画像を設定
         return function(image) {
            if (image === null) {
               return this.publicPath + 'images/no-image.png';
            } else {
               return this.publicPath + 'storage/user_img/' + image;
            }
         };
      }
   },
   mounted() {
      // 画像のメッセージをデバイス毎（スマホ・タブレットとPC）で切り替え
      if (
         navigator.userAgent.indexOf('iPhone') > 0 ||
         (navigator.userAgent.indexOf('Android') > 0 &&
            navigator.userAgent.indexOf('Mobile') > 0) ||
         navigator.userAgent.indexOf('iPad') > 0 ||
         navigator.userAgent.indexOf('Android') > 0
      ) {
         // スマホ
         console.log('スマホ・タブレット');
         this.device = 'Mobile';

         // 画像のまわりにあるドラッグ&ドロップ用のボーダーをスマホ・タブレット使用時に消す
         const target = document.querySelector('.js-img-leave');
         target.classList.remove('js-img-leave');
      } else {
         // PC
         console.log('PC');
         this.device = 'PC';
      }
   }
};
</script>

<style>
/* スマホ対応時に下記のスタイルを消したいため、<sytle scoped>で指定せず、グローバルスコープにしている */
.js-img-over {
   border: 3px dotted rgba(0, 200, 0, 0.7);
}
.js-img-leave {
   border: 3px dotted gray;
}
</style>
