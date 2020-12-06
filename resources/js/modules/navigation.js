// *************************************************
// スマホ用ナビメニューの開閉
//（Vueでは、「メニュー以外を押すと閉じる」機能が実装できないため、通常のjsで対応）
// *************************************************
window.addEventListener('DOMContentLoaded', () => {
   const open = document.querySelector('.js-openIcon');
   const close = document.querySelector('.js-closeIcon');
   const target = document.querySelector('.js-nav');

   // ①アイコンクリックでメニューバーを開く
   open.addEventListener('click', e => {
      // ③番目のコードでdocument.addEventListenerを指定しているため、イベントが伝播してしまう
      // そのため、stopPropagation()で伝播を停止させている
      e.stopPropagation();

      // .js-navにcalssのis-activeがなければ追加する
      if (!target.classList.contains('is-active')) {
         target.classList.add('is-active');
      }
   });

   // ②アイコンクリックでメニューバーを閉じる
   close.addEventListener('click', e => {
      // ①と同じ
      e.stopPropagation();

      // .js-navにcalssのis-activeがあれば削除する
      if (target.classList.contains('is-active')) {
         target.classList.remove('is-active');
      }
   });

   // ③ メニューバーの外側をクリックした場合に閉じる（Vueでの実装ができない）
   document.addEventListener('click', e => {
      // 外側をクリックした場合 && classにis-activeの文字列がない場合
      if (
         !e.target.closest('.js-nav') &&
         target.classList.contains('is-active')
      ) {
         target.classList.remove('is-active');
      }
   });
});
