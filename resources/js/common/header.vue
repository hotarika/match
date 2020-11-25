<template>
   <header class="l-header" id="header">
      <div class="container">
         <div class="p-header">
            <!-- ロゴ -->
            <a class="p-header__logo" href="/">
               <img :src="'/images/logo/logo-blue.svg'" alt="ロゴ" />
            </a>

            <div class="p-header__rightWrap">
               <!-- ログイン後 -->
               <nav class="p-header__nav js-nav">
                  <i class="far fa-times-circle p-header__menuClose js-closeIcon"></i>
                  <ul class="p-header__items">
                     <div class="p-header__orderMenuWrap">
                        <!-- スマホのみ表示 -->
                        <li class="p-header__item -sp">
                           <a class="c-link p-header__navLink" href="applicant">
                              <i class="fas fa-list-alt p-header__navIcon"></i>
                              <div class="p-header__navName u-ml2">応募者一覧</div>
                           </a>
                        </li>
                        <!-- スマホのみ表示 -->
                        <li class="p-header__item -sp">
                           <a class="c-link p-header__navLink" href="work-form">
                              <i class="fas fa-edit p-header__navIcon"></i>
                              <div class="p-header__navName">編集</div>
                           </a>
                        </li>
                        <!-- スマホのみ表示 -->
                        <li class="p-header__item -sp">
                           <a class="c-link p-header__navLink" href="mypage">
                              <i class="fas fa-trash-alt p-header__navIcon"></i>
                              <div class="p-header__navName u-ml5">削除</div>
                           </a>
                        </li>
                        <hr class="p-header__navHr" />
                     </div>

                     <!-- 全ての端末で表示 -->
                     <li class="p-header__item">
                        <a class="c-link p-header__navLink" href="work-list">
                           <i class="fas fa-list p-header__navIcon"></i>
                           <div class="p-header__navName u-ml4">案件一覧</div>
                        </a>
                     </li>
                     <!-- 全ての端末で表示 -->
                     <li class="p-header__item">
                        <a class="c-link p-header__navLink" href="mypage">
                           <i class="fas fa-user p-header__navIcon"></i>
                           <div class="p-header__navName u-ml5">マイページ</div>
                        </a>
                     </li>
                     <!-- 全ての端末で表示 -->
                     <li class="p-header__item">
                        <a class="c-link p-header__navLink" href="mypage">
                           <span class="p-header__notificationNum">1</span>
                           <i class="fas fa-bell p-header__navIcon"></i>
                           <div class="p-header__navName u-ml6">新着通知</div>
                        </a>
                     </li>
                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="work-list">
                           <i class="fas fa-star p-header__navIcon"></i>
                           <div class="p-header__navName u-ml2">気になる案件</div>
                        </a>
                     </li>
                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="pubmsg-list">
                           <i class="fas fa-users p-header__navIcon"></i>
                           <div class="p-header__navName">パブリックメッセージ</div>
                        </a>
                     </li>
                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="dm-list">
                           <i class="fas fa-comments p-header__navIcon"></i>
                           <div class="p-header__navName u-ml2">ダイレクトメッセージ</div>
                        </a>
                     </li>
                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="settings-menu">
                           <i class="fas fa-cog p-header__navIcon"></i>
                           <div class="p-header__navName u-ml4">アカウント設定</div>
                        </a>
                     </li>
                     <!-- 全ての端末で表示 -->
                     <li class="p-header__item">
                        <a class="c-link p-header__navLink" href="login">
                           <i class="fas fa-sign-out-alt p-header__navIcon"></i>
                           <div class="p-header__navName u-ml4">ログアウト</div>
                        </a>
                     </li>
                     <!-- 全ての端末で表示 -->
                     <li class="p-header__item -orderBtn">
                        <a href="work-form" class="p-header__orderBtn">仕事を依頼</a>
                     </li>
                  </ul>
               </nav>
               <!-- <i class="fas fa-bars p-header__menuOpen js-openIcon"></i> -->
               <img
                  class="p-header__menuOpen js-openIcon"
                  :src="'/images/icon/bars-solid.svg'"
                  alt="ハンバーガーメニュー"
               />

               <!-- ログイン前 -->
               <!-- <ul class="p-header__items -beforeLogin">
                  <li class="p-header__item -beforeLogin">
                     <a class="c-link p-header__navLink -beforeLogin" href="login">
                        ログイン
                     </a>
                  </li>
                  <li class="p-header__item -beforeLogin">
                     <a class="c-link p-header__navLink -beforeLogin" href="register">
                        会員登録
                     </a>
                  </li>
               </ul> -->
            </div>
         </div>
      </div>
   </header>
</template>

<script>
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
      if (!e.target.closest('.js-nav') && target.classList.contains('is-active')) {
         target.classList.remove('is-active');
      }
   });
});
</script>
