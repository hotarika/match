<header class="l-header" id="header">
   <div class="container">
      <div class="p-header">
         <!-- ロゴ -->
         <a class="p-header__logo" href="/">
            <img :src="'/images/logo/logo-blue.svg'" alt="ロゴ" />
         </a>

         {{-- 右側のアイテム --}}
         @guest
         <div class="p-header__rightWrap">
            <!-- ログイン前 -->
            <ul class="p-header__items -beforeLogin">
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
            </ul>
         </div>
         @else
         {{-- ナビゲーション --}}
         <navigation-component></navigation-component>
         @endguest
      </div>
   </div>
</header>
